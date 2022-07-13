<?php
	/**
	* Classe DeliveryController
	*/
	class DeliveryController {

		public static function index() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'Delivery/index';

			$customers_deliverys_count = count(DeliveryController::list_deliverys());
			$nbr_element_par_page=5;
			$GLOBALS['nbr_de_pages']= ceil($customers_deliverys_count/$nbr_element_par_page);
			
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
				$GLOBALS['nbr_de_pages']= ceil($customers_deliverys_count/$nbr_element_par_page);
				$debut=($p-1)*$nbr_element_par_page;
			}

				//Recherche
				if(!isset($_POST['search'])){
					$GLOBALS['list_deliverys'] = DeliveryController::list_deliverys_limit($debut, $nbr_element_par_page);
					$GLOBALS['searchValue'] = '';
				}else{
					if(empty(DeliveryController::list_deliverys_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page))){
						$GLOBALS['list_deliverys'] = DeliveryController::list_deliverys_limit($debut, $nbr_element_par_page);
						$GLOBALS['searchError'] = "Aucun résultat";
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}else{
						$GLOBALS['list_deliverys'] = DeliveryController::list_deliverys_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page);
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}
				}
			$GLOBALS['p'] = $p;

			}elseif($_SESSION['utilisateur']->getRole() == 'customer'){

			}else {
				header('Location: index.php');
			}
		}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Delivery/list_view';
			$GLOBALS['list_deliverys'] = DeliveryController::list_deliverys();
		}

		public static function view() {

			if($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'Delivery/adminView';

				// Définition de la livraison de la page actuelle
				$GLOBALS['current_delivery'] = DeliveryController::current_project_delivery($_GET['id']);
				$GLOBALS['delivery_list_deliverables'] = DeliveryController::delivery_deliverables($_GET['id']);

				//récupération de l'id du projet dans l'url pour pouvoir revenir à la page précédente
				$one_delivery = new Delivery;
				$one_delivery -> setDelivery_id($_GET['id']);
				$one_delivery->recover();

				$one_project = new Project();
				$one_project -> setProject_id($one_delivery -> getProject_id());
				$one_project->recover();

				$GLOBALS['one_project'] = $one_project;

				// Formulaire d'ajout de livrable (upload fichier)
				if (isset($_FILES['deliverable'])) {
					upload_file('deliverable', 'uploads/deliverables/');
					$_POST['deliverable'] = 'uploads/deliverables/'.$_FILES['deliverable']['name'];
					$_POST['type'] = $_FILES['deliverable']['type'];

					$one_deliverable = new Deliverable();
					$one_deliverable->serialise($_POST);
					$one_deliverable->setDelivery_id(intval($_GET['id']));
					$one_deliverable->setLink($_FILES['deliverable']['name']);
					$one_deliverable->add();

					header('Refresh:0');
				}

				//Formulaire d'envoi de mail au client
				if(isset($_POST['hiddenInput'])){

					$one_delivery = new Delivery();
					$one_delivery->setDelivery_id(intval($_GET['id']));
					$one_delivery->recover();

					$one_project = new Project();
					$one_project->setProject_id($one_delivery->getProject_id());
					$one_project->recover();

					$one_user = new User();
					$one_user->setUser_id($one_project->getUser_id());
					$one_user->recover();

					$BDD = new Database();

					$requete = $BDD->select('user', '*', array('email_address' => $one_user->getEmail_address()));

						if($requete > 0){

						$cryptedId = nbCrypt($_GET['id']);
						$url = "https://together.lozako.com/index.php?tab=delivery&action=deliveryView&id=$cryptedId";
						$subject = "Réception de votre livraison Lozako";
						$htmlContent  = file_get_contents("assets/emailTemplates/deliveryTemplate.html");
						$message = $htmlContent.'<br/><a href='.$url.' style="text-decoration:none;text-align:center;display:block;margin:10px auto;
						background-color:#0d6efd; padding:10px;border-radius:6px;width:80px;color:#fff;font-weight:bold;">Ma livraison</a>';
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type:text/html;charset=UTF-8';
						$headers[] = 'From: Together by Lozako <no-reply@lozako.com>';

						if(mail($one_user->getEmail_address(), $subject, $message , implode("\r\n", $headers))){

							$GLOBALS['valid'] = "L'email a bien été envoyé";
						}else{
							$GLOBALS['error'] = 'Une erreur est survenue';
						}
					}else{
						$GLOBALS['error'] = 'Requête inexistante';
					}
				}

			}elseif ($_SESSION['utilisateur']->getRole() == 'customer'){

				// Si la livraison n'appartient pas au client, on le redirige vers l'accueil
				require_once 'sources/models/DeliveryModel.php';
				if (DeliveryModel::check_id_user($_GET['id']) != $_SESSION['utilisateur']->getUser_id()) {
					header('Location: index.php');
				}else {

					$GLOBALS['variable_section'] = 'Delivery/view';
					$GLOBALS['current_delivery'] = DeliveryController::current_project_delivery($_GET['id']);
					$GLOBALS['delivery_list_deliverables'] = DeliveryController::delivery_deliverables($_GET['id']);
					
					//récupération de l'id du projet dans l'url pour pouvoir revenir à la page précédente
					$one_delivery = new Delivery;
					$one_delivery -> setDelivery_id($_GET['id']);
					$one_delivery->recover();
					
					$one_project = new Project();
					$one_project -> setProject_id($one_delivery -> getProject_id());
					$one_project->recover();
					
					$GLOBALS['one_project'] = $one_project;
					$GLOBALS['one_delivery'] = $one_delivery;
				}
		}else{
			header('Location: index.php');
		}
	}

		public static function deliveryView(){

			$GLOBALS['variable_section'] = 'Delivery/deliveryView';
			
			if(isset($_GET['id'])){

				$deliveryId = nbDecrypt($_GET['id']);

				$BDD = new Database();
				
				$requete = $BDD->select('delivery', '*', array('delivery_id' => $deliveryId));
				
				if ($requete > 0){
					
					$GLOBALS['current_delivery'] = DeliveryController::current_project_delivery($deliveryId);
					$GLOBALS['delivery_list_deliverables'] = DeliveryController::delivery_deliverables($deliveryId);
					
					$one_delivery = new Delivery;
					$one_delivery -> setDelivery_id($deliveryId);
					$one_delivery->recover();
					
					$one_project = new Project();
					$one_project -> setProject_id($one_delivery -> getProject_id());
					$one_project->recover();
					
					$GLOBALS['one_project'] = $one_project;
					$GLOBALS['one_delivery'] = $one_delivery;

					//validation de la livraison par le client
					if (isset($_POST['hiddenInput'])){

						$one_delivery->setValidation(1);
						$validationDate = date("Y-m-d H:i:s");
						$one_delivery->setValidation_date($validationDate);
						$one_delivery->edit();

						$one_project -> setStatus(1);
						$one_project -> edit();

					}
				}
			}
		}

		public static function add() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'Delivery/add';

			//récupération de l'id du projet dans l'url pour pouvoir revenir à la page précédente
			$one_project = new Project();
			$one_project -> setProject_id(intval($_GET['id']));
			$one_project->recover();

			$GLOBALS['one_project'] = $one_project;

				//Ajout d'une livraison
				if (isset($_POST['description'])) {

					$deliveryDate = date("Y-m-d H:i:s");
					$validationDate = "";
					$validation=0;

					$one_delivery = new Delivery();
					$one_delivery->serialise($_POST);
					$one_delivery->setDelivery_date($deliveryDate);
					$one_delivery->setValidation_date($validationDate);
					$one_delivery->setValidation($validation);
					$one_delivery->setProject_id($_GET['id']);
					$one_delivery->add();

					header('Location: index.php?tab=project&action=view&id='.$one_delivery->getProject_id());
				}
			}
		}

		public static function edit() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'Delivery/edit';

				if (!isset($_GET['id'])) {
					header('Location: index.php?tab=delivery');
				} else {

					//récupération de l'id du projet dans l'url pour pouvoir revenir à la page précédente
					$one_delivery = new Delivery();
					$one_delivery->setDelivery_id(intval($_GET['id']));
					$one_delivery->recover();

					$one_project = new Project();
					$one_project -> setProject_id($one_delivery -> getProject_id());
					$one_project->recover();

					//Modification de la livraison
					if (isset($_POST['description'])) {

						//Si on valide la livraison en la modifiant
						if(isset($_POST['validation']) && $_POST['validation'] == 1){

							$validationDate = date("Y-m-d H:i:s");
							$one_delivery->setValidation_date($validationDate);
							$one_delivery->serialise($_POST);
							$one_delivery->edit();

							$one_project -> setStatus(1);
							$one_project -> edit();

							header('Location:index.php?tab=delivery&action=view&id='.$one_delivery->getDelivery_id());

						}else{
							$one_delivery->serialise($_POST);
							$one_delivery->edit();
							header('Location:index.php?tab=delivery&action=view&id='.$one_delivery->getDelivery_id());
						}
					}

					$GLOBALS['one_delivery'] = $one_delivery;
					$GLOBALS['one_project'] = $one_project;

				}
			}
		}

		public static function delete() {
			$one_delivery = new Delivery();
			$one_delivery->setDelivery_id(intval($_GET['id']));
			$one_delivery->recover();

			
			$one_project = new Project();
			$one_project->setProject_id($one_delivery->getProject_id());
			$one_project->recover();
			
			$one_delivery->delete();

			header('Location: index.php?tab=project&action=view&id='.$one_project->getProject_id());
		}

		public static function validate(){

			$one_delivery = new Delivery();
			$one_delivery->setDelivery_id(intval($_GET['id']));
			$one_delivery->recover();

			$one_delivery->setValidation(1);
			$validationDate = date("Y-m-d H:i:s");
			$one_delivery->setValidation_date($validationDate);
			$one_delivery->edit();
			
			$one_project = new Project();
			$one_project -> setProject_id($one_delivery -> getProject_id());
			$one_project->recover();

			$one_project -> setStatus(1);
			$one_project -> edit();

			header('Location: index.php?tab=delivery&action=view&id='.$one_delivery->getDelivery_id());
		}

		public static function list_deliverys() {
			require_once 'sources/models/DeliveryModel.php';
			return DeliveryModel::result_data();
		}

		public static function list_deliverys_limit($debut, $nbr_element_par_page) {
			require_once 'sources/models/DeliveryModel.php';
			return DeliveryModel::list_deliverys_limit($debut, $nbr_element_par_page);
		}

		public static function list_deliverys_limit_search($search, $debut, $nbr_element_par_page) {
			require_once 'sources/models/DeliveryModel.php';
			return DeliveryModel::list_deliverys_limit_search($search, $debut, $nbr_element_par_page);
		}
		
		public static function current_project_delivery() {
			require_once 'sources/models/DeliveryModel.php';
			return DeliveryModel::project_delivery($_GET['id']);
		}
		
		public static function delivery_deliverables() {
			require_once 'sources/models/DeliverableModel.php';
			return DeliverableModel::delivery_deliverables($_GET['id']);
		}
	}
?>