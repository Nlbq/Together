<?php
$BDD = new Database();
$results = 'Tables_in_' . $config['Database']['database'];
$recover_data = array();
foreach ($BDD->selectAllLibre('SHOW tables') as $key => $table)
	$recover_data[$table[$results]] = $BDD->selectAllLibre('DESCRIBE '.$table[$results]);