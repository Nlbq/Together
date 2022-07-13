<?php
	/**
	* Classe Customer_informationController
	*/
	class Customer_informationController {

		public static function index() {
			$GLOBALS['variable_section'] = 'Customer_information/index';
			$GLOBALS['list_customer_informations'] = Customer_informationController::list_customer_informations();
	}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Customer_information/list_view';
			$GLOBALS['list_customer_informations'] = Customer_informationController::list_customer_informations();
		}

		public static function view() {
			if($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'Customer_information/adminView';
			$GLOBALS['current_customer_informations'] = Customer_informationController::current_customer_informations();

			//récupération de l'id utilisateur
			$one_user = new User();
			$one_user->setUser_id(intval($_GET['id']));
			$one_user->recover();

			$one_customer_information = new Customer_information();
			$one_customer_information->setUser_id(intval($_GET['id']));
			$one_customer_information->recover();

			$GLOBALS['one_user'] = $one_user;
			$GLOBALS['one_customer_information'] = $one_customer_information;


			}
		}

		public static function add() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'Customer_information/add';

			$one_customer_information = new Customer_information();
			$one_customer_information->setUser_id(intval($_GET['id']));
			$one_customer_information->recover();

			//récupération de l'id utilisateur dans l'url pour pouvoir revenir à la page précédente et afficher le nom du client
			$one_user = new User();
			$one_user->setUser_id(intval($_GET['id']));
			$one_user->recover();

			$GLOBALS['one_user'] = $one_user;
			$GLOBALS['one_customer_information'] = $one_customer_information;
			
			if (isset($_POST['company_name'])) {
				$one_customer_information = new Customer_information();
				$one_customer_information->serialise($_POST);
				$one_customer_information->setUser_id(intval($_GET['id']));
				$one_customer_information->add();

				header('Location: index.php?tab=customer_information&action=view&id='.$one_user->getUser_id());
			}
		}
	}

		public static function edit() {
			if($_SESSION['utilisateur']->getRole() == 'admin'){

			$GLOBALS['variable_section'] = 'Customer_information/edit';
			$GLOBALS['current_customer_informations'] = Customer_informationController::current_customer_informations();

			
			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=accueil');
			} else {

				$one_user = new User();
				$one_user->setUser_id(intval($_GET['id']));
				$one_user->recover();
				
				$one_customer_information = new Customer_information();
				$one_customer_information->setUser_id(intval($_GET['id']));
				$one_customer_information->recover();
			
				if (isset($_POST['company_name'])) {
					$one_customer_information->serialise($_POST);
					$one_customer_information->edit();
					
					header('Location: index.php?tab=customer_information&action=view&id='.$one_user->getUser_id());
				}
				$GLOBALS['one_user'] = $one_user;
				$GLOBALS['one_customer_information'] = $one_customer_information;
			}
		}
	}


		public static function delete() {
			$one_customer_information = new Customer_information();
			$one_customer_information->setCustomer_information_id(intval($_GET['id']));
			$one_customer_information->delete();
			header('Location: index.php?tab=customer_information');
		}

		public static function list_customer_informations() {
			require_once 'sources/models/Customer_informationModel.php';
			return Customer_informationModel::result_data();
		}

		public static function current_customer_informations() {
			require_once 'sources/models/Customer_informationModel.php';
			return Customer_informationModel::customer_informations(intval($_GET['id']));
		}
	}
?>