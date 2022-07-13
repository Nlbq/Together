<?php
	/**
	* Classe ForgetPasswordController
	*/
	class ChangePasswordController {

      public static function index() {
			$GLOBALS['variable_section'] = 'changePassword';

			if(isset($_POST['emailChangePassword'])){
				
				$BDD = new Database();

				$token = genererToken(30);
				$email = htmlspecialchars($_POST['emailChangePassword']);
				$url = "https://together.lozako.com/index.php?tab=changePassword&action=token&token=$token";
				$subject = "Changement de mot de passe";
				$htmlContent  = file_get_contents("assets/emailTemplates/changePasswordTemplate.html");
				$message = $htmlContent.'<br/><a href='.$url.' style="text-decoration:none;text-align:center;display:block;margin:5px auto;
				background-color:#0d6efd; padding:5px;border-radius:6px;width:120px;color:#fff;font-weight:bold;">Modifier mot de passe</a>';
				
				$headers[] = 'MIME-Version: 1.0';
			  $headers[] = 'Content-type:text/html;charset=UTF-8';
				$headers[] = 'From: Together by Lozako <no-reply@lozako.com>';

				$requete = $BDD->select('user', '*', array('email_address' => $email));

				if($requete > 0){

				$user = new User();
				$user->serialise($requete);

					if(mail($_POST['emailChangePassword'], $subject, $message, implode("\r\n", $headers))){

						$user = $BDD->update('user', array('token' => $token), array('email_address' => $email));
						$GLOBALS['valid'] = 'Un email vous a été envoyé';

					}else{
						$GLOBALS['error'] = 'Une erreur est survenue';
					}

				}else{
            $GLOBALS['error'] = "Veuillez renseigner une adresse email existante";
        		}
			}
		}		

		public static function token(){
			
			if (isset($_GET['token']) && $_GET['token'] != ''){

				$GLOBALS['variable_section'] = 'modifyPassword';
				$BDD = new Database();
				$requete = $BDD->select('user', '*', array('token' => $_GET['token']));
				
				if ($requete > 0){

					if(isset($_POST['newPassword'], $_POST['newPasswordConfirm'])){

						if ($_POST['newPassword'] == $_POST['newPasswordConfirm']){

						$newPassword = htmlspecialchars($_POST['newPassword']);
						$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
						$requete = $BDD->update('user', array('password' => $newPasswordHash, 'token' => ''), array('token' => $_GET['token']));
            
            $_SESSION['notification'] = 'Votre mot de passe a bien été changé';

						header("Location: index.php");
						}else{
              $GLOBALS['error'] = "Veuillez renseigner un mot de passe et le confirmer correctement";
						}

					}else{
						$GLOBALS['error'] = "Veuillez renseigner un mot de passe et le confirmer";
					}
				}else{
      		header("Location: index.php");
    		}
			}
		}
}
	
    