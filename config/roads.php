<?php
//Si l'utilisateur n'est pas connecté
if (!isset($_SESSION['unlocking_mode'])) {
	$default_template_using = false;

	if (!isset($_GET['tab'])) {

		// Si on tente de se connecter
		if ((isset($_POST['loginEmail']) && isset($_POST['loginPwd'])) || isset($_COOKIE['idutilisateur'])) {

			$BDD = new Database();

			if (isset($_COOKIE['idutilisateur'])) {
				$requete = $BDD->select('user', '*', array('user_id' => $_COOKIE['idutilisateur'], 'password' => $_COOKIE['passwordhash']));

				if (!$requete) {
					if ($_COOKIE['idutilisateur']) {
						unset($_COOKIE['idutilisateur']);
						unset($_COOKIE['passwordhash']);
						setcookie("idutilisateur", "", time() - 3600);
						setcookie("passwordhash", "", time() - 3600);
					}
					header("Location: index.php");
				} else {
					$user_connecte = new User();
					$user_connecte->serialise($requete);

					$_SESSION['unlocking_mode'] = true;
					$_SESSION['utilisateur'] = $user_connecte;

					header('Location: index.php');
				}
			}
			else {
				$loginEmail = htmlspecialchars($_POST['loginEmail']);
				$loginPwd = htmlspecialchars($_POST['loginPwd']);

				$requete = $BDD->select('user', '*', array('email_address' => $loginEmail));

				if (!password_verify($loginPwd, $requete['password'])) {
					$reponse = false;

					if (empty($loginEmail) && empty($loginPwd)){
						$_SESSION['error'] = 'Veuillez renseigner les champs ci-dessous';
						header("Location: index.php");
					}elseif(empty($loginPwd)){
						$_SESSION['error'] = 'Mot de passe requis';
						header("Location: index.php");
					}elseif(empty($loginEmail)){
						$_SESSION['error'] = 'Email requis';
						header("Location: index.php");
					}
					else{
						$_SESSION['error'] = 'La combinaison email - mot de passe ne correspond à aucun compte';
						header("Location: index.php");
					}
				} else {
					$user_connecte = new User();
					$user_connecte->serialise($requete);

					$_SESSION['unlocking_mode'] = true;
					$_SESSION['utilisateur'] = $user_connecte;

					if(!empty($_POST['stayConnect'])){	
						setcookie("idutilisateur",$_SESSION['utilisateur']->getUser_id(),time() + 60*60*24*365);
						setcookie("passwordhash",$_SESSION['utilisateur']->getPassword(),time() + 60*60*24*365);
					}

					header('Location: index.php');
				}
			}		

		} else {
			if (isset($_SESSION['error'])) {
				$error = $_SESSION['error'];
				unset($_SESSION['error']);
			}
			if (isset($_SESSION['notification'])) {
				$notification = $_SESSION['notification'];
				unset($_SESSION['notification']);
			}
			include('sources/views/login.php');
		}

	} else {
		$tab_exception = array('changePassword', 'delivery');
		
		if ($_GET['tab'] == 'changePassword') {
			$title = $config['Application']['title'];

			include('sources/roads/ChangePassword.road.php');

		} 
		elseif($_GET['tab'] == 'delivery' && $_GET['action'] ='deliveryView') {
			
			$title = $config['Application']['title'];

			include('sources/roads/Delivery.road.php');
			
		} else {
			header('Location: index.php');
		}
	}
}
//Si l'utilisateur est connecté
else {

	if($_SESSION['utilisateur']->getRole() == 'admin'){
		$valid_roads = array(
			'customer_information' => 'customer_information',
			'user' => 'user',
			'project' => 'project',  
			'accueil' => 'accueil',
			'invoice' => 'invoice', 
			'invoice_line' => 'invoice_line',
			'deliverable' => 'deliverable',
			'delivery' => 'delivery',
			'prospect' => 'prospect',
			'prospect_event' => 'prospect_event');
	}else {
		$valid_roads = array(
			'project' => 'project', 
			'accueil' => 'accueil',
			'invoice' => 'invoice', 
			'invoice_line' => 'invoice_line',
			'delivery' => 'delivery');
	}

	//Si la variable _GET['tab'] est définie, on l'encode en UTF-8

	if (isset($_GET['tab']))
		$_GET['tab'] = utf8_encode($_GET['tab']);

	$title = $config['Application']['title'];

	//L'onglet premier est
	#$default_template_using = false;
	$first_tab = 'accueil';

	((isset($_GET['tab'])) AND (isset($valid_roads[$_GET['tab']]))) ? include('sources/roads/' . ucfirst($valid_roads[$_GET['tab']] . '.road.php')) : header('Location: index.php?tab=' . $first_tab . '');
}
