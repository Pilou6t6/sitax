<script src="js/jphotogrid.min.js"></script>
<link type="text/css" href="css/jphotogrid.css" rel="stylesheet" />

<script>
	$(function(){
		$('#pg').jphotogrid({
			baseCSS: {
				width: '250px',
				height: '180px',
				padding: '0px'
			},
			selectedCSS: {
				top: '50px',
				left: '100px',
				width: '800px',
				height: '500px',
				padding: '0px'
			}
		});
	});
</script>


<div class="pageContent">
	<ul id="pg">
		<li>
			<img src="gfx/screens/calendrier.jpg" alt="" />
			<p>Page calendrier interactif</p>
		</li>
		<li>
			<img src="gfx/screens/matos.jpg" alt="" />
			<p>Liste du matériel</p>
		</li>
		<li>
			<img src="gfx/screens/matos_add.jpg" alt="" />
			<p>Ajout de matériel</p>
		</li>
		<li>
			<img src="gfx/screens/matos_ssCat.jpg" alt="" />
			<p>Gestion des sous-catégories</p>
		</li>
		<li>
			<img src="gfx/screens/gens_tekos.jpg" alt="" />
			<p>Liste des techniciens associés au parc</p>
		</li>
		<li>
			<img src="gfx/screens/gens_users.jpg" alt="" />
			<p>Liste des utilisateurs du Robert</p>
		</li>
		<li>
			<img src="gfx/screens/benef.jpg" alt="" />
			<p>Liste des "bénéficiaires" <i>(clients)</i></p>
		</li>
		<li>
			<img src="gfx/screens/plan_add1.jpg" alt="" />
			<p>Ajout d'évènement (étape 1 : infos du plan)</p>
		</li>
		<li>
			<img src="gfx/screens/plan_add2.jpg" alt="" />
			<p>Ajout d'évènement (étape 2 : choix des techniciens)</p>
		</li>
		<li>
			<img src="gfx/screens/plan_add3.jpg" alt="" />
			<p>Ajout d'évènement (étape 3 : choix du matériel)</p>
		</li>
		<li>
			<img src="gfx/screens/plan_add4.jpg" alt="" />
			<p>Ajout d'évènement (étape 4 : récapitulatif)</p>
		</li>
		<li>
			<img src="gfx/screens/infos.jpg" alt="" />
			<p>Page de modif des infos de la structure</p>
		</li>
	</ul>
</div>
