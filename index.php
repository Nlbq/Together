<?php
/**
*	2016
*
*	All this system code is released under private license
*	See COPYRIGHT.txt and LICENSE.txt.
*/
/**
 * Root directory.
 */

/////////////////////////////////////////////////
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
$type_gestion = 1; // 1=>mode debug, 2=>mode production (erreur dans log/error.log), 0=>Aucun traitement
switch ($type_gestion) {
    case '1':
        if (PHP_VERSION_ID < 50400) error_reporting (E_ALL | E_STRICT);
        else error_reporting (E_ALL);
	ini_set('display_errors', true);
	ini_set('html_errors', false);
	ini_set('display_startup_errors',true);
        ini_set('log_errors', false);
	ini_set('error_prepend_string','<span style="color: red;">');
	ini_set('error_append_string','<br /></span>');
	ini_set('ignore_repeated_errors', true);
    break;
    case '2':
        error_reporting (E_ALL);
	ini_set('display_errors', false);
	ini_set('html_errors', false);
	ini_set('display_startup_errors',false);
	ini_set('log_errors', true);
	ini_set('error_log', CHG_ROOT_PATH.'log/error.log');
	ini_set('error_prepend_string','<span style="color: red;">');
	ini_set('error_append_string','</span>');
	ini_set('ignore_repeated_errors', true);
    break;
    default:
	error_reporting (E_ALL);
	ini_set('display_errors', false);
	ini_set('html_errors', false);
	ini_set('display_startup_errors',false);
	ini_set('log_errors', false);
}
////////////////////////////////////////////////////////////



define("T_HOST",  'https://' . $_SERVER['SERVER_NAME']);

require __DIR__ . '/vendor/brain.php';

// class Joueur {
// 	//  attributs
// 	private $nom, $force, $vie;

// 	public function __construct($nom, $force = 10, $vie = 100) {
// 		$this->nom = $nom;
// 		$this->force = $force;
// 		$this->vie = $vie;
// 	}

// 	public function donner_un_coup($autre_joueur) {
// 		$vie_du_joeur = $autre_joueur->getVie();
// 		$nouvelle_vie_autre_joueur = $vie_du_joeur - $this->force;

// 		$autre_joueur->setVie($nouvelle_vie_autre_joueur);
// 	}

// 	// Getters
// 	public function getForce() {
// 		return $this->force;
// 	}

// 	public function getVie() {
// 		return $this->vie;
// 	}

// 	// Setters

// 	public function setForce($nouvelle_force) {
// 		$this->force = $nouvelle_force;
// 	}

// 	public function setVie($nouvelle_vie) {
// 		$this->vie = $nouvelle_vie;
// 	}
// }

// $joueurA = new Joueur('Arthur');

// $joueurB = new Joueur('Adam', 15);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// $joueurA->donner_un_coup($joueurB);

// $joueurB->donner_un_coup($joueurA);

// display($joueurA);
// display($joueurB);
