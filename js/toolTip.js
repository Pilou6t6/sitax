
function showToolTip (toAff, decalageX, decalageY, customToolTip) {
	$(customToolTip).html(toAff);
	$(customToolTip).show();
	$(document).bind('mousemove', function(e) {
		var sy = $(customToolTip).parent().scrollTop();
		var tx = e.pageX + decalageX;
		var ty = e.pageY + sy + decalageY ;
		$(customToolTip).css({'left': tx+'px', 'top': ty+'px', 'z-index': '9999'});
	});
}


function hideToolTip (customToolTip) {
	$(customToolTip).hide();
}

function initToolTip (fromWhere, decalageX, decalageY, customToolTip) {
	if (decalageX == undefined || decalageX == '') decalageX = 10;
	if (decalageY == undefined || decalageY == '') decalageY = 10;
	if (customToolTip == undefined || customToolTip == '') customToolTip = '#toolTipPopup';
	
	$(fromWhere).on('mouseenter', '[popup]', function() {
		var toAff = $(this).attr('popup');
		if ( toAff != '') {
			toAff = stripslashes(toAff);
			showToolTip(toAff, decalageX, decalageY, customToolTip);
		}
	}).on('mouseleave', '[popup]', function() {
		hideToolTip(customToolTip);
	});
}

/* EXEMPLE D'UTILISATION :
*  doit toujours être appellée dans un $(function) (= document.ready)
*  la div 'fromWhere' doit être une div parente des tags ayant l'attribut [popup='']
	$(function() {
		initToolTip('#planTekosMatos');
	});
* 
* 
*/