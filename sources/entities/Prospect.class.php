<?php
	/**
	* Classe Prospect
	*/
	class Prospect {
		//Private attributes
		private $prospect_id, $company_name, $firstname, $lastname, $email_address, $phone_number, $source, $type_source, $status, $gender;

		//Constructor
		public function __construct() {
			$this->prospect_id = '';
			$this->company_name = '';
			$this->firstname = '';
			$this->lastname = '';
			$this->email_address = '';
			$this->phone_number = '';
			$this->source = '';
			$this->type_source = '';
			$this->status = '';
			$this->gender = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/ProspectModel.php';
			$this->serialise(ProspectModel::recovery_element($this->prospect_id));
		}

		//Method to add an entry to the table prospect
		public function add() {
			$BDD = new Database();
			return $BDD->insert('prospect', $this->unserialise());
		}

		//Method to modify a table entry prospect
		public function edit() {
			$BDD = new Database();
			return $BDD->update('prospect', $this->unserialise(), array('prospect_id' => $this->prospect_id));
		}

		//Method to remove an entry from the table prospect
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('prospect', array('prospect_id' => $this->prospect_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('prospect_id' , 'company_name' , 'firstname' , 'lastname' , 'email_address' , 'phone_number' , 'source' , 'type_source' , 'status' , 'gender');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('prospect_id' , 'company_name' , 'firstname' , 'lastname' , 'email_address' , 'phone_number' , 'source' , 'type_source' , 'status' , 'gender');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getProspect_id() { return $this->prospect_id; }
		public function getCompany_name() { return $this->company_name; }
		public function getFirstname() { return $this->firstname; }
		public function getLastname() { return $this->lastname; }
		public function getEmail_address() { return $this->email_address; }
		public function getPhone_number() { return $this->phone_number; }
		public function getSource() { return $this->source; }
		public function getType_source() { return $this->type_source; }
		public function getStatus() { return $this->status; }
		public function getGender() { return $this->gender; }

		//Setters
		public function setProspect_id($prospect_id) { return $this->prospect_id = $prospect_id; }
		public function setCompany_name($company_name) { return $this->company_name = $company_name; }
		public function setFirstname($firstname) { return $this->firstname = $firstname; }
		public function setLastname($lastname) { return $this->lastname = $lastname; }
		public function setEmail_address($email_address) { return $this->email_address = $email_address; }
		public function setPhone_number($phone_number) { return $this->phone_number = $phone_number; }
		public function setSource($source) { return $this->source = $source; }
		public function setType_source($type_source) { return $this->type_source = $type_source; }
		public function setStatus($status) { return $this->status = $status; }
		public function setGender($gender) { return $this->gender = $gender; }
	}
?>