<?php
	/**
	* Classe AccueilController
	*/
	class AccueilController {

		public static function index() {

			if ($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'admin';
			}else{
				$GLOBALS['variable_section'] = 'accueil';	
				$GLOBALS['list_projects'] = ProjectController::current_customer_list_projects();			
			}
		}

		public static function logout() {
			session_destroy();

			if ($_COOKIE['idutilisateur']) {
				unset($_COOKIE['idutilisateur']);
				unset($_COOKIE['passwordhash']);
				setcookie("idutilisateur", "", time() - 3600);
				setcookie("passwordhash", "", time() - 3600);
			}

			header('Location: index.php');
		}
	}
?>
