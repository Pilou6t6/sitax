<?php
	$hideMessage = 'hide'; $message = '';
	if (isset($_GET['ret'])) {
		$hideMessage = '';
		switch ($_GET['ret']) {
			case 'ok':
				$message = '<span class="gros gras">Merci '.@$_GET['nomExp'].' ! Votre message a bien été envoyé !</span><br /><br />Je vous répondrai dans les meilleurs délais.';
				break;
			case 'err':
				$message = "<span class='gros gras red'>Un problème est survenu pendant l'envoi du message...</span><br /><br /><span class='red'>Merci de réessayer plus tard.</span>";
				break;
			case 'miss':
				$message = "<span class='gros gras red'>Il semble que vous n'avez pas rempli toutes les informations requises. Merci de réessayer.</span>";
				break;
			case 'no':
				$message = "<span class='gros gras red'>Le captcha a expiré. Merci de réessayer.</span>";
				break;
		}
	}
?>

<div class="pageContent">

	<div class="inline top demi padV10 marge30l">
		<h2>Contactez-nous directement par email</h2>
		<form method="post" action="fct/contact_action.php">
			<table>
				<tr>
					<td> Votre nom : </td>
					<td> Votre Email : </td>
					<td></td>
				</tr>
				<tr>
					<td> <input type=text name="nom" id="nomUser" value="" size="18" /> </td>
					<td colspan="2"> <input type=text name="mail" id="mailUser" class="EmailInput" value="" size="27" /> </td>
				</tr>
				<tr>
					<td colspan="3"> Votre message : </td>
				</tr>
				<tr>
					<td colspan="3">
						<textarea rows="8" cols="50" name="message" id="messUser" onFocus="if(this.value=='Votre message à l\'équipe du Robert...')this.value=''">Votre message à l'équipe du Robert...</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" valign="top">
						<div class="QapTcha"></div>
					</td>
					<td align="center" valign="top">
						<input class="bouton margeTop10" type="submit" value="ENVOYER" />
					</td>
				</tr>
			</table>
		</form>
	</div>


	<div class="bordFin bordSection ui-corner-all ui-state-error pad20 gros margeTop10 <?php echo $hideMessage ?>">
		<?php echo $message ; ?>
	</div>

</div>
