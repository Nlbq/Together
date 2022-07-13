<?php
	/**
	* Classe Prospect_eventModel
	*/
	class Prospect_eventModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('prospect_event', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('prospect_event', '*', array('prospect_event_id' => $id));
		}
		public static function list_prospect_event($id) {
			$BDD = new Database();
			return $BDD->selectAll('prospect_event', '*', array('prospect_id' => $id), ' ORDER BY prospect_event_id DESC ');
		}

		public static function recuperer_stat_event() {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT COUNT(*) AS nombre, type FROM `prospect_event` GROUP BY `type`;");
		}
	}
?>