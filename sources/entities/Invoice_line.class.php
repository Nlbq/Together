<?php
	/**
	* Classe Invoice_line
	*/
	class Invoice_line {
		//Private attributes
		private $invoice_line_id, $invoice_id, $title, $price, $quantity, $reduction;

		//Constructor
		public function __construct() {
			$this->invoice_line_id = '';
			$this->invoice_id = '';
			$this->title = '';
			$this->price = '';
			$this->quantity = '';
			$this->reduction = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/Invoice_lineModel.php';
			$this->serialise(Invoice_lineModel::recovery_element($this->invoice_line_id));
		}

		//Method to add an entry to the table invoice_line
		public function add() {
			$BDD = new Database();
			return $BDD->insert('invoice_line', $this->unserialise());
		}

		//Method to modify a table entry invoice_line
		public function edit() {
			$BDD = new Database();
			return $BDD->update('invoice_line', $this->unserialise(), array('invoice_line_id' => $this->invoice_line_id));
		}

		//Method to remove an entry from the table invoice_line
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('invoice_line', array('invoice_line_id' => $this->invoice_line_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('invoice_line_id' , 'invoice_id' , 'title' , 'price' , 'quantity' , 'reduction');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('invoice_line_id' , 'invoice_id' , 'title' , 'price' , 'quantity' , 'reduction');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getInvoice_line_id() { return $this->invoice_line_id; }
		public function getInvoice_id() { return $this->invoice_id; }
		public function getTitle() { return $this->title; }
		public function getPrice() { return $this->price; }
		public function getQuantity() { return $this->quantity; }
		public function getReduction() { return $this->reduction; }

		//Setters
		public function setInvoice_line_id($invoice_line_id) { return $this->invoice_line_id = $invoice_line_id; }
		public function setInvoice_id($invoice_id) { return $this->invoice_id = $invoice_id; }
		public function setTitle($title) { return $this->title = $title; }
		public function setPrice($price) { return $this->price = $price; }
		public function setQuantity($quantity) { return $this->quantity = $quantity; }
		public function setReduction($reduction) { return $this->reduction = $reduction; }
	}
?>