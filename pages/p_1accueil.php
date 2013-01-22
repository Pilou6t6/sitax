<script src="js/FeedEk.js"></script>
<link type="text/css" href="css/FeedEk.css" rel="stylesheet" />


<script>
	$(function(){
		$('#divRss').FeedEk({
			FeedUrl : 'https://github.com/RobertManager/robert/commits/0bc921adf9ca298e5c885451fc5a995f8b9b4867.atom',
			MaxCount : 10,
			ShowDesc : true,
			ShowPubDate:true
		});
	});
</script>


<div class="pageContent">

	<div class="big ui-state-default ui-corner-all pad3">
		<span class="enorme">Bienvenue</span> <span class="petit">sur le site officiel du projet "Robert" !</span>
	</div>

	<div>
		<p class="big">Le "Robert" est une <b>WEB-APP</b> (logiciel en ligne) <b>open source</b>, écrite en php, javascript, html et xml, utilisant jQuery, ajax et mysql.</p>

		<img class="floatRight marge30l shadowOut" src="gfx/screens/calendrier.jpg" width="500" />
		<p class="gros gras">Plus précisément, c'est :</p>
		<ul class="gros">
			<li>Un gestionnaire de parc de matériel destiné à la location,</li>
			<li>Un outil bien pratique pour assurer le bon fonctionnement d'un parc de matériel et la liaison avec les clients / techniciens, accessible n'importe où depuis internet,</li>
			<li>Un moyen simple et efficace de s'y retrouver dans les sorties-retours de matériel,</li>
			<li>Une interface claire et fonctionnelle,</li>
			<li>Une solution pour stocker les données relative au parc, de manière sécurisée et centralisée sur votre propre serveur,</li>
			<li>Un projet communautaire auquel tout le monde (quidam, association, entreprise) peut participer !</li>
		</ul>
		<p class="gros gras">Avec qui ?</p>
		<ul class="gros">
			<li>Mathieu DI MARTINO ("<a href="http://www.d2mphotos.fr" target="_new">Moutew</a>"), développeur</li>
			<li>Paul MAILLARDET ("<a href="http://www.polosson.com" target="_new">Polosson</a>"), développeur</li>
			<li>L'association <a href="http://www.acousmie.fr" target="_new">ACOUSMIE <img src="http://www.acousmie.fr/gfx/logo-acousmie.png" width="50" /></a>, penseurs, utilisateurs, instigateurs, moteurs, donnateurs !</li>
		</ul>
	</div>

	<p style="clear: both;">&nbsp;</p>

	<div class="gros ui-state-default ui-corner-all pad3">
		<div class="inline mid"><b>Suivez les derniers changements du code en temps réel ici :</b></div>
		<div class="inline mid">
			<a href="https://github.com/RobertManager/robert/commits/0bc921adf9ca298e5c885451fc5a995f8b9b4867.atom">
				<img src="gfx/icones/rss2.png" /> <small>(flux RSS)</small>
			</a>
		</div>
	</div>
	<div class="ui-corner-all shadowOut" id="divRss"></div>
</div>