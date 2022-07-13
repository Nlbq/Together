<?php
	/**
	* Classe correspondant au Modèle, classe permettant d'accéder à la base de données, faire passer des requêtes
	*/
	class Database
	{
		//Déclaration des attributs privés de la classe, elles concernent la base de données
		private $unPDO, $base, $host, $dns, $user, $password, $database;

		//Déclaration du constructeur
		public function __construct() {
			$config = $GLOBALS['config'];
			//Récupération des identifiants de la base de données dans le fichier où ces informations sont stockées
			$this->unPDO = NULL;
			$this->base = $config['Database']['database'];
			$this->host = $config['Database']['host'];
			$this->dns = 'mysql:host='.$this->host.';dbname='.$this->base.';charset=utf8';
			$this->user = $config['Database']['username'];
			$this->password = $config['Database']['password'];
			try {
				$this->unPDO = new PDO($this->dns, $this->user, $this->password);
			}
			catch (Exception $exp) {
				echo 'Erreur de connexion à la base :'.$this->dns;
			}
		}

		//Méthode permettant d'exécuter une requête de sélection
		public function selection_method($table, $champ, $critere=1, $order='', $limit='') {
			//Si on a passer une simple chaîne de caractère à la place du paramètre _champ
			if (gettype($champ) == 'string')
				$les_champs = ($champ == '*') ? '*' : '`'.$champ.'`'; // Quotes spéciales si ne vaut pas *
			//Si on a passer un tableau à la place du paramètre _champ : si plusieurs champs demandés
			elseif (gettype($champ) == 'array') {
				$ch = '';
				//On parcours le tableau _champ
				foreach ($champ as $value)
					$ch .= ' `'.$value.'`,';
				$les_champs = substr($ch, 0, -1);
			}
			//Ecriture de la requête
			$requete = 'SELECT '.$les_champs.' FROM '.$table;

			//Si on a spécifier un critère de sélection en paramètre, On parcour les critères et récupère une chaine sous la forme 'field 1 = value1 AND field 2 = value2 AND...'
			if ($critere != 1 && is_array($critere))
				$critere = $this->browseCriteria($critere);

			//Finalisation de l'écriture de la requête
			$requete .= ' WHERE '.$critere.' '.$order.' '.$limit;
			// mysql_write($requete);
			return $requete;
		}

		//Méthode permettant d'exécuter une requête de sélection et retourne plusieur résultats
		public function selectAll($table, $champ, $critere='', $order='', $limit='') {
			$selection = $this->unPDO->prepare($this->selection_method($table, $champ, $critere, $order, $limit));
			$selection->execute();
			return $selection->fetchAll(PDO::FETCH_ASSOC);
		}

		//Méthode permettant d'exécuter une requête de sélection et retourne un unique résultat
		public function select($table, $champ, $critere='', $order='', $limit='') {
			$selection = $this->unPDO->prepare($this->selection_method($table, $champ, $critere, $order, $limit));
			$selection->execute();
			return $selection->fetch(PDO::FETCH_ASSOC);
		}

		public function selectAllLibre($requete) {
			// mysql_write($requete);
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			return $selection->fetchAll(PDO::FETCH_ASSOC);
		}

		public function selectLibre($requete) {
			// mysql_write($requete);
			#die();
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			return $selection->fetch(PDO::FETCH_ASSOC);
		}

		// Fonction pour les insertions dans la base de données. Elle prend en parametre la table sur laquelle on effectue la requete et un tableau qui va contenir les champs comme clés, et les valeurs comme valeurs
		public function insert($table, $tableau) {
			//initialisation des variables champs et valeurs à null
			$champs = '';
			$valeurs = '';
			//On parcours le tableau en récupérant ses clés et ses valeurs
			foreach ($tableau as $key => $value) {
				//On incrémente notre variable champs pour chaque clé, en ajoutant une virgule après chaque champ
				$champs .= '`'.$key.'`,';
				//On incrémente la variable valeurs pour chaque valeur, en ajoutant une virgule après chaque valeur
				// display($value);
				$valeurs .= ($value === 'NOW()') ? 'NOW(),' : ':'.$key.',';
				if ($value!=='NOW()')
					$donnees[':'.$key] = $value;
			}
			//On enlève le dernier caractère à la variable champs pour supprimer la dderniere virgule
			$champs = substr($champs, 0, -1);
			//On enlève le dernier caractère à la variable champs pour supprimer la dderniere virgule
			$valeurs = substr($valeurs, 0, -1);
			//On créer la requete d'insertion en lui ajoutant les champs valeurs et table en paramètre
			$requete = 'INSERT INTO `'.$table.'`('.$champs.') VALUES('.$valeurs.')';
			// mysql_write($requete);
			// sdisplay($tableau);
			// sdisplay($donnees);
			die();
			//On prépare la requête à l'exécution et retourne un objet
			$insertion = $this->unPDO->prepare($requete);
			//On exécute la requête préparée
			$insertion->execute($donnees);
				// echo PDO::errorInfo();
			//On ferme le curseur, permettant à la requête d'être de nouveau exécutée
			$insertion->closeCursor();



			return $this->dernierID();
		}

		//Méthode permettant la modification
		public function update($table, $champs, $critere) {
			$ch = '';
			foreach ($champs as $key => $value) {
				if (gettype($value) == 'string' && $value != 'NOW()')
					$value = $this->unPDO->quote($value);
				$ch .= ' `'.$key.'` = '.$value. ', ';
			}
			$champs = substr($ch, 0, -2);

			//On parcour les critères et récupère une chaine sous la forme 'field 1 = value1 AND field 2 = value2 AND...'
			$critere = $this->browseCriteria($critere);

			$requete = 'UPDATE `'.$table.'` SET '.$champs.' WHERE '.$critere;
			// mysql_write($requete);
			// die();
			$modification = $this->unPDO->prepare($requete);
			$modification->execute();
			$modification->closeCursor();
		}

		//Méthode permettant la suppression d'une entrée (requete DELETE), elle prend en parametre la table sur laquelle s'effectue la suppression et la clause déterminant l'entrée à supprimer.
		public function delete($table, $clause) {
			//On parcour les critères et récupère une chaine sous la forme 'field 1 = value1 AND field 2 = value2 AND...'
			$critere = $this->browseCriteria($clause);

			$requete = 'DELETE FROM '.$table.' WHERE '.$critere;
			//mysql_write($requete);
			//die();
			$suppression = $this->unPDO->prepare($requete);
			$suppression->execute();
			$suppression->closeCursor();
		}

		public function browseCriteria($array) {
			$string = '';
			foreach ($array as $key => $value) {
				if (gettype($value) == 'string')
					$value = $this->unPDO->quote($value);
				$string .= ' `'.$key.'` = '.$value. ' AND';
			}
			return substr($string, 0, -3);
		}

		//Récupération du dernier _id inséré
		public function dernierID() { return $this->unPDO->lastInsertId(); }

		//getters
		public function getUnPdo() { return $this->unPDO; }
	}
?>
