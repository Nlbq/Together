<?php
//On vérifie tout d'abord que le debugging_mode soit activé
if (isset($_SESSION['debugging_mode']) && $_SESSION['debugging_mode'] == true) {
	// On imprime la barre de debugging
	require 'views/bar.php';
}
	