<?php
	/**
	* Classe ProjectModel
	*/
	class ProjectModel {

		public static function result_data() {
			$BDD = new Database();
			return $BDD->selectAll('project', '*', 1);
		}

		public static function recovery_element($id) {
			$BDD = new Database();
			return $BDD->select('project', '*', array('project_id' => $id));
		}

		public static function customer_projects($id) {
			$BDD = new Database();
			return $BDD->selectAll('project', '*', array('user_id' => $id));
		}

		public static function customer_project($id) {
			$BDD = new Database();
			return $BDD->select('project', '*', array('project_id' => $id));
		}

		public static function customers_projects_limit( $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM project p INNER JOIN user u ON p.user_id = u.user_id ORDER BY project_id DESC LIMIT $debut , $nbElements");
		}

		public static function customers_projects_limit_search($search,  $debut, $nbElements) {
			$BDD = new Database();
			return $BDD->selectAllLibre("SELECT * FROM project p INNER JOIN user u ON p.user_id = u.user_id 
			WHERE CONCAT(firstname, lastname, name, type, description) LIKE '%" . $search . "%' ORDER BY project_id DESC LIMIT $debut , $nbElements");
		}
	}
?>