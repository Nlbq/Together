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
			$laclasse = "<?php\n\t/**\n\t* Classe " . $this->ext."".$this->ucbirst($laTable);
			$laclasse .= "\n\t*/";
			$laclasse .= "\n\tclass ".$this->ext."".$this->ucbirst($laTable)." {\n\t\t//Private attributes\n";
			$laclasse .= "\t\tprivate";
			$i = 1;
			foreach ($this->data[$laTable] as $key => $value) {
				$laclasse .= ($i == count($this->data[$laTable])) ? ' $'.$value['Field'].';' : ' $'.$value['Field'].',' ;
				$i++; 
			}
			$laclasse .= "\n\n\t\t//Constructor\n\t\tpublic function __construct() {\n";
			$i = 1;
			foreach ($this->data[$laTable] as $key => $value)
				$laclasse .= "\t\t\t" . '$this->'.$value['Field'].' = \'\';' . "\n";
			$laclasse .= "\t\t}\n";
			$laclasse .= "\n\t\t//Méthodes\n";

			$laclasse .= "\n\t\t//Method to assign an object data\n";
			$laclasse .= "\t\tpublic function recover() {";
			$laclasse .= "\n\t\t\trequire_once 'sources/models/".$this->ucbirst($laTable)."Model.php';\n\t\t\t\$this->serialise(".$this->ucbirst($laTable)."Model::recovery_element(\$this->".$this->data[$laTable][0]['Field']."));\n\t\t}\n";

			$laclasse .= "\n\t\t//Method to add an entry to the table $laTable\n";
			$laclasse .= "\t\tpublic function add() {\n";
			$laclasse .= "\t\t\t".'$BDD = new Database();';
			$laclasse .= "\n\t\t\treturn \$BDD->insert('$laTable', \$this->unserialise());\n\t\t}\n";
			$laclasse .= "\n\t\t//Method to modify a table entry $laTable\n";
			$laclasse .= "\t\tpublic function edit() {\n";
			$laclasse .= "\t\t\t".'$BDD = new Database();';
			$laclasse .= "\n\t\t\treturn \$BDD->update('$laTable', \$this->unserialise(), array('".$this->data[$laTable][0]['Field']."' => \$this->".$this->data[$laTable][0]['Field']."));\n\t\t}\n";
			
			$laclasse .= "\n\t\t//Method to remove an entry from the table $laTable\n";
			$laclasse .= "\t\tpublic function delete() {\n";
			$laclasse .= "\t\t\t".'$BDD = new Database();';
			$laclasse .= "\n\t\t\treturn \$BDD->delete('$laTable', array('".$this->data[$laTable][0]['Field']."' => \$this->".$this->data[$laTable][0]['Field']."));\n\t\t}\n";
			$laclasse .= "\n\t\t//Method to serialize\n";
			$laclasse .= "\t\tpublic function serialise(\$tab) {\n";
			$laclasse .= "\t\t\t".'$tableau = array(';
			$i = 1;
			foreach ($this->data[$laTable] as $key => $value) {
				$laclasse .= ($i == count($this->data[$laTable])) ? "'".$value['Field']."');" : "'".$value['Field']."' , ";
				$i++; 
			}
			$laclasse .= "\n\t\t\t".'foreach ($tableau as $key => $value)';
			$laclasse .= "\n\t\t\t\tif (isset(\$tab[\$value]))";
			$laclasse .= "\n\t\t\t\t\t\$this->\$value = \$tab[\$value];\n\t\t}\n";
			
			$laclasse .= "\n\t\t//Méthode pour désérialiser\n";
			$laclasse .= "\t\tpublic function unserialise() {\n";
			$laclasse .= "\t\t\t".'$tableau = array(';
			$i = 1;
			foreach ($this->data[$laTable] as $key => $value) {
				$laclasse .= ($i == count($this->data[$laTable])) ? "'".$value['Field']."');" : "'".$value['Field']."' , ";
				$i++; 
			}
			$laclasse .= "\n\t\t\t".'foreach ($tableau as $key => $value)';
			$laclasse .= "\n\t\t\t\t\$table[\$value] = \$this->\$value;";
			$laclasse .= "\n\t\t\treturn \$table;\n\t\t}\n";
			$laclasse .= "\n\t\t//Getters\n";
			foreach ($this->data[$laTable] as $key => $value) {
				$laclasse .= "\t\tpublic function get".ucfirst($value['Field'])."() { return ".'$this->'.$value['Field']."; }\n";
				$i++; 
			}
			$laclasse .= "\n\t\t//Setters\n";
			foreach ($this->data[$laTable] as $key => $value) {
				$laclasse .= "\t\tpublic function set".ucfirst($value['Field'])."(".'$'.$value['Field'].") { return ".'$this->'.$value['Field']." = ".'$'.$value['Field']."; }\n";
				$i++; 
			}

			$laclasse .= "\t}\n?>";

			$nom_fichier = $this->dossier_exp.'/'.$this->ext."".$this->ucbirst($laTable).'.class.php';

			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $laclasse);
			}
		}

		public function ecrireLesClasses() {
			foreach ($this->data as $key => $table) {
				$this->ecrireUneClasse($key);
			}
		}

		public function getRes_table() { return $this->res_table; }
	}