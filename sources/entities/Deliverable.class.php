<?php
	/**
	* Classe Deliverable
	*/
	class Deliverable {
		//Private attributes
		private $deliverable_id, $delivery_id, $type, $link;

		//Constructor
		public function __construct() {
			$this->deliverable_id = '';
			$this->delivery_id = '';
			$this->type = '';
			$this->link = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/DeliverableModel.php';
			$this->serialise(DeliverableModel::recovery_element($this->deliverable_id));
		}

		//Method to add an entry to the table deliverable
		public function add() {
			$BDD = new Database();
			return $BDD->insert('deliverable', $this->unserialise());
		}

		//Method to modify a table entry deliverable
		public function edit() {
			$BDD = new Database();
			return $BDD->update('deliverable', $this->unserialise(), array('deliverable_id' => $this->deliverable_id));
		}

		//Method to remove an entry from the table deliverable
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('deliverable', array('deliverable_id' => $this->deliverable_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('deliverable_id' , 'delivery_id' , 'type' , 'link');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('deliverable_id' , 'delivery_id' , 'type' , 'link');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getDeliverable_id() { return $this->deliverable_id; }
		public function getDelivery_id() { return $this->delivery_id; }
		public function getType() { return $this->type; }
		public function getLink() { return $this->link; }

		//Setters
		public function setDeliverable_id($deliverable_id) { return $this->deliverable_id = $deliverable_id; }
		public function setDelivery_id($delivery_id) { return $this->delivery_id = $delivery_id; }
		public function setType($type) { return $this->type = $type; }
		public function setLink($link) { return $this->link = $link; }
	}
?>