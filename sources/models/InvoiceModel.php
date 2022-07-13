<?php
	/**
	* Classe InvoiceModel
	*/
	class InvoiceModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('invoice', '*', 1, 'ORDER BY invoice_id DESC');
		}

		public static function list_invoices_limit($debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM invoice i INNER JOIN user u ON u.user_id = i.user_id ORDER BY invoice_id DESC LIMIT $debut , $nbElements");
		}

		public static function list_invoices_limit_search($search, $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM invoice i INNER JOIN user u ON u.user_id = i.user_id 
			WHERE CONCAT(payment_method, firstname, lastname) LIKE '%" . $search . "%' ORDER BY invoice_id DESC LIMIT $debut , $nbElements");
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('invoice', '*', array('invoice_id' => $id));
		}
	}
?>