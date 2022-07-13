<?php
	/**
	* Classe Delivery
	*/
	class Delivery {
		//Private attributes
		private $delivery_id, $project_id, $delivery_date, $description, $validation, $validation_date;

		//Constructor
		public function __construct() {
			$this->delivery_id = '';
			$this->project_id = '';
			$this->delivery_date = '';
			$this->description = '';
			$this->validation = '';
			$this->validation_date = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/DeliveryModel.php';
			$this->serialise(DeliveryModel::recovery_element($this->delivery_id));
		}

		//Method to add an entry to the table delivery
		public function add() {
			$BDD = new Database();
			return $BDD->insert('delivery', $this->unserialise());
		}

		//Method to modify a table entry delivery
		public function edit() {
			$BDD = new Database();
			return $BDD->update('delivery', $this->unserialise(), array('delivery_id' => $this->delivery_id));
		}

		//Method to remove an entry from the table delivery
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('delivery', array('delivery_id' => $this->delivery_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('delivery_id' , 'project_id' , 'delivery_date' , 'description' , 'validation' , 'validation_date');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('delivery_id' , 'project_id' , 'delivery_date' , 'description' , 'validation' , 'validation_date');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getDelivery_id() { return $this->delivery_id; }
		public function getProject_id() { return $this->project_id; }
		public function getDelivery_date() { return $this->delivery_date; }
		public function getDescription() { return $this->description; }
		public function getValidation() { return $this->validation; }
		public function getValidation_date() { return $this->validation_date; }

		//Setters
		public function setDelivery_id($delivery_id) { return $this->delivery_id = $delivery_id; }
		public function setProject_id($project_id) { return $this->project_id = $project_id; }
		public function setDelivery_date($delivery_date) { return $this->delivery_date = $delivery_date; }
		public function setDescription($description) { return $this->description = $description; }
		public function setValidation($validation) { return $this->validation = $validation; }
		public function setValidation_date($validation_date) { return $this->validation_date = $validation_date; }
	}
?>