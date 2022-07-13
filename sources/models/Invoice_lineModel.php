<?php
	/**
	* Classe Invoice_lineModel
	*/
	class Invoice_lineModel {

		public static function result_data($id) {
			$BDD = new Database();
			return $BDD->selectAll('invoice_line', '*', array('invoice_id' => $id));
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('invoice_line', '*', array('invoice_line_id' => $id));
		}
	}
?>