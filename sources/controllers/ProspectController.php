<?php
	/**
	* Classe ProspectController
	*/
	class ProspectController {

		public static function index() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){

				$GLOBALS['variable_section'] = 'Prospect/index';
				$GLOBALS['liste_statuts'] = array('Prospect', 'Client actif', 'Qualifié veille', 'Qualifié potentiel', 'Out','Client ancien', 'Banni');

				$prospects_count = count(ProspectController::list_prospects());
				$nbr_element_par_page=5;
				$GLOBALS['nbr_de_pages']= ceil($prospects_count/$nbr_element_par_page);

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
					$GLOBALS['nbr_de_pages']= ceil($prospects_count/$nbr_element_par_page);
					$debut=($p-1)*$nbr_element_par_page;
				}

				//Recherche
				if(!isset($_POST['search'])){
					$GLOBALS['list_prospects'] = ProspectController::prospects_limit($debut, $nbr_element_par_page);
					$GLOBALS['searchValue'] = '';
				}else{
					if(empty(ProspectController::prospects_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page))){
						$GLOBALS['list_prospects'] = ProspectController::prospects_limit($debut, $nbr_element_par_page);
						$GLOBALS['searchError'] = "Aucun résultat";
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}else{
						$GLOBALS['list_prospects'] = ProspectController::prospects_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page);	
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}
				}

				$GLOBALS['p'] = $p;
		
		}else {
			header('Location: index.php');
		}
	}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Prospect/list_view';
			$GLOBALS['list_prospects'] = ProspectController::list_prospects();
		}

		public static function view() {
			$GLOBALS['variable_section'] = 'Prospect/view';
			$GLOBALS['event_Types'] = array('Message' => 'primary', 'Mail' => 'warning', 'Appel' => 'success', 'Visio' => 'info' );

			$one_prospect = new Prospect();
			$one_prospect->setProspect_id(intval($_GET['id']));
			$one_prospect->recover();
			$GLOBALS['one_prospect']= $one_prospect;
			$GLOBALS['list_events'] = Prospect_eventController::list_events(intval($_GET['id']));
			
		}

		public static function add() {
			$GLOBALS['variable_section'] = 'Prospect/add';

			if (isset($_POST['company_name'])) {
				$one_prospect = new Prospect();
				$one_prospect->serialise($_POST);
				$one_prospect->add();

				header('Location: index.php?tab=prospect');
			}
			$GLOBALS['liste_statuts'] = array('Prospect', 'Client actif', 'Qualifié veille', 'Qualifié potentiel', 'Out','Client ancien', 'Banni');
			$GLOBALS['liste_sources'] = array('Réseau Social', "Site d'annonce", 'Mailing list', 'Site web', 'Recommandation','SEO');
		}

		public static function edit() {
			$GLOBALS['variable_section'] = 'Prospect/edit';
			$GLOBALS['liste_statuts'] = array('Prospect', 'Client actif', 'Qualifié veille', 'Qualifié potentiel', 'Out','Client ancien', 'Banni');
			$GLOBALS['liste_type_sources'] = array('Réseau Social', "Site d'annonce", 'Mailing list', 'Site web', 'Recommandation','SEO');

			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=prospect');
			} else {
				$one_prospect = new Prospect();
				$one_prospect->setProspect_id(intval($_GET['id']));
				$one_prospect->recover();

				if (isset($_POST['lastname'])) {
					$one_prospect->serialise($_POST);
					$one_prospect->edit();
					header('Location: index.php?tab=prospect');

				}
				$GLOBALS['one_prospect'] = $one_prospect;
			}
		}

		public static function delete() {
			$one_prospect = new Prospect();
			$one_prospect->setProspect_id(intval($_GET['id']));
			$one_prospect->delete();
			header('Location: index.php?tab=prospect');
		}

		public static function list_prospects() {
			require_once 'sources/models/ProspectModel.php';
			return ProspectModel::result_data();
		}

		public static function prospects_limit($debut, $nbr_element_par_page) {
			require_once 'sources/models/ProspectModel.php';
			return ProspectModel::prospects_limit($debut, $nbr_element_par_page);
		}	

		public static function prospects_limit_search($search, $debut, $nbr_element_par_page) {
			require_once 'sources/models/ProspectModel.php';
			return ProspectModel::prospects_limit_search($search, $debut, $nbr_element_par_page);
		}	

		public static function visualization() {
			require_once 'sources/models/Prospect_eventModel.php';
			$GLOBALS['stat'] =Prospect_eventModel::recuperer_stat_event();
			$GLOBALS['variable_section'] = 'Prospect/visualization';
			$GLOBALS['list_prospect_events'] = Prospect_eventController::list_prospect_events();


			//Ssdisplay($GLOBALS['stat']);


			
		}
	}
?>