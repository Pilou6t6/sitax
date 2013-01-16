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

	<br />
	<h4>Télécharger</h4>

	<br />
	<h4>Cloner</h4>


</div>

<div id="versionRobert">
	<b>Robert : v<? echo R_VERSION; ?></b><br /> GNU Affero (AGPL)
</div>