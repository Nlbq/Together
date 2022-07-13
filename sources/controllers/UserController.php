<?php
	/**
	* Classe UserController
	*/
	class UserController {

	public static function index() {

		if ($_SESSION['utilisateur']->getRole() == 'admin') {
			$GLOBALS['variable_section'] = 'User/index';

			$list_customers_count = count(UserController::list_customers());
			$nbr_element_par_page=5;
			$GLOBALS['nbr_de_pages']= ceil($list_customers_count/$nbr_element_par_page);
			
			//Pagination
			if(!isset($_GET['p'])){
				$p = 1;
				$debut=($p-1)*$nbr_element_par_page;
			}
			else{
				if( $_GET['p'] < 1){
					$_GET['p'] = 1;
				}
				
				if($_GET['p'] > $GLOBALS['nbr_de_pages']){
					$_GET['p'] = $GLOBALS['nbr_de_pages'];
				}
				
				$p = $_GET['p'];
				$nbr_element_par_page=5;
				$GLOBALS['nbr_de_pages']= ceil($list_customers_count/$nbr_element_par_page);
				$debut=($p-1)*$nbr_element_par_page;
			}
			
			//Recherche
			if(!isset($_POST['search'])){
				$GLOBALS['list_users'] = UserController::customers_list_limit($debut, $nbr_element_par_page);
				$GLOBALS['searchValue'] = '';
			}else{
				if(empty(UserController::customers_list_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page))){
					$GLOBALS['list_users'] = UserController::customers_list_limit($debut, $nbr_element_par_page);
					$GLOBALS['searchError'] = "Aucun résultat";
					$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);

				}else{
					$GLOBALS['list_users'] = UserController::customers_list_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page);			
					$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);

				}
			}
			$GLOBALS['p'] = $p;

		} else {
			header('Location: index.php');
		}
	}

	// Fonction déconnexion
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

		public static function list_view() {
			$GLOBALS['variable_section'] = 'User/list_view';
			$GLOBALS['list_users'] = UserController::list_users();
		}

		public static function view() {
			$GLOBALS['variable_section'] = 'User/view';
		}

		public static function add() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'User/add';

				if (isset($_POST['firstname'])) {
					$one_user = new User();
					$one_user->serialise($_POST);
					$one_user->add();
					
					header('Location: index.php?tab=user');
				}
			}
		}

		public static function edit() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'User/edit';

			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=user');
			} else {
				$one_user = new User();
				$one_user->setUser_id(intval($_GET['id']));
				$one_user->recover();

				if (isset($_POST['firstname'])) {
					$one_user->serialise($_POST);
					$one_user->edit();
					header('Location: index.php?tab=user');

				}
				$GLOBALS['one_user'] = $one_user;
			}
		}
	}

		public static function delete() {

			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$one_user = new User();
			$one_user->setUser_id(intval($_GET['id']));
			$one_user->delete();
			header('Location: index.php?tab=user');
		}
	}


		public static function list_users() {
			require_once 'sources/models/UserModel.php';
			return UserModel::result_data();
		}
		
		public static function list_customers() {
			require_once 'sources/models/UserModel.php';
			return UserModel::customer_list();
		}

		public static function customers_list_limit($debut, $nbr_element_par_page) {
			require_once 'sources/models/UserModel.php';
			return UserModel::customers_list_limit($debut, $nbr_element_par_page);
		}

		public static function customers_list_limit_search($search, $debut, $nbr_element_par_page) {
			require_once 'sources/models/UserModel.php';
			return UserModel::customers_list_limit_search($search, $debut, $nbr_element_par_page);
		}

	}
?>