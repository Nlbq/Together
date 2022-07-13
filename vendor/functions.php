<?php
/**
 * Permet de d'effectuer un var_dump
 * */
function display($think) {
	echo '<b><pre style="border:3px solid black;color:black;padding:10px;background-color:lightgrey;font-size:20px;">';
	var_dump($think);
	echo '</pre></b></p>';
}
/**
 * Permet de d'effectuer un var_dump
 * */
function sdisplay($think) {
	echo '<b><pre style="border:3px solid black;color:black;padding:10px;background-color:lightgrey;font-size:20px;">';
	var_dump($think);
	echo '</pre></b></p>';
	die();
}
/**
 * Permet d'imprimer une chaine de caractère grâce à du code html, avec un style personnalisé (utilisé ici pour afficher une requête SQL)
 * @param string $think Requête
 * */
function mysql_write($think) {
	echo '<center><div style="background: #cde1f9;font-weight:bold;border:2px solid #2070c2;color:#125897;display: inline-block;padding: 12px 20px;margin: 10px 0 0;">'.$think.'</div></center>';
}
//0000-00-00 to 00/00/0000
function date_format_dash_to_slash($date) {
	$d = explode('-', $date);
	return ($date == null) ? null : $d[2].'/'. $d[1].'/'. $d[0];
}
//0000-00-00 to 00/00/0000
function date_format_to_small($date) {
	$d = explode('-', $date);
	$mois = array('Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
	return ($date == null) ? null : $d[2].' '.$mois[intval($d[1]-1)];
}
//00/00/0000 to 0000-00-00
function date_format_slash_to_dash($date) {
	$d = explode('/', $date);
	return ($date == null) ? null : $d[2].'-'. $d[1].'-'. $d[0];
}
//00/00/0000 to 0000-00-00
function binary_to_gender($bool) {
	return ($bool == 0) ? 'Homme' : 'Femme';
}

/**
 * This function removes spaces from a string and capitalize every word.
 * @param string $param Chaine
 * @return string $string
 * */
function tighten_words($param) {
	$table = explode(' ', trim($param));
	for ($i=0; $i < count($table); $i++)
		$string .= ucfirst($table[$i]);
	return $string;
	//Example : 'I would like to program' =>  'IWouldLikeToProgram'
}
/**
 * Récupère les indentifiants de la base de données stockés dans un fichier texte (.txt)
 * */
function recover_data_identifiers() {
	$lines = file(SYSTEM_ROOT . '/models/data_identifiers.txt');
	for ($i=0; $i < 4; $i++) {
		$tableau[] = substr($lines[$i], 3, -1);
	}
	$database['base'] = $tableau[0];
	$database['host'] = $tableau[1];
	$database['user'] = $tableau[2];
	$database['password'] = $tableau[3];
	return $database;
}
/**
 * Récupère les indentifiants de la base de données stockés dans un fichier texte (.txt)
 * */
function recover_data_site() {
	$lines = file(SYSTEM_ROOT . '/controllers/current/data_site.txt');
	for ($i=0; $i < 4; $i++) {
		$tableau[] = substr($lines[$i], 3, -1);
	}
	$site['title'] = $tableau[0];
	$site['description'] = $tableau[1];
	$site['tags'] = $tableau[2];
	$site['author'] = $tableau[3];
	return $site;
}
/**
 * Permet de supprimer les accents d'une chaine
 * @param string $tab Chaine
 * */
function format_acc($tab) {
	$tab = strtolower($tab);
	$initial = array("é", "è", "à", "ê", "ë", " ", "É", "Ê", "È", "Ë", "À","&", "ç");
	$remplacer = array("e", "e", "a", "e", "e", "_", "e", "e", "e", "e", "a","e", "c");
	return str_replace($initial, $remplacer, $tab);
}
/**
 * Permet de désencoder de l'hexadécimal
 * @param string $string Chaine
 * */
function deshex($string) {
	return utf8_encode(chr(hexdec($string)));
}
/**
 * Permet de remplacer certains codes en hexadécimals d'une chaine par des caractères accentués
 * @param string $string Chaine
 * */
function deshexing($string) {
	//table des caractère à compléter (+n)
	$search = array('%20', '%e0', '%e2', '%e7', '%e8', '%e9', '%ea', '%ee', '%f4', '%f9', '%fb', '%3b', '%2f', '%3f', '%3a', '%3d', '%2b');
	$replace = array(' ', 'à', 'â', 'ç', 'è', 'é', 'ê', 'î', 'ô', 'ù', 'û', ';', '/', '?', ':', '=', '+');
	return str_replace($search, $replace, $string);
}
/**
 * Permet de remplacer certains caractères accentués d'une chaine par du code en hexadécimal
 * @param string $string Chaine
 * */
function hexing($string) {
	//table des caractère à compléter (+n)
	$search = array(' ', 'à', 'â', 'ç', 'è', 'é', 'ê', 'î', 'ô', 'ù', 'û', ';', '/', '?', ':', '=', '+');
	$replace = array('%20', '%e0', '%e2', '%e7', '%e8', '%e9', '%ea', '%ee', '%f4', '%f9', '%fb', '%3b', '%2f', '%3f', '%3a', '%3d', '%2b');
	return str_replace($search, $replace, $string);
}
/**
 * Permet de vérifier si une chaine de caractère contient certains caractères définis
 * @param string $string Chaine
 * */
function bad_character($string) {
	$cpt = 0;
	$chaine = '<>?&#(){}[]\'",^|~¨$£§%=';
	for ($i=0; $i<strlen($string); $i++)
		for ($j=0; $j<strlen($chaine); $j++)
			if ($string[$i] == $chaine[$j])
				$cpt++;
	return ($cpt!=0) ? true : false;
}
/**
 * Permet de remplacer une chaine en minuscule et d'encoder les caractères accentués en hexadécimal
 * @param string $string Chaine
 * */
function format_tab($string) {
	return hexing(mb_strtolower($string));
}
/**
 * Permet d'encoder en UTF8 les valeurs d'un tableau passé en paramètre
 * @param array $array Tableau a encoder
 * */
function utf8_array($array) {
    foreach($array as $c=>$v) {
        if(is_array($array[$c]))
            foreach($array[$c] as $c2=>$v2)
               	$array[$c][$c2] = (is_array($array[$c][$c2])) ? array_map("utf8_encode", $array[$c][$c2]) : utf8_encode($array[$c][$c2]);
        else
            $array[$c] = utf8_encode($array[$c]);
    }
    return $array;
}
/**
 * Permet de désencoder en UTF8 les valeurs d'un tableau passé en paramètre
 * @param array $array Tableau a désencoder
 * */
function utf8_desarray($array) {
    foreach($array as $c=>$v) {
        if(is_array($array[$c]))
            foreach($array[$c] as $c2=>$v2)
               	$array[$c][$c2] = (is_array($array[$c][$c2])) ? array_map("utf8_decode", $array[$c][$c2]) : utf8_decode($array[$c][$c2]);
        else
            $array[$c] = utf8_decode($array[$c]);
    }
    return $array;
}
/**
 * Permet de formater une date au format DATETIME (2015-05-10 00:00:00) vers un format 10 Juin 2015, 00:00
 * @param string $date Date au '0000-00-00 00:00'
 * */
function FD_JJMMAAHHMMSS($date) {
	$date = explode(' ', $date);
	$ladate = explode('-', $date[0]);
	$lheure = explode(':', $date[1]);
	$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	return intval($ladate[2]).' '.$mois[intval($ladate[1]-1)].' '.$ladate[0].', '.$lheure[0].':'.$lheure[1];
}
/**
 * Permet de formater une date au format DATETIME (2015-05-10 00:00:00) vers un format 10 Juin 2015 à 00:00
 * @param string $date Date au '0000-00-00 00:00'
 * */
function FD_JJMMAAaHHMM($date) {
	$date = explode(' ', $date);
	$ladate = explode('-', $date[0]);
	$lheure = explode(':', $date[1]);
	$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	return intval($ladate[2]).' '.$mois[intval($ladate[1]-1)].' '.$ladate[0].' à '.$lheure[0].'h'.$lheure[1];
}
/**
 * Permet de formater une date au format DATE (2015-05-10) vers un format 10 Juin 2015
 * @param string $date Date au '0000-00-00'
 * */
function FD_JJMMAA($date) {
	$date = explode(' ', $date);
	$ladate = explode('-', $date[0]);
	$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	return intval($ladate[2]).' '.$mois[intval($ladate[1]-1)].' '.$ladate[0];
}
/**
 * Coupe une chaine en y laissant les 10 premiers caractère en y ajoutant '..'
 * @param string $string Chaine
 * */
function smarty_modifier_couper_part($string) {
    return (strlen($string) > 10) ? substr($string, 0, 10).".." : $string;
}
/**
 * Coupe une chaine en y laissant les 350 premiers caractère en y ajoutant '...'
 * @param string $string Chaine
 * */
function smarty_modifier_couper350($string) {
    return (strlen($string) > 350) ? substr($string, 0, 350)."..." : $string;
}
/**
 * Permet de formater un mois au format numérique '00', en toute lettre (Français)
 * @param string $mois Mois
 * */
function formater_mois($mois) {
	$mois = explode('-', $mois);
	list($lemois, $lannee) = array($mois[1], $mois[0]);
	$nom_mois = array('01' => 'Janvier',
	'02' => 'Février',
	'03' => 'Mars',
	'04' => 'Avril',
	'05' => 'Mai',
	'06' => 'Juin',
	'07' => 'Juillet',
	'08' => 'Août',
	'09' => 'Septembre',
	'10' => 'Octobre',
	'11' => 'Novembre',
	'12' => 'Décembre');
	return $nom_mois[$lemois].' '.$lannee;
}
/**
 * En smarty, afficher le fichier contenant le header
 * @param object $smt Instance de la classe Smarty
 * */
function get_header($smt) {
	$smt->display('views/current/top.tpl');
}
/**
 * En smarty, afficher le fichier contenant le footer
 * @param object $smt Instance de la classe Smarty
 * */
function get_footer($smt) {
	$smt->display('views/current/bottom.tpl');
}
/**
 * Permet de vider les sessions
 * */
function logout() {
	if (isset($_SESSION))
		unset($_SESSION);
	session_destroy();
	header('Location: index.php');
}
/**
 * Permet de récupérer un message d'erreur, s'il existe
 * */
function getMessage() {
	if (isset($_SESSION['SHOW_MESSAGE'])) {
		$show = new Gestion_message();
		$show->serialise($_SESSION['SHOW_MESSAGE']);
		unset($_SESSION['SHOW_MESSAGE']);
		return $show->afficher();
	}
	return '';
}
function verif_true_email($email) {
	if(!good_email_service($email)) {
		$service = explode('@', $email);
		return 'Nous n\'acceptons pas les adresses provenant du service @'.$service[1].'.';
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		return 'Votre adresse e-mail n\'est pas dans un format valide.';
	return true;
}
/**
 * Permet de vérifier si une adresse e-mail provient d'un service d'email jetables
 * @param string $email Chaine
 * */
function good_email_service($email) {
	$mail = explode('@', $email);
	$email_service = $mail[1];
	switch ($email_service) {
		case 'yopmail.com': return false; break;
		case 'get2mail.fr': return false; break;
		case 'tempomail.fr': return false; break;
		case 'trbvm.com': return false; break;
		case 'mailinator.com': return false; break;
		case 'guerrillamail.com': return false; break;
		case 'throam.com': return false; break;
		case 'ubismail.net': return false; break;
		case 'imgof.com': return false; break;
		case 'grandmamail.com': return false; break;
		default: return true; break;
	}
}
function mdpCorrecte($mdp)
{
	$cpt = $cpt2 = 0;
	$chiffres = '0123456789';
	$lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//long_verif vaut un si le mdp est compris entre 6 et 20 caractères
	$long_verif = (strlen($mdp) >= 6 && strlen($mdp) <= 20) ? 1 : 0;

	for ($i=0; $i < strlen($mdp); $i++)
		for ($j=0; $j < strlen($chiffres); $j++)
			if($mdp[$i] == $chiffres[$j])
				$cpt++;

	for ($i=0; $i < strlen($mdp); $i++)
		for ($j=0; $j < strlen($lettres); $j++)
			if($mdp[$i] == $lettres[$j])
				$cpt2++;

	return ($long_verif!=0 && $cpt!=0 && $cpt2!=0) ? true : false;
}
function nbCrypt($nb)
{
	$nb *= 631995;
	$nb += 4111;
	$nb *= 48;
	$nb -= 111111;
	$nb *= 13;
	$nb += 9792178943;
	return $nb;
}
function nbDecrypt($nb)
{
	$nb -= 9792178943;
	$nb /= 13;
	$nb += 111111;
	$nb /= 48;
	$nb -= 4111;
	$nb /= 631995;
	return $nb;
}
function adv($nb) { return ($nb == 1) ? 'Oui' : 'Non'; }
function search_accept($param) {
	if (!empty($param) && is_exists_charactere($param, 'AZERTYUIOPQSDFGHJKLWXCVBNMazertyuiopqsdfghjklmwxcvbn01234567890123456789') && isArticleThat($param) && strlen($param) > 1)
		return true;
	return false;
}
function is_exists_charactere($string, $characterList) {
	for ($i=0; $i < strlen($string); $i++)
		for ($j=0; $j < strlen($characterList); $j++)
			if ($string[$i] == $characterList[$j])
				return true;
	return false;
}
function isArticleThat($param) {
	$tab = array('le', 'la', 'les', 'et', 'en', 'on', 'ou', 'une', 'un', 'par', 'de', 'des');
	foreach ($tab as $key => $value)
		if ($param == $value)
			return false;
	return true;
}
function strtoupper_fr($string) {
   $string = strtoupper($string);
   $string = str_replace(
      array('é', 'è', 'ê', 'ë', 'à', 'â', 'î', 'ï', 'ô', 'ù', 'û'),
      array('É', 'È', 'Ê', 'Ë', 'À', 'Â', 'Î', 'Ï', 'Ô', 'Ù', 'Û'),
      $string
   );
   return $string;
}
function is_in_array($nom_espece) {
  $BDD = new Database();

  $especes_fichees = $BDD->selectAllLibre("SELECT e.nom_binomial, e.id_espece FROM `sold_species` s INNER JOIN especes e WHERE s.name = e.nom_binomial");

  foreach ($especes_fichees as $key => $value) {
    if ($value['nom_binomial'] == $nom_espece) {
      echo '<span class="acquise" onclick="window.open(\'http://fourmilia.com/espece.php?id='.$value['id_espece'].'\');">'.$nom_espece.'</a></span>';
      return 1;
    }
  }
  echo $nom_espece.'.';
}

function tabelize($tab) {
  $new = array();

  foreach ($tab as $key => $value) {
    if ($value['nb'] == 0) {
      $new[$value['type']] = array('avg' => round($value['average'], 2), 'nb' => $value['nb']);
    } elseif ($value['nb'] == 1) {
      $new[$value['type']] = array('avg' => '<span>'.round($value['average'], 2).'</span>', 'nb' => '['.$value['nb'].']');
    } else {
      $new[$value['type']] = array('avg' => '<b>'.round($value['average'], 2).'</b>', 'nb' => '['.$value['nb'].']');
    }
  }

  return $new;
}

function echo_isset($think) {
	if (isset($think)) {
		echo $think;
	}
}

function monify($money) {
	$money = round($money, 2);
	$m = explode('.', $money);
	if (!isset($m[1])) {
		$m[1] = 0;
	}
	return (strlen($m[1]) == 2) ? $m[0].','.$m[1].' €' : $m[0].','.$m[1].'0 €';
}
function point_to_coma($in) {
	if ($in == 0) {
		return 0;
	}
 $m = explode('.', $in);
 return $m[0].','.$m[1];
}

function percentaging($lvl) {
	if ($lvl == 1) {
		return 1;
	} elseif ($lvl == 2) {
		return 1.125;
	} elseif ($lvl == 3) {
		return 1.25;
	} elseif ($lvl == 4) {
		return 1.375;
	} elseif ($lvl == 5) {
		return 1.5;
	}
}

function statusing($status) {
	if ($status == 1) {
		return 'Nouveau';
	} elseif ($status == 2) {
		return 'À faire';
	} elseif ($status == 47) {
		return 'Freeze';
	}
}

function monthify($in) {
	$in = intval($in)-1;

	$months = array('Janvier', 'Frévrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

	return $months[$in];
}

function time_gia_to_normal($time) {
	$a = explode(' ', $time);
	$b = explode(':', $a[0]);

	if ($a[1] == 'PM') {
		$b[0] += 12;
	}
	if (strlen($b[0]) == 1) {
		$b[0] = '0'.$b[0];
	}
	return $b[0].':'.$b[1].':00';
}

function time_normal($time) {
	$b = explode(':', $time);

	if (strlen($b[0]) == 1) {
		$b[0] = '0'.$b[0];
	}
	return $b[0].':'.$b[1].':00';
}
function genererToken($longueur = 30)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}
function genererChaineAleatoire($longueur = 10)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}
function upload_file($file_input, $upload_dir)
{
	if (!isset($_FILES[$file_input])) {
		return false;
	}

	if (!file_exists($upload_dir) && !is_dir($upload_dir)) 
	{
		mkdir($upload_dir, 0777);     
	}

	// return false if error occurred
	$error = $_FILES[$file_input]['error'];

	if ($error !== UPLOAD_ERR_OK) {
		return false;
	}

	// move the uploaded file to the upload_dir
	$new_file = $upload_dir . $_FILES[$file_input]['name'];


	//Retoure 1 si ça a marché, 0 si ça a pas marché
	return move_uploaded_file(
		$_FILES[$file_input]['tmp_name'],
		$new_file
	);
}

function varDumpToString($var) {
  ob_start();
  var_dump($var);
  $result = ob_get_clean();
  return $result;
}