<?php
	/**
	* Classe Prospect_event
	*/
	class Prospect_event {
		//Private attributes
		private $prospect_event_id, $prospect_id, $comment, $at, $type;

		//Constructor
		public function __construct() {
			$this->prospect_event_id = '';
			$this->prospect_id = '';
			$this->comment = '';
			$this->at = '';
			$this->type = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/Prospect_eventModel.php';
			$this->serialise(Prospect_eventModel::recovery_element($this->prospect_event_id));
		}

		//Method to add an entry to the table prospect_event
		public function add() {
			$BDD = new Database();
			return $BDD->insert('prospect_event', $this->unserialise());
		}

		//Method to modify a table entry prospect_event
		public function edit() {
			$BDD = new Database();
			return $BDD->update('prospect_event', $this->unserialise(), array('prospect_event_id' => $this->prospect_event_id));
		}

		//Method to remove an entry from the table prospect_event
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('prospect_event', array('prospect_event_id' => $this->prospect_event_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('prospect_event_id' , 'prospect_id' , 'comment' , 'at' , 'type');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('prospect_event_id' , 'prospect_id' , 'comment' , 'at' , 'type');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getProspect_event_id() { return $this->prospect_event_id; }
		public function getProspect_id() { return $this->prospect_id; }
		public function getComment() { return $this->comment; }
		public function getAt() { return $this->at; }
		public function getType() { return $this->type; }

		//Setters
		public function setProspect_event_id($prospect_event_id) { return $this->prospect_event_id = $prospect_event_id; }
		public function setProspect_id($prospect_id) { return $this->prospect_id = $prospect_id; }
		public function setComment($comment) { return $this->comment = $comment; }
		public function setAt($at) { return $this->at = $at; }
		public function setType($type) { return $this->type = $type; }
	}
?>