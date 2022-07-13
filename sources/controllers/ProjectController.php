<?php
	/**
	* Classe ProjectController
	*/
	class ProjectController {

		public static function index() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){

				$GLOBALS['variable_section'] = 'Project/index';

				$customers_projects_count = count(ProjectController::list_projects());
				$nbr_element_par_page=5;
				$GLOBALS['nbr_de_pages']= ceil($customers_projects_count/$nbr_element_par_page);


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
					$GLOBALS['nbr_de_pages']= ceil($customers_projects_count/$nbr_element_par_page);
					$debut=($p-1)*$nbr_element_par_page;
				}

				//Recherche
				if(!isset($_POST['search'])){
					$GLOBALS['list_projects'] = ProjectController::customers_projects_limit($debut, $nbr_element_par_page);
					$GLOBALS['searchValue'] = '';
				}else{
					if(empty(ProjectController::customers_projects_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page))){
						$GLOBALS['list_projects'] = ProjectController::customers_projects_limit($debut, $nbr_element_par_page);
						$GLOBALS['searchError'] = "Aucun résultat";
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}else{
						$GLOBALS['list_projects'] = ProjectController::customers_projects_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page);
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}
				}
				
				$GLOBALS['p'] = $p;

			}elseif($_SESSION['utilisateur']->getRole() == 'customer'){
				
				$GLOBALS['variable_section'] = 'Project/customer_view';
				$GLOBALS['list_projects'] = ProjectController::current_customer_list_projects();			

			}else{
				header('Location: index.php');
			}
			
		}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Project/list_view';
			$GLOBALS['list_projects'] = ProjectController::list_projects();
		}

		public static function view() {
			if($_SESSION['utilisateur']->getRole() == 'admin'){

			$GLOBALS['variable_section'] = 'Project/adminView';
			$GLOBALS['current_project'] = ProjectController::current_customer_project();
			$GLOBALS['project_list_deliverys'] = ProjectController::project_deliverys($_GET['id']);

			//récupération de l'id client dans l'url pour pouvoir revenir à la page précédente
			$one_project = new Project();
			$one_project->setProject_id(intval($_GET['id']));
			$one_project->recover();

			$one_user = new User();
			$one_user->setUser_id($one_project->getUser_id());
			$one_user->recover();

      $GLOBALS['one_project'] = $one_project;
			$GLOBALS['one_user'] = $one_user;

			}elseif($_SESSION['utilisateur']->getRole() == 'customer'){

				$GLOBALS['variable_section'] = 'Project/view';
				$GLOBALS['current_project'] = ProjectController::current_customer_project();
				$GLOBALS['project_list_deliverys'] = ProjectController::project_deliverys($_GET['id']);

			}else{
				header('Location: index.php');
			}
		}

		public static function add() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			$GLOBALS['variable_section'] = 'Project/add';
			
			//récupération de l'id utilisateur dans l'url pour pouvoir revenir à la page précédente
			$one_user = new User();
			$one_user->setUser_id(intval($_GET['id']));
			$one_user->recover();

			$GLOBALS['one_user'] = $one_user;
				
				//Ajout du projet
				if (isset($_POST['name'])) {

					$one_project = new Project();
					$one_project->serialise($_POST);
					$one_project->setUser_id($_GET['id']);
					$one_project->setStatus(0);
					$one_project->add();

					header('Location: index.php?tab=project&action=viewCustomerProjects&id='.$one_project->getUser_id());
				}
			}
		}
		public static function edit() {

			if ($_SESSION['utilisateur']->getRole() == 'admin'){
			  $GLOBALS['variable_section'] = 'Project/edit';

				if (!isset($_GET['id'])) {
					header('Location: index.php?tab=project');
				} else {
					//récupération de l'id du client
					$one_project = new Project();
					$one_project->setProject_id(intval($_GET['id']));
					$one_project->recover();

					$one_user = new User();
					$one_user->setUser_id($one_project->getUser_id());
					$one_user->recover();

		

					//Modification du projet
					if (isset($_POST['name'])) {
            
            $one_project->serialise($_POST);
						$one_project->edit();
            
						header('Location: index.php?tab=project&action=view&id='.$one_project->getProject_id());
					}
          
					$GLOBALS['one_project'] = $one_project;
					$GLOBALS['one_user'] = $one_user;
				}
			}
		}

		public static function delete() {
			$one_project = new Project();
			$one_project->setProject_id(intval($_GET['id']));
			$one_project->recover();
      
			$one_user = new User();
			$one_user->setUser_id($one_project->getUser_id());
			$one_user->recover();
      
			$one_project->delete();

      		header('Location: index.php?tab=project&action=viewCustomerProjects&id='.$one_user->getUser_id());
    	}

		public static function list_projects() {
			require_once 'sources/models/ProjectModel.php';
			return ProjectModel::result_data();
		}

		public static function customer_list_projects() {
			$GLOBALS['variable_section'] = 'Project/viewCustomerProjects';

			require_once 'sources/models/ProjectModel.php';
			$GLOBALS['customer_list_projects'] = ProjectModel::customer_projects($_GET['id']);

			$one_user = new User();
			$one_user->setUser_id($_GET['id']);
			$one_user->recover();

			$GLOBALS['one_user'] = $one_user;
		}	
	
		public static function current_customer_list_projects() {
			require_once 'sources/models/ProjectModel.php';
			return ProjectModel::customer_projects($_SESSION['utilisateur']->getUser_id());
		}	
		
		public static function current_customer_project() {
			require_once 'sources/models/ProjectModel.php';
			return ProjectModel::customer_project($_GET['id']);
		}
		
		public static function project_deliverys() {
			require_once 'sources/models/DeliveryModel.php';
			return DeliveryModel::project_deliverys($_GET['id']);
		}	

		public static function customers_projects_limit($debut, $nbr_element_par_page) {
			require_once 'sources/models/ProjectModel.php';
			return ProjectModel::customers_projects_limit($debut, $nbr_element_par_page);
		}	

		public static function customers_projects_limit_search($search, $debut, $nbr_element_par_page) {
			require_once 'sources/models/ProjectModel.php';
			return ProjectModel::customers_projects_limit_search($search, $debut, $nbr_element_par_page);
		}	
	}

?>