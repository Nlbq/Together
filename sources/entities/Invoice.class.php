<?php
	/**
	* Classe Invoice
	*/
	class Invoice {
		//Private attributes
		private $invoice_id, $user_id, $at, $status, $payment_method;

		//Constructor
		public function __construct() {
			$this->invoice_id = '';
			$this->user_id = '';
			$this->at = '';
			$this->status = '';
			$this->payment_method = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/InvoiceModel.php';
			$this->serialise(InvoiceModel::recovery_element($this->invoice_id));
		}

		//Method to add an entry to the table invoice
		public function add() {
			$BDD = new Database();
			return $BDD->insert('invoice', $this->unserialise());
		}

		//Method to modify a table entry invoice
		public function edit() {
			$BDD = new Database();
			return $BDD->update('invoice', $this->unserialise(), array('invoice_id' => $this->invoice_id));
		}

		//Method to remove an entry from the table invoice
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('invoice', array('invoice_id' => $this->invoice_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('invoice_id' , 'user_id' , 'at' , 'status' , 'payment_method');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('invoice_id' , 'user_id' , 'at' , 'status' , 'payment_method');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getInvoice_id() { return $this->invoice_id; }
		public function getUser_id() { return $this->user_id; }
		public function getAt() { return $this->at; }
		public function getStatus() { return $this->status; }
		public function getPayment_method() { return $this->payment_method; }

		//Setters
		public function setInvoice_id($invoice_id) { return $this->invoice_id = $invoice_id; }
		public function setUser_id($user_id) { return $this->user_id = $user_id; }
		public function setAt($at) { return $this->at = $at; }
		public function setStatus($status) { return $this->status = $status; }
		public function setPayment_method($payment_method) { return $this->payment_method = $payment_method; }
	}
?>