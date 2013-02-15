<?php

function list_themes () {
	global $install_path;
	$list = array();
	$dir = opendir($install_path.FOLDER_CSS);
	while (($fileCSS = readdir($dir)) !== false) {
		if ($fileCSS != '.' && $fileCSS != '..' && !preg_match('/.css$/', $fileCSS))
			$list[] = $fileCSS;
	}
	sort($list, SORT_STRING);
	return $list;
}

?>

<!--<p>
	<select id="themeSel" title="utilisez ce menu pour changer de thème visuel.">
		<option disabled selected value="">Thème...</option>
		<?php $themesDispo = list_themes();
			  foreach ($themesDispo as $theme) echo "<option value='$theme'>$theme</option>"; ?>
	</select>
</p>
-----------------------
<br />-->

<div id="reseauSocial">
	<div class="ui-state-active ui-corner-all margeTop10 pad3" style="margin-bottom: 5px;">Télécharger</div>
	<a href="https://github.com/RobertManager/robert/archive/master.zip" target="blank"><img src="gfx/icones/zip.png" alt="ZIP" /></a>
	<br />
	<br />

	<div class="ui-state-active ui-corner-all margeTop10 pad3" style="margin-bottom: 5px;">Cloner</div>
	<a href="https://github.com/RobertManager/robert" target="blank"><img src="gfx/icones/logo-github.png" /></a><br />
	<code class="mini">git://github.com/RobertManager/robert.git</code>
	<br />
	<br />

	<div class="ui-state-active ui-corner-all margeTop10 pad3" style="margin-bottom: 5px;">Dénoncer un Bug</div>
	<a href="?go=7bugHunter" /><img src="gfx/icones/bug.png" alt="NEW BUG" /></a>
	<br />
	-----------------------

	<div class="margeTop10 padH5 center ui-state-active bordSection ui-corner-all">
		<div class="petit gras" style="color: #000;">Pour nous aider :</div>
		<br />
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="GTCTMAKLUM7JW">
			<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="Faire un don avec PAYPAL.">
			<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
		</form>
		<br />
		<img src="gfx/icones/payCards.png" width="125" /><br />
	</div>

	<div class="ui-state-active ui-corner-all margeTop10 pad3" style="margin-bottom: 5px;">Derniers dons</div>
	<span class="mini"><b>2000€</b> : ACOUSMIE</span>

</div>

<div id="versionRobert">
	<b>Robert : v<? echo R_VERSION; ?></b><br /> GNU Affero (AGPL)
</div>