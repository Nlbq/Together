<?php
	/**
	* Classe ProspectModel
	*/
	class ProspectModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('prospect', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('prospect', '*', array('prospect_id' => $id));
		}

		public static function prospects_limit( $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM prospect ORDER BY prospect_id DESC LIMIT $debut , $nbElements");
		}

		public static function prospects_limit_search($search, $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM prospect WHERE CONCAT(company_name, firstname, lastname) LIKE '%" . $search . "%' ORDER BY prospect_id DESC LIMIT $debut , $nbElements");
		}

		public static function list_prospects() {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT COUNT(*) AS nombre, type FROM 'prospect_event' GROUP BY 'type'");
		}
	}
?>