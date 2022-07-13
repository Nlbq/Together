<?php
	/**
	* Classe Prospect_eventController
	*/
	class Prospect_eventController {

		public static function index() {
			$GLOBALS['variable_section'] = 'Prospect_event/index';
			$GLOBALS['list_prospect_events'] = Prospect_eventController::list_prospect_events();
			if (isset($_POST['prospect_id'])) {
				  Prospect_eventController::add(); 
			}
	}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Prospect_event/list_view';
			$GLOBALS['list_prospect_events'] = Prospect_eventController::list_prospect_events();
		}

		public static function view() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'Prospect_event/view';

				$one_prospect_event = new Prospect_event();
				$one_prospect_event->setProspect_event_id(intval($_GET['id']));
				$one_prospect_event->recover();

				
				$one_prospect = new Prospect();
				$one_prospect->setProspect_id($one_prospect_event->getProspect_id());
				$one_prospect->recover();
				
				$GLOBALS['one_prospect_event'] = $one_prospect_event;
				$GLOBALS['one_prospect'] = $one_prospect;


			}else {
				header('Location: index.php');
			}

		}

		public static function add() {
			$GLOBALS['variable_section'] = 'Prospect_event/add';
			$_POST['prospect_id'] = $_GET['id'];
			if (isset($_POST['type'])) {
				$one_prospect_event = new Prospect_event();
				$one_prospect_event->serialise($_POST);
				$one_prospect_event->add();

				header("Location: index.php?tab=prospect&action=view&id=".$_GET['id']); 
			}
			$GLOBALS['liste_type'] = array('Message', 'Mail', 'Appel', 'Visio');
		}

		public static function edit() {
			$GLOBALS['variable_section'] = 'Prospect_event/edit';
			$GLOBALS['liste_type'] = array('Message', 'Appel', 'Visio');

			
				$one_prospect_event = new Prospect_event();
				$one_prospect_event->setProspect_event_id(intval($_GET['id']));
				$one_prospect_event->recover();

				if (isset($_POST['type'])) {

					$one_prospect_event->serialise($_POST);
					$one_prospect_event->edit();

					// sdisplay($_SERVER['HTTP_REFERER']);

					header("Location: index.php?tab=prospect&action=view&id=".$one_prospect_event->getProspect_id()); 
				}

				$GLOBALS['one_prospect_event'] = $one_prospect_event;
			
		}

		public static function delete() {
			$one_prospect_event = new Prospect_event();
			$one_prospect_event->setProspect_event_id(intval($_GET['id']));
			$one_prospect_event->delete();
			header("location:".  $_SERVER['HTTP_REFERER']);  
		}

		public static function list_prospect_events() {
			require_once 'sources/models/Prospect_eventModel.php';
			return Prospect_eventModel::result_data();
		}

		public static function list_events($id) {
			require_once 'sources/models/Prospect_eventModel.php';
			return Prospect_eventModel::list_prospect_event($id);
		}
	}
?>