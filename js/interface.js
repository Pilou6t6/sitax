
var transition = 300;	// temps global des animations (en ms)

$(function() {
	// vérification de la taille minimum d'affichage
	checkTailleEcran(1200); // param = taille mini de l'écran (largeur)
	// dimensionnement des icones menus de gauche
	resizeIcones(0.5, 70);
	// initialisation des tooltips
	initToolTip('#leftCol', -60, 20);
	initToolTip('#reseauSocial', -160, -30);

	// init des datePickers
	$(".miniCal" ).datepicker({dateFormat: 'yymmdd', firstDay: 1, changeMonth: true, changeYear: true});		// Calendrier inline
	$(".inputCal").datepicker({dateFormat: 'dd/mm/yy', firstDay: 1, changeMonth: true, changeYear: true});		// Calendrier sur focus d'input
	$(".bouton"  ).button();																					// pour faire des jolis boutons

	// Animations d'attente lors de requêtes AJAX
	$('#logo').ajaxStart(function(){
		$(this).children('img').attr('src', 'gfx/logo-anim.png');
	});
	$('#logo').ajaxStop(function(){
		$(this).children('img').attr('src', 'gfx/logo.png');
	});

	$('#bigDiv').ajaxStart(function(){
		$(this).css('cursor', 'wait');
	});
	$('#bigDiv').ajaxStop(function(){
		$(this).css('cursor', 'auto');
	});

	// Changement du thème avec le sélecteur (menu de droite)
	$("#themeSel").change(function () {
		var newTheme = $("#themeSel").val();
		var dataStr = 'action=modifTheme&theme='+newTheme;
//		alert(newTheme);
		AjaxFct(dataStr, 'user_actions', 'reload');
	});

	// Changement de place du menu : soit à gauche de l'écran, soit en haut
	$('#switchMenu').click(function(){
		$('#leftCol').toggleClass('Lv Lh');
		$('#centerCol').toggleClass('Cv Ch');
		var orient = 'v';
		if ($('#leftCol').hasClass('Lh'))
			orient = 'h';

		$('.menu_entry').each(function(i, elem){
			if ($(elem).parent('#leftCol').hasClass('Lh')) {
				$(elem).removeClass('menu_icon').addClass('menuh_icon');
				$('#logo').show();
			}
			else {
				$(elem).removeClass('menuh_icon').addClass('menuv_icon');
				resizeIcones(0.5, 70);
				$('#logo').hide();
			}
		});
		var dataStr = 'action=modifOrient&newOrient='+orient;
		AjaxFct(dataStr, 'user_actions');
	});

	// INIT du Captcha
	$('.QapTcha').QapTcha({
		autoSubmit : false,
		autoRevert : true,
		PHPfile : 'fct/Qaptcha.jquery.php',
		txtLock : 'Faites glisser le bouton ci dessus vers la droite pour pouvoir envoyer le message.',
		txtUnlock : 'Vous pouvez envoyer le message !'
	});

	// Vérification de la chaine email quand on sort d'une input 'email'
	$(document).on( 'blur' , ".EmailInput" , function() {
		var email = $(this).val();
		if ( email == '' ) return ;
		if ( ! verifyEmail(email) ) {
			alert ('Adresse Email invalide');
			$(this).val('');
		}
	});

	// Switch des boutons téléphone
	$('.phoneSwitch').click(function() {
		$(this).toggleClass('ui-state-highlight').next().toggle();
	});


	// icones des menus mouseover
	$(".menu_icon").hover(
		function () {$(this).addClass('ui-state-active');},
		function () {$(this).removeClass('ui-state-active');}
	);

});


// Redimesionnement des icones du menu de gauche
function resizeIcones ( mult, limit) {
	var qte     = $(".menuv_icon").length ;
	var hauteur = $(".Lv").height();
	var largeur = $(".Lv").width() - 20 ;

	var heightItem = hauteur / qte ;
	heightItem = heightItem - heightItem * mult ;

	$(".menuv_icon").each( function (ind, obj) {
		var icone = $(obj).find("img");
		icone.height( heightItem );
		if (icone.width() > largeur) {
			if (icone.height() >= limit) {
				icone.width(limit);
				icone.height(limit);
			}
			else {
				icone.width(largeur);
				icone.height(largeur);
			}
		}
	});
}


function checkTailleEcran( limiteX ) {
	var limiteY = limiteX * (9/16) - 100 ;
	var winWidth = $(window).width();
	var winHeight = $(window).height();

	if ( winWidth < limiteX || winHeight < limiteY ) {
//		alert(winWidth + ' x ' + winHeight + ' -- limite : ' + limiteX + ' x ' + limiteY);
		$('.homeSection').css('font-size', '0.9em').find('img').css('width', winHeight/3+'px');
	}
}



// Fork de la fonction php stripslashes pour virer les slashes d'une chaine.
function stripslashes (str) {
	return (str + '').replace(/\\(.?)/g, function (s, n1) {
        switch (n1) {
			case '\\':return '\\';
			case '0' :return '\u0000';
			case ''  :return '';
			default  :return n1;
		}
    });
}

// Fork de la fonction php addslashes pour ajouter des slashes dans une chaine.
function addslashes (str) {
    return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
}


// Utile pour vérifier les caractères autorisés
function checkChar (evt) {
	var keyCode = evt.which ? evt.which : evt.keyCode;
	var interdit = 'àâäãçéèêëìîïòôöõùûüñ &*?!:;,\t#~"^¨%$£?²¤§%*+@()[]{}<>|\\/`\'';
	if (interdit.indexOf(String.fromCharCode(keyCode)) >= 0) {
		return false;
	}
}

// juste une petite aide si firebug bug !!! LOL
function jsonViewer (data) {
	var jsonView = '';
	for (k in data) {
		jsonView += k +' : ' + data[k] + '<br /> ';
		if (typeof(data[k]) == "object") {
			for (l in data[k]) {jsonView += '--- > ' + l +' : ' + data[k][l] + '<br /> ';}
		}
	}
	return jsonView ;
}


// Pour effacer le contenu d'une div, puis la cacher
function clearDiv (divE) {
	$("#"+divE).html('');
	$("#"+divE).hide(transition);
}

// Vérification d'une chaine censée être un email
function verifyEmail( email ){
	var status = false;
	var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	if (email.search(emailRegEx) == -1) {
		status = false ;
	}
	else {
		status = true;
	}
	return status;
}


// BOUTON GOOGLE +1

window.___gcfg = {lang: 'fr'};

(function() {
	var po = document.createElement('script');
	po.type = 'text/javascript';
	po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(po, s);
})();
