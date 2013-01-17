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

<p>
	<select id="themeSel" title="utilisez ce menu pour changer de thème visuel.">
		<option disabled selected value="">Thème...</option>
		<?php $themesDispo = list_themes();
			  foreach ($themesDispo as $theme) echo "<option value='$theme'>$theme</option>"; ?>
	</select>
</p>


-----------------------
<br />

<div id="reseauSocial">
	<h4>Derniers dons</h4>
	<span class="mini"><b>2000€</b> : ACOUSMIE</span>
	<br />
	<br />
	<h4>Télécharger</h4>
	<a href="https://github.com/RobertManager/robert/archive/master.zip" target="blank">ZIP</a>
	<br />
	<br />
	<h4>Cloner</h4>
	<a href="https://github.com/RobertManager/robert" target="blank"><img src="gfx/icones/logo-github.png" /></a><br />
	<code>git://github.com/RobertManager/robert.git</code>

</div>

<div id="versionRobert">
	<b>Robert : v<? echo R_VERSION; ?></b><br /> GNU Affero (AGPL)
</div>