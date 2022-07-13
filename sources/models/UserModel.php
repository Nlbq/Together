<?php
	/**
	* Classe UserModel
	*/
	class UserModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('user', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('user', '*', array('user_id' => $id));
		}

		public static function customer_list() {
			$BDD = new Database();
			return $BDD->selectAll('user', '*', array('role' => 'customer'));
		}

		public static function customers_list_limit($debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM user WHERE role = 'customer' ORDER BY user_id DESC LIMIT $debut , $nbElements");
		}

		public static function customers_list_limit_search($search, $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM user WHERE role = 'customer' AND CONCAT(firstname, lastname, email_address) LIKE '%" . $search . "%' ORDER BY user_id DESC LIMIT $debut , $nbElements");
		}

	}
?>