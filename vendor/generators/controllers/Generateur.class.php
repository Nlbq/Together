<?php
	class Generateur {
		private $data, $res_table, $dossier_exp, $ext;

		public function __construct($data, $dossier_exp, $ext="") {
			$this->data = $data;
			$this->dossier_exp = $dossier_exp;
			$this->ext = $ext;
		}

		public function ucbirst($string) {
			if ($this->ext != "") {
				return $string;
			}
			return ucfirst($string);
		}

		public function ecrireUneClasse($laTable) {
			$thecontroller = "<?php\n\t/**\n\t* Classe " . $this->ext."".$this->ucbirst($laTable) . 'Controller';
			$thecontroller .= "\n\t*/";
			$thecontroller .= "\n\tclass ".$this->ext."".$this->ucbirst($laTable)."Controller {\n";

			$thecontroller .= "\n\t\tpublic static function index() {\n\t\t\t\$GLOBALS['variable_section'] = '".$this->ucbirst($laTable)."/index';\n\t\t\t\$GLOBALS['list_$laTable"."s'] = ".$this->ucbirst($laTable)."Controller::list_$laTable"."s();\n\t\t\tif (isset(\$_POST['".$this->data[$laTable][1]['Field']."'])) {\n\t\t\t\t  " . $this->ext."".$this->ucbirst($laTable) . "Controller::add(); \n\t\t\t}\n\t}\n";

			$thecontroller .= "\n\t\tpublic static function list_view() {\n\t\t\t\$GLOBALS['variable_section'] = '".$this->ucbirst($laTable)."/list_view';\n\t\t\t\$GLOBALS['list_$laTable"."s'] = ".$this->ucbirst($laTable)."Controller::list_$laTable"."s();\n\t\t}\n";
			$thecontroller .= "\n\t\tpublic static function view() {\n\t\t\t\$GLOBALS['variable_section'] = '".$this->ucbirst($laTable)."/view';\n\t\t}\n";

			$thecontroller .= "\n\t\tpublic static function add() {\n\t\t\t\$GLOBALS['variable_section'] = '".$this->ucbirst($laTable)."/add';\n\t\t\tif (isset(\$_POST['".$this->data[$laTable][1]['Field']."'])) {\n\t\t\t\t\$one_$laTable = new ".$this->ucbirst($laTable)."();\n\t\t\t\t\$one_".$laTable."->serialise(\$_POST);\n\t\t\t\t\$one_".$laTable."->add();\n\n\t\t\t\theader('Location: index.php?tab=".$laTable."');\n\t\t\t}\n\t\t}\n";

			$thecontroller .= "\n\t\tpublic static function edit() {\n\t\t\t\$GLOBALS['variable_section'] = '".$this->ucbirst($laTable)."/edit';\n\t\t\tif (!isset(\$_GET['id'])) {\n\t\t\t\theader('Location: index.php?tab=".$laTable."');\n\t\t\t} else {\n\t\t\t\t\$one_".$laTable." = new ".$this->ucbirst($laTable)."();\n\t\t\t\t\$one_".$laTable."->set".$this->ucbirst($laTable)."_id(intval(\$_GET['id']));\n\t\t\t\t\$one_".$laTable."->recover();\n\n\t\t\t\tif (isset(\$_POST['".$this->data[$laTable][1]['Field']."'])) {\n\t\t\t\t\t\$one_".$laTable."->serialise(\$_POST);\n\t\t\t\t\t\$one_".$laTable."->edit();\n\t\t\t\t}\n\n\t\t\t\t\$GLOBALS['one_".$laTable."'] = \$one_".$laTable.";\n\t\t\t}\n\t\t}\n";

			$thecontroller .= "\n\t\tpublic static function delete() {\n\t\t\t\$one_$laTable = new ".$this->ucbirst($laTable)."();\n\t\t\t\$one_".$laTable."->set".$this->ucbirst($laTable)."_id(intval(\$_GET['id']));\n\t\t\t\$one_".$laTable."->delete();\n\t\t\theader('Location: index.php?tab=".$laTable."');\n\t\t}\n";
			$thecontroller .= "\n\t\tpublic static function list_$laTable"."s() {\n\t\t\trequire_once 'sources/models/".$this->ucbirst($laTable)."Model.php';\n\t\t\treturn ".$this->ucbirst($laTable)."Model::result_data();\n\t\t}\n";

			$thecontroller .= "\t}\n?>";

			$nom_fichier = $this->dossier_exp.'/'.$this->ext."".$this->ucbirst($laTable).'Controller.php';
			
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $thecontroller);
			}
		}

		public function ecrireLesClasses() {
			foreach ($this->data as $key => $table) {
				$this->ecrireUneClasse($key);
			}
		}

		public function getRes_table() { return $this->res_table; }
	}
