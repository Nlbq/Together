<?php
	/**
	* Classe Invoice_lineController
	*/
	class Invoice_lineController {

		public static function index() {
			$GLOBALS['variable_section'] = 'Invoice_line/index';
			$GLOBALS['list_invoice_lines'] = Invoice_lineController::list_invoice_lines($_GET['id']);

			$one_invoice = new Invoice();
			$one_invoice->setInvoice_id(intval($_GET['id']));
			$one_invoice->recover();

			$one_customer_information = new Customer_information();
			$one_customer_information->setUser_id($one_invoice->getUser_id());
			$one_customer_information->recover();

			$one_user = new User();
			$one_user->setUser_id($one_invoice->getUser_id());
			$one_user->recover();

			$GLOBALS['one_invoice'] = $one_invoice;
			$GLOBALS['one_customer_information'] = $one_customer_information;
			$GLOBALS['one_user'] = $one_user;
	}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Invoice_line/list_view';
			$GLOBALS['list_invoice_lines'] = Invoice_lineController::list_invoice_lines();
		}

		public static function view() {
			$GLOBALS['variable_section'] = 'Invoice_line/view';

		}

		public static function add() {
			$GLOBALS['variable_section'] = 'Invoice_line/add';
			$GLOBALS['list_customer'] = UserController::list_customers();
			if (isset($_POST['title'])) {
				$_POST['invoice_id']=$_GET['id'];
				$one_invoice_line = new Invoice_line();
				$one_invoice_line->serialise($_POST);
				$one_invoice_line->add();

				header('Location: index.php?tab=invoice_line&id='.$_GET['id']);
			}
		}

		public static function edit() {
			$GLOBALS['variable_section'] = 'Invoice_line/edit';
			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=invoice_line');
			} else {
				$one_invoice_line = new Invoice_line();
				$one_invoice_line->setInvoice_line_id(intval($_GET['id']));
				$one_invoice_line->recover();

				if (isset($_POST['invoice_id'])) {
					$one_invoice_line->serialise($_POST);
					$one_invoice_line->edit();
					header('Location: index.php?tab=invoice_line&id='.$one_invoice_line->getInvoice_id());
				}

				$GLOBALS['one_invoice_line'] = $one_invoice_line;
			}
		}

		public static function delete() {
			$one_invoice_line = new Invoice_line();
			$one_invoice_line->setInvoice_line_id(intval($_GET['id']));
			$one_invoice_line->recover();
			$one_invoice_line->delete();
			header('Location: index.php?tab=invoice_line&id='.$one_invoice_line->getInvoice_id());
		}

		public static function list_invoice_lines($id) {
			require_once 'sources/models/Invoice_lineModel.php';
			return Invoice_lineModel::result_data($id);
		}
	}
?>