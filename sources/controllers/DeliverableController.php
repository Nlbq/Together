<?php
	/**
	* Classe DeliverableController
	*/
	class DeliverableController {

		public static function index() {
			$GLOBALS['variable_section'] = 'Deliverable/index';
			$GLOBALS['list_deliverables'] = DeliverableController::list_deliverables();
			if (isset($_POST['delivery_id'])) {
				  DeliverableController::add(); 
			}
	}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Deliverable/list_view';
			$GLOBALS['list_deliverables'] = DeliverableController::list_deliverables();
		}

		public static function view() {
			$GLOBALS['variable_section'] = 'Deliverable/view';
		}

		public static function add() {
			if($_SESSION['utilisateur']->getRole() == 'admin'){
				$GLOBALS['variable_section'] = 'Deliverable/add';
				
				if (isset($_FILES['deliverable'])) {					

					upload_file('deliverable', 'uploads/deliverables/');
					$_POST['deliverable'] = 'uploads/deliverables/'.$_FILES['deliverable']['name'];

					$one_deliverable = new Deliverable();
					$one_deliverable->serialise($_POST);
					$one_deliverable->setDelivery_id(intval($_GET['id']));
					$one_deliverable->setLink($_FILES['deliverable']['name']);
					$one_deliverable->add();

					header('Location: index.php?tab=delivery');
				}
			}
		}


		public static function edit() {
			$GLOBALS['variable_section'] = 'Deliverable/edit';
			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=deliverable');
			} else {
				$one_deliverable = new Deliverable();
				$one_deliverable->setDeliverable_id(intval($_GET['id']));
				$one_deliverable->recover();

				if (isset($_POST['delivery_id'])) {
					$one_deliverable->serialise($_POST);
					$one_deliverable->edit();
				}

				$GLOBALS['one_deliverable'] = $one_deliverable;
			}
		}

		public static function delete() {
			$one_deliverable = new Deliverable();
			$one_deliverable->setDeliverable_id(intval($_GET['id']));
			$one_deliverable->recover();

			$one_delivery = new Delivery();
			$one_delivery -> setDelivery_id($one_deliverable->getDelivery_id());
			$one_delivery->recover();
			
			$one_deliverable->delete();
			header('Location: index.php?tab=delivery&action=view&id='.$one_delivery->getDelivery_id());
		}

		public static function list_deliverables() {
			require_once 'sources/models/DeliverableModel.php';
			return DeliverableModel::result_data();
		}
	}
?>