
// Fonction Ajax - méthode de récupération HTML. Paramètres :
// @dataStr   = chaine de requête à envoyer,
// @dest      = nom du fichier php de traitement (sans l'extension 'php'),
// @reload    = auto reload, si n'est pas null ou false, recharge la page en cours,
// @divRetour = id de la div où afficher le retour 
//				OU BIEN 
//				nom de la modal à mettre dans l'url GET
function AjaxFct (dataStr, dest, reload, divRetour, urlToGo ) {
	if (divRetour == null || divRetour == undefined || divRetour == '')
		divRetour = 'debugAjax';
	$.ajaxq('ajaxQueue', {
		url: "./fct/"+dest+".php",
		type: "POST",
		data: dataStr,
		success: function (retour) {
			if (reload != null && reload != undefined && reload != false) {
				window.location.reload();
			}
			else {
				if (retour != '') {
					$("#"+divRetour).html('<a class="bouton" href="#" style="float:right; font-size:0.9em; top:-5px;" onclick="reloadAtUrl(\''+urlToGo+'\')" title="rafraichir la page">oki</a>'+retour);
					$("#"+divRetour).show(300);
					$("#"+divRetour).effect('pulsate', 300);
					$(".bouton").button();
				}
			}
		},
		error: function () {
			alert('Erreur Ajax ! vérifiez votre connexion à internet. Il se peut aussi que le serveur soit temporairement inaccessible... WTF!');
		}
	});
}
////////////////////////////////////////////////////////////////////////


// Fonction Ajax - méthode de récupération JSON. Paramètres :
// @dataStr  = chaine de requête à envoyer,
// @dest     = nom du fichier php de traitement (sans l'extension 'php'),
// @callback = nom de la fonction qui va traiter le JSON
// @params   = un paramètre (string), ou un tableau des paramètres à envoyer à la fonction de callback si besoin
// remarque : le décodage JSON se fait ici, pas besoin de le faire après... On peut directement traiter l'objet data
function AjaxJson (dataStr, dest, callback, params) {
	var parametres = new Array();
	parametres = parametres.concat(params);
	$.ajaxq('ajaxQueue', {
		url: "./fct/"+dest+".php",
		type: "POST",
		data: dataStr,
		success: function (retour) {
			try {var data = jQuery.parseJSON(retour);}
			catch (err) { alert('ERREUR JSON : '+err+'\nRETOUR PHP :\n\n'+ retour); abortAjax(); }
			parametres.unshift(data);
			callback.apply(this, parametres);
		},
		error: function () {
			alert('Erreur Ajax ! vérifiez votre connexion à internet. Il se peut aussi que le serveur soit temporairement inaccessible... WTF!');
		}
	});
}
////////////////////////////////////////////////////////////////////////



// Fonction pratique pour cas général de traitement de retour Json
// @retour : error -> si par d'erreur, chaine 'OK', sinon la chaine de l'erreur
//			 type  -> 'reloadPage', ou bien 'removeDiv'
//			 divId -> dans le cas d'une action sur la div (removeDiv par ex.), l'id de la div
function alerteErr (retour) {
	if (retour.error == 'OK') {
		if (retour.type == 'reloadPage') {
			window.location.reload();
		}
		else if (retour.type == 'removeDiv') {
			$('#'+retour.divId).remove();
		}
	}
	else {
		alert(retour.error);
		if (retour.type == 'reloadPage') {
			window.location.reload();
		}
	}
}


// Fonction pratique pour rafraichir une page, ou changer de page suite à un retour ajax
function reloadAtUrl(urlToGo) {
	if ( urlToGo == 'undefined' || $(document).getUrlParam("sousPage") == urlToGo ) {
		window.location.reload();
	}
	else {
		if (urlToGo == 'calendrier')
			window.location = 'index.php?go=calendrier';
		else {
			var urlBase  = window.location.href.split('&')[0];
			var goTo = urlBase+'&sousPage='+urlToGo;
			var goToSsPage = goTo.replace(/\#/, '');
			window.location = goToSsPage;
		}
	}
}


function abortAjax() {
	$('#logo').children('img').attr('src', 'gfx/logo.png');
	$('#bigDiv').css('cursor', 'auto');
}