<?php
if (!isset($_GET['action'])) {
	InvoiceController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			InvoiceController::list_view();
			break;

		case 'view':
			InvoiceController::view();
			break;

		case 'add':
			InvoiceController::add();
			break;

		case 'edit':
			InvoiceController::edit();
			break;

		case 'delete':
			InvoiceController::delete();
			break;

		case 'download':
			InvoiceController::download();
			break;

		case 'duplicate':
			InvoiceController::duplicate();
			break;
	}
}