<?php
if (!isset($_GET['action'])) {
	ProjectController::index();
} else {
	switch ($_GET['action']) {
		case 'list_view':
			ProjectController::list_view();
			break;
		case 'view':
			ProjectController::view();
			break;
		case 'add':
			ProjectController::add();
			break;
		case 'edit':
			ProjectController::edit();
			break;
		case 'delete':
			ProjectController::delete();
			break;
		case 'viewCustomerProjects':
			ProjectController::customer_list_projects();
			break;
	}
}