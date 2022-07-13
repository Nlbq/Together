<?php
if (!isset($_GET['action'])) {
	ChangePasswordController::index();
} 
else {
	switch ($_GET['action']) {
		case 'token':
			ChangePasswordController::token();
			break;
	}
}