<?php
	/**
	* Classe Customer_informationModel
	*/
	class Customer_informationModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('customer_information', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('customer_information', '*', array('user_id' => $id));
		}

		public static function customer_informations($id) {
			$BDD = new Database();
			return $BDD->select('customer_information', '*', array('user_id' => $id));
		}
	}
?>