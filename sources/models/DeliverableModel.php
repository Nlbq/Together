<?php
	/**
	* Classe DeliverableModel
	*/
	class DeliverableModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('deliverable', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('deliverable', '*', array('deliverable_id' => $id));
		}

		public static function delivery_deliverables($id) {
			$BDD = new Database();
			return $BDD->selectAll('deliverable', '*', array('delivery_id' => $id));
		}
	}
?>