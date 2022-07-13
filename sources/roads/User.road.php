<?php
if (!isset($_GET['action'])) {
	UserController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			UserController::list_view();
			break;

		case 'view':
			UserController::view();
			break;

		case 'add':
			UserController::add();
			break;

		case 'edit':
			UserController::edit();
			break;

		case 'delete':
			UserController::delete();
			break;

	}
}