<?php
session_start();

if (isset($_POST[$_SESSION['qaptcha_key']]) && empty($_POST[$_SESSION['qaptcha_key']]) ) {
	if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['message'])) {
		// Envoi du mail
		$NomExp = $_POST['nom'];
		$MailExp = $_POST['mail'];
		$MessageExp = nl2br(@$_POST['message']);
		$NomMAJ = strtoupper($NomExp);

		// Envoi du mail à Polosson :
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "From: $MailExp\r\n";
		$headers .= "Content-type: text/html; charset=utf-8";

		$MessageExp = stripslashes($MessageExp);
		$DateArray = getdate();
		$DateMail = $DateArray['mday']."/".$DateArray['mon']."/".$DateArray['year'] ;

		$mail_text='<body  bgcolor="#DDD">
		<font color="#333">
		<b>Hey dude !</b><br><br>';

		$subject = "Message depuis polosson.com";
		if (isset($_POST['domain'])) {
			$mail_text .= 'Demande de devis, pour le nom de domaine suivant : <b>'.$_POST['domain'].'</b>';
			$subject = "Demande de devis pour un site";
		}
		else $mail_text .= 'Nouveau message depuis polosson.com !!';

		$mail_text .= '<br><br>
		Ecrit par : <font color="#000"><b>'.$NomExp.'</b></font>, le '.$DateMail.'<br><br>
		---------------------------------------------------------<br>
		<font color="#220"><b>'.$MessageExp.'</b></font><br>
		---------------------------------------------------------<br><br>
		</font></body>';

		if (mail("polo@polosson.com, mathieu@d2mphotos.fr", $subject, $mail_text, $headers))
			 header("Location: ../index.php?go=9contact&ret=ok&nomExp=$NomMAJ");			// Confirmation d'envoi
		else header("Location: ../index.php?go=9contact&ret=err");							// ou bien message d'erreur...
	}
	else header("Location: ../index.php?go=9contact&ret=miss");			// manque info
}
else header("Location: ../index.php?go=9contact&ret=no");			// pas d'envoi

?>