<?php
if (!isset($_GET['action'])) {
	Customer_informationController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			Customer_informationController::list_view();
			break;

		case 'view':
			Customer_informationController::view();
			break;

		case 'add':
			Customer_informationController::add();
			break;

		case 'edit':
			Customer_informationController::edit();
			break;

		case 'delete':
			Customer_informationController::delete();
			break;
	}
}