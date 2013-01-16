<?php
session_start();
	
if (isset($_POST['action']) && isset($_POST['qaptcha_key'])) {
	$_SESSION['qaptcha_key'] = false;	
	
	if (htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'qaptcha') {
		$_SESSION['qaptcha_key'] = $_POST['qaptcha_key'];
		if ($_POST['userName'] != '' && $_POST['userMail'] != '' && $_POST['userMess'] != '')
			$aResponse['error'] = false;
		else $aResponse['error'] = true;
	}
	else $aResponse['error'] = true;
}
else $aResponse['error'] = true;

echo json_encode($aResponse);