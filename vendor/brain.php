<?php

require 'vendor/lib/autoloader.php';

Autoloader::register();

session_start();

$default_template_using = true;

//Inclusion de toutes les dépendances

require_once 'vendor/dependencies.php';

Notification::create();

//entrée stat

#StatisticController::add();

if (isset($_SESSION['unlocking_mode']) || (isset($_GET['tab']) && in_array($_GET['tab'], $tab_exception))) {
  require ($default_template_using) ? 'sources/views/default.php' : 'sources/views/' . $variable_section . '.php';
}


Notification::display();

Notification::refresh();
