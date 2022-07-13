<?php
	/**
	* Classe Customer_information
	*/
	class Customer_information {
		//Private attributes
		private $customer_information_id, $user_id, $company_name, $address, $zip_code, $country, $city, $phone_number, $siret, $siren;

		//Constructor
		public function __construct() {
			$this->customer_information_id = '';
			$this->user_id = '';
			$this->company_name = '';
			$this->address = '';
			$this->zip_code = '';
			$this->country = '';
			$this->city = '';
			$this->phone_number = '';
			$this->siret = '';
			$this->siren = '';
		}

		//Méthodes

		//Method to assign an object data
		public function recover() {
			require_once 'sources/models/Customer_informationModel.php';
			$this->serialise(Customer_informationModel::recovery_element($this->user_id));
		}

		//Method to add an entry to the table customer_information
		public function add() {
			$BDD = new Database();
			return $BDD->insert('customer_information', $this->unserialise());
		}

		//Method to modify a table entry customer_information
		public function edit() {
			$BDD = new Database();
			return $BDD->update('customer_information', $this->unserialise(), array('customer_information_id' => $this->customer_information_id));
		}

		//Method to remove an entry from the table customer_information
		public function delete() {
			$BDD = new Database();
			return $BDD->delete('customer_information', array('customer_information_id' => $this->customer_information_id));
		}

		//Method to serialize
		public function serialise($tab) {
			$tableau = array('customer_information_id' , 'user_id' , 'company_name' , 'address' , 'zip_code' , 'country' , 'city' , 'phone_number' , 'siret' , 'siren');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('customer_information_id' , 'user_id' , 'company_name' , 'address' , 'zip_code' , 'country' , 'city' , 'phone_number' , 'siret' , 'siren');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}

		//Getters
		public function getCustomer_information_id() { return $this->customer_information_id; }
		public function getUser_id() { return $this->user_id; }
		public function getCompany_name() { return $this->company_name; }
		public function getAddress() { return $this->address; }
		public function getZip_code() { return $this->zip_code; }
		public function getCountry() { return $this->country; }
		public function getCity() { return $this->city; }
		public function getPhone_number() { return $this->phone_number; }
		public function getSiret() { return $this->siret; }
		public function getSiren() { return $this->siren; }

		//Setters
		public function setCustomer_information_id($customer_information_id) { return $this->customer_information_id = $customer_information_id; }
		public function setUser_id($user_id) { return $this->user_id = $user_id; }
		public function setCompany_name($company_name) { return $this->company_name = $company_name; }
		public function setAddress($address) { return $this->address = $address; }
		public function setZip_code($zip_code) { return $this->zip_code = $zip_code; }
		public function setCountry($country) { return $this->country = $country; }
		public function setCity($city) { return $this->city = $city; }
		public function setPhone_number($phone_number) { return $this->phone_number = $phone_number; }
		public function setSiret($siret) { return $this->siret = $siret; }
		public function setSiren($siren) { return $this->siren = $siren; }
	}
?>