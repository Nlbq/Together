<?php
	/**
	* Classe Project
	*/
	class Project {
		//Private attributes
		private $project_id, $user_id, $name, $type, $description, $status;

		//Constructor
		public function __construct() {
			$this->project_id = '';
			$this->user_id = '';
			$this->name = '';
			$this->type = '';
			$this->description = '';
			$this->status = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/ProjectModel.php';
			$this->serialise(ProjectModel::recovery_element($this->project_id));
		}

		//Method to add an entry to the table project
		public function add() {
			$BDD = new Database();
			return $BDD->insert('project', $this->unserialise());
		}

		//Method to modify a table entry project
		public function edit() {
			$BDD = new Database();
			return $BDD->update('project', $this->unserialise(), array('project_id' => $this->project_id));
		}

		//Method to remove an entry from the table project
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('project', array('project_id' => $this->project_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('project_id' , 'user_id' , 'name' , 'type' , 'description' , 'status');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('project_id' , 'user_id' , 'name' , 'type' , 'description' , 'status');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getProject_id() { return $this->project_id; }
		public function getUser_id() { return $this->user_id; }
		public function getName() { return $this->name; }
		public function getType() { return $this->type; }
		public function getDescription() { return $this->description; }
		public function getStatus() { return $this->status; }

		//Setters
		public function setProject_id($project_id) { return $this->project_id = $project_id; }
		public function setUser_id($user_id) { return $this->user_id = $user_id; }
		public function setName($name) { return $this->name = $name; }
		public function setType($type) { return $this->type = $type; }
		public function setDescription($description) { return $this->description = $description; }
		public function setStatus($status) { return $this->status = $status; }
	}
?>