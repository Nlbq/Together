<?php
	/**
	* Classe DeliveryModel
	*/
	class DeliveryModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('delivery', '*', 1);
		}

		public static function list_deliverys_limit($debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT *, p.name as project_name, u.firstname as customer_firstname, u.lastname as customer_lastname, d.description as delivery_description 
			FROM delivery d INNER JOIN project p ON d.project_id = p.project_id JOIN user u ON p.user_id = u.user_id ORDER BY delivery_id DESC LIMIT $debut , $nbElements");
		}

		public static function list_deliverys_limit_search($search, $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT *, p.name as project_name, u.firstname as customer_firstname, u.lastname as customer_lastname, d.description as delivery_description 
			FROM delivery d INNER JOIN project p ON d.project_id = p.project_id JOIN user u ON p.user_id = u.user_id 
			WHERE CONCAT(firstname, lastname, name) LIKE '%" . $search . "%' ORDER BY delivery_id DESC LIMIT $debut , $nbElements");
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('delivery', '*', array('delivery_id' => $id));
		}

		public static function project_deliverys($id) {
			$BDD = new Database();
			return $BDD->selectAll('delivery', '*', array('project_id' => $id));
		}
		public static function project_delivery($id) {
			$BDD = new Database();
			return $BDD->select('delivery', '*', array('delivery_id' => $id));
		}
		
		public static function check_id_user($id) {
			$BDD = new Database();
			return $BDD->selectLibre('SELECT user_id AS id FROM delivery d INNER JOIN project p ON d.project_id = p.project_id WHERE delivery_id = '.$id)['id'];
		}
	}
?>