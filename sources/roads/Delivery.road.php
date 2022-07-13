<?php
if (!isset($_GET['action'])) {
	DeliveryController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			DeliveryController::list_view();
			break;

		case 'view':
			DeliveryController::view();
			break;

		case 'add':
			DeliveryController::add();
			break;

		case 'edit':
			DeliveryController::edit();
			break;

		case 'delete':
			DeliveryController::delete();
			break;

		case 'validate':
			DeliveryController::validate();
			break;

		case 'validateDisconnected':
			DeliveryController::validateDisconnected();
			break;
			
		case 'send_validation_mail':
			DeliveryController::sendValidationMail();
			break;

		case 'deliveryView':
			DeliveryController::deliveryView();
			break;
		
	}
}