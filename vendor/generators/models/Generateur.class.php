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

		public function ecrireUneClasse($table) {
			$thecontroller = "<?php\n\t/**\n\t* Classe " . $this->ext."".$this->ucbirst($table) . 'Model';
			$thecontroller .= "\n\t*/";
			$thecontroller .= "\n\tclass ".$this->ext."".$this->ucbirst($table)."Model {\n";

			$thecontroller .= "\n\t\tpublic static function result_data() {\n\t\t\t\$BDD = new Database();\n\t\t\treturn \$BDD->selectAll('".$table."', '*', 1);\n\t\t}\n";

			$thecontroller .= "\n\t\tpublic static function recovery_element(\$id) {\n\t\t\t\$BDD = new Database();\n\t\t\treturn \$BDD->select('".$table."', '*', array('".$this->data[$table][0]['Field']."' => \$id));\n\t\t}\n";

			$thecontroller .= "\t}\n?>";

			$nom_fichier = $this->dossier_exp.'/'.$this->ext."".$this->ucbirst($table).'Model.php';

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