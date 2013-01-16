<?php
	$globmask = 'pages/p_*';	// emplacement des pages / masque pour glob()

	// Affichage du menu de gauche (lien vers les pages)
	foreach ( glob($globmask) as $namePage ) {
		$nomPage = preg_replace('/(^p_)|(.php$)/', '', basename($namePage));
		$nomIcone = ltrim($nomPage, '0..9');
		$nomLien  = preg_replace('/_/', ' ', strtoupper($nomIcone));

		// Si le GET est défini, on highlight le bon icône
		if ( (isset($_GET['go']) && @$_GET['go'] == $nomPage) || (!isset($_GET['go']) && $nomIcone == 'accueil') )
			 $classUi = 'highlight';
		else $classUi = 'default';
		// Affichage de l'icone du menu
		echo "<div class='ui-state-$classUi ui-corner-all menu".$orient."_icon menu_entry' popup='$nomLien'>
				<a href='?go=$nomPage'><img class='img_menu' src='gfx/icones/menu/$nomIcone.png' alt='$nomLien'/></a>
			</div>";
	}

?>