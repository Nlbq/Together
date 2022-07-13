<?php
	/**
	* Classe InvoiceController
	*/
	class InvoiceController {

		public static function index() {
			if ($_SESSION['utilisateur']->getRole() == 'admin'){

				$GLOBALS['variable_section'] = 'Invoice/index';

				$customers_invoices_count = count(InvoiceController::list_invoices());
				$nbr_element_par_page=5;
				$GLOBALS['nbr_de_pages']= ceil($customers_invoices_count/$nbr_element_par_page);
				// sdisplay($customers_invoices_count);

				//Pagination
				if(!isset($_GET['p'])){
					$p = 1;
					$debut=($p-1)*$nbr_element_par_page;
				}
				else{
					if( $_GET['p'] < 1){
						$_GET['p'] = 1;
					}

					if($_GET['p'] > $GLOBALS['nbr_de_pages']){
							$_GET['p'] = $GLOBALS['nbr_de_pages'];
					}

					$p = $_GET['p'];
					$nbr_element_par_page=5;
					$GLOBALS['nbr_de_pages']= ceil($customers_invoices_count/$nbr_element_par_page);
					$debut=($p-1)*$nbr_element_par_page;
				}

				//Recherche
				if(!isset($_POST['search'])){
					$GLOBALS['list_invoices'] = InvoiceController::list_invoices_limit($debut, $nbr_element_par_page);
					$GLOBALS['searchValue'] = '';
				}else{
					if(empty(InvoiceController::list_invoices_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page))){
						$GLOBALS['list_invoices'] = InvoiceController::list_invoices_limit($debut, $nbr_element_par_page);
						$GLOBALS['searchError']= "Aucun résultat";
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}else{
						$GLOBALS['list_invoices'] = InvoiceController::list_invoices_limit_search(htmlspecialchars($_POST['search']), $debut, $nbr_element_par_page);
						$GLOBALS['searchValue'] = htmlspecialchars($_POST['search']);
					}
				}

				$GLOBALS['p'] = $p;
			}else {
				header('Location: index.php');
			}
		}

		public static function list_view() {
			$GLOBALS['variable_section'] = 'Invoice/list_view';
			$GLOBALS['list_invoices'] = InvoiceController::list_invoices();
		}

		public static function view() {
			$GLOBALS['variable_section'] = 'Invoice/view';
		}

		public static function add() {
			$GLOBALS['variable_section'] = 'Invoice/add';

			$GLOBALS['list_customer'] = UserController::list_customers();

			if (isset($_POST['user_id'])) {

				$_POST['status'] = 1;
				$_POST['at'] = 'NOW()';

				$one_invoice = new Invoice();
				$one_invoice->serialise($_POST);
				$id=$one_invoice->add();

				header('Location: index.php?tab=invoice_line&id='.$id);
			}
		}

		public static function edit() {
			$GLOBALS['variable_section'] = 'Invoice/edit';
			if (!isset($_GET['id'])) {
				header('Location: index.php?tab=invoice');
			} else {
				$one_invoice = new Invoice();
				$one_invoice->setInvoice_id(intval($_GET['id']));
				$one_invoice->recover();

				if (isset($_POST['user_id'])) {
					$one_invoice->serialise($_POST);
					$one_invoice->edit();
				}

				$GLOBALS['one_invoice'] = $one_invoice;
			}
		}
		

		public static function download() {

			// RECUPERATION DES INFORMATIONS

			$one_invoice = new Invoice();
			$one_invoice->setInvoice_id(intval($_GET['id']));
			$one_invoice->recover();

			$invoice_lines = Invoice_lineController::list_invoice_lines($_GET['id']);

			$one_user = new User();
			$one_user->setUser_id($one_invoice->getUser_id());
			$one_user->recover();

			$one_customer_information = new Customer_information();
			$one_customer_information->setUser_id($one_invoice->getUser_id());
			$one_customer_information->recover();

			
			// GENERER LE PDF

			$pdf = new Pdfcreator($one_invoice, $invoice_lines, $one_customer_information);

			// sdisplay($pdf);
			$pdf->setPDFHead(array('Together by Lozako', 'Votre facture', 'Essai', 'tunnel, lp, etc', $one_invoice));
			$pdf->print_pdf();

		}


		public static function delete() {
			$one_invoice = new Invoice();
			$one_invoice->setInvoice_id(intval($_GET['id']));
			$one_invoice->delete();
			header('Location: index.php?tab=invoice');
		}

		public static function list_invoices() {
			require_once 'sources/models/InvoiceModel.php';
			return InvoiceModel::result_data();
		}

		public static function list_invoices_limit($debut, $nbr_element_par_page) {
			require_once 'sources/models/InvoiceModel.php';
			return InvoiceModel::list_invoices_limit($debut, $nbr_element_par_page);
		}

		public static function list_invoices_limit_search($search, $debut, $nbr_element_par_page) {
			require_once 'sources/models/InvoiceModel.php';
			return InvoiceModel::list_invoices_limit_search($search, $debut, $nbr_element_par_page);
		}

		public static function duplicate() {
			$one_invoice = new Invoice();
			$one_invoice->setInvoice_id(intval($_GET['id']));
			$one_invoice->recover();

			// display($one_invoice);

			$new_invoice = new Invoice();
			$new_invoice->serialise($one_invoice->unserialise());
			$new_invoice->setAt('NOW()');
			$new_invoice->setInvoice_id('');
			$new_invoice->setStatus(1);
			$id=$new_invoice->add();

			// display($new_invoice);
			header('Location: index.php?tab=invoice');
			die();
		}
	}
?>