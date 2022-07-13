<?php
if (!isset($_GET['action'])) {
	DeliverableController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			DeliverableController::list_view();
			break;

		case 'view':
			DeliverableController::view();
			break;

		case 'add':
			DeliverableController::add();
			break;

		case 'edit':
			DeliverableController::edit();
			break;

		case 'delete':
			DeliverableController::delete();
			break;
	}
}