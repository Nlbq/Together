<?php
if (!isset($_GET['action'])) {
	Prospect_eventController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			Prospect_eventController::list_view();
			break;

		case 'view':
			Prospect_eventController::view();
			break;

		case 'add':
			Prospect_eventController::add();
			break;

		case 'edit':
			Prospect_eventController::edit();
			break;

		case 'delete':
			Prospect_eventController::delete();
			break;
	}
}