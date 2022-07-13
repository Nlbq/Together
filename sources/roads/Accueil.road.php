<?php
if (!isset($_GET['action'])) {
	AccueilController::index();
} else {
	switch ($_GET['action']) {
		
		case 'logout':
			AccueilController::logout();
			break;
	}
}
