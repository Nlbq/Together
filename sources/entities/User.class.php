<?php

	/**
	* Classe User
	*/
	class User {
		//Private attributes
		private $user_id, $role, $firstname, $lastname, $gender, $email_address, $password, $token, $status;

		//Constructor
		public function __construct() {
			$this->user_id = '';
			$this->role = '';
			$this->firstname = '';
			$this->lastname = '';
			$this->gender = '';
			$this->email_address = '';
			$this->password = '';
			$this->token = '';
			$this->status = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/UserModel.php';
			$this->serialise(UserModel::recovery_element($this->user_id));
		}

		//Method to add an entry to the table user
		public function add() {
			$BDD = new Database();
			return $BDD->insert('user', $this->unserialise());
		}

		//Method to modify a table entry user
		public function edit() {
			$BDD = new Database();
			return $BDD->update('user', $this->unserialise(), array('user_id' => $this->user_id));
		}

		//Method to remove an entry from the table user
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('user', array('user_id' => $this->user_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('user_id' , 'role' , 'firstname' , 'lastname' , 'gender' , 'email_address' , 'password' , 'token' , 'status');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('user_id' , 'role' , 'firstname' , 'lastname' , 'gender' , 'email_address' , 'password' , 'token' , 'status');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getUser_id() { return $this->user_id; }
		public function getRole() { return $this->role; }
		public function getFirstname() { return $this->firstname; }
		public function getLastname() { return $this->lastname; }
		public function getGender() { return $this->gender; }
		public function getEmail_address() { return $this->email_address; }
		public function getPassword() { return $this->password; }
		public function getToken() { return $this->token; }
		public function getStatus() { return $this->status; }

		//Setters
		public function setUser_id($user_id) { return $this->user_id = $user_id; }
		public function setRole($role) { return $this->role = $role; }
		public function setFirstname($firstname) { return $this->firstname = $firstname; }
		public function setLastname($lastname) { return $this->lastname = $lastname; }
		public function setGender($gender) { return $this->gender = $gender; }
		public function setEmail_address($email_address) { return $this->email_address = $email_address; }
		public function setPassword($password) { return $this->password = $password; }
		public function setToken($token) { return $this->token = $token; }
		public function setStatus($status) { return $this->status = $status; }
	}
?>