<?php
if (!isset($_GET['action'])) {
	ProspectController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			ProspectController::list_view();
			break;

		case 'view':
			ProspectController::view();
			break;

		case 'add':
			ProspectController::add();
			break;

		case 'edit':
			ProspectController::edit();
			break;

		case 'delete':
			ProspectController::delete();
			break;

		case 'visualization':
			ProspectController::visualization();
			break;


			
	}
}