<?php
session_start();
require_once ('initInclude.php');
require_once ('common.inc');

extract($_POST);

// modif du thème en session
if ( $action == "modifTheme") {
	$_SESSION['theme'] = $theme;
}

// modif de l'orientation du menu en session
if ( $action == "modifOrient") {
	$_SESSION['orient'] = $newOrient;
}

?>
