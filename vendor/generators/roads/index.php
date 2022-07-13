<?php

require '../../functions.php';
require '../../../config/app.php';
require '../../database.php';
require '../recover_data.php';
require 'Generateur.class.php';
// display($recover_data);

$tt = array();
foreach ($BDD->selectAll('valid_road', '*', 1) as $key => $value) {
	$tt[] = $value['tab'];
}

$results = 'Tables_in_' . $config['Database']['database'];

$p = 0;
foreach ($BDD->selectAllLibre('SHOW tables') as $key => $value) {
	if (!in_array($value[$results], $tt)) {
		$BDD->insert('valid_road', array('tab' => $value[$results], 'road' => $value[$results]));
	}
}

$unGenerateur = new Generateur($recover_data, '../../../sources/roads');
$unGenerateur->ecrireLesClasses();


?>