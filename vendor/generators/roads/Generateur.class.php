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
			$laclasse = "<?php\nif (!isset(\$_GET['action'])) {\n\t".$this->ucbirst($laTable)."Controller::index();\n} else {\n\tswitch (\$_GET['action']) {\n\t\tcase 'list_view':\n\t\t\t".$this->ucbirst($laTable)."Controller::list_view();\n\t\t\tbreak;\n\n\t\tcase 'view':\n\t\t\t".$this->ucbirst($laTable)."Controller::view();\n\t\t\tbreak;\n\n\t\tcase 'add':\n\t\t\t".$this->ucbirst($laTable)."Controller::add();\n\t\t\tbreak;\n\n\t\tcase 'edit':\n\t\t\t".$this->ucbirst($laTable)."Controller::edit();\n\t\t\tbreak;\n\n\t\tcase 'delete':\n\t\t\t".$this->ucbirst($laTable)."Controller::delete();\n\t\t\tbreak;\n\t}\n}";

			$nom_fichier = $this->dossier_exp.'/'.$this->ext."".$this->ucbirst($laTable).'.road.php';

			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $laclasse);
			}
		}

		public function ecrireLesClasses() {
			foreach ($this->data as $key => $table) {
				$this->ecrireUneClasse($key);
			}
		}
	}