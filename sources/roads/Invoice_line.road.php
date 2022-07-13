<?php
if (!isset($_GET['action'])) {
	Invoice_lineController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			Invoice_lineController::list_view();
			break;

		case 'view':
			Invoice_lineController::view();
			break;

		case 'add':
			Invoice_lineController::add();
			break;

		case 'edit':
			Invoice_lineController::edit();
			break;

		case 'delete':
			Invoice_lineController::delete();
			break;
	}
}