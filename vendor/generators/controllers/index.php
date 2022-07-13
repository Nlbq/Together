<?php
require '../../functions.php';
require '../../../config/app.php';
require '../../database.php';
require '../recover_data.php';
require 'Generateur.class.php';
// display($recover_data);
$unGenerateur = new Generateur($recover_data, '../../../sources/controllers');
$unGenerateur->ecrireLesClasses();
?>