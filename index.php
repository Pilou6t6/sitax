<?php
session_start();

define("INSTALL_PATH", dirname(__FILE__).'/');
$_SESSION['INSTALL_PATH'] = INSTALL_PATH;

require_once (INSTALL_PATH.'inc/initInclude.php');
require_once ('common.inc');
require_once ('prefs.php');
require_once ('head_html.php');

?>

<body>

	<div id="bigDiv">

		<div id="Page" class="fondPage bordPage">

			<!-- HEADER PAGE (affichage du logo)	-->
			<div class="headPage">
				<div id="logo" <?php //echo $hideLogo; ?>>
					<div class="inline mid"><img src="gfx/logo.png" height="50" alt="ROBERT" /></div>
					<div class="inline mid enorme margeTop10 marge30l ui-state-disabled">Gestionnaire de parc de matériel open source</div>
				</div>
			</div>


			<!-- COLONNE DE GAUCHE (affichage du menu vers les pages)	-->

            <div class="colonne L<?php echo $orient; ?> bordSection ui-widget ui-corner-all fondSect1" id="leftCol">
				<?php include('menuPages.php'); ?>
			</div>



			<!-- COLONNE DU CENTRE (affichage des contenus de pages)	-->

			<div class="colonne C<?php echo $orient; ?> bordSection ui-widget ui-corner-all fondSect2 petit" id="centerCol">

				<div class="ui-state-error ui-corner-all center top gros" id="retourAjax"></div>

				<?php
					if ( isset($_GET["go"])) {
						$goto = FOLDER_PAGES . '/p_' . $_GET["go"] .'.php';
						if ( ( @include ($goto) ) == false)
							echo "<div class='ui-state-error ui-corner-all pad20 big center'>
									<p>La page <b>\"".$_GET['go']."\"</b> n'existe pas !</p>
									<p><a href='?go=calendrier'>RETOUR</a></p>
								</div>";
					}
					else include (FOLDER_PAGES . 'p_1accueil.php');
				?>

			</div>



			<!-- COLONNE DE DROITE (affichage des menus spéciaux)	-->

			<div class="colonne R bordSection ui-widget ui-corner-all fondSect1 petit center" id="rightCol">
				<?php include('menuTools.php'); ?>
			</div>



			<!-- DIV DE TOOLTIP (utilitaire) -->

			<div id="toolTipPopup" class="center ui-widget ui-state-highlight ui-corner-all fondSect2" style="color:black; width:85px;"></div>

		</div>

	</div>
</body>
</html>