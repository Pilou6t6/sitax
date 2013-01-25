<script type="text/javascript" src="js/date.js"></script>

<script>

	function nl2br(value) {
		return value.replace(/\n/g, "<br />");
	}

	// Affichage des la liste des bugs, ou des want-more
	function afficheIssue (issue, div) {
		var dateIssue = Date.parseExact(issue.created_at, 'yyyy-MM-ddTHH:mm:ssZ');
		var assignee = '';
		if (issue.assignee != null) {
			assignee = '<div class="inline petit floatRight ui-state-error ui-corner-all" style="padding:2px 4px 0px 3px;">'
						+ '<div class="inline top"> <img src="'+issue.assignee.avatar_url+'" width="18" /></div> '
						+ '<div class="inline top"><b>'+issue.assignee.login+'</b> est dessus !</div>'
					+  '</div>';
		}
		var comment = '';
		if (issue.comments > 0) {
			comment = '<div class="inline petit floatRight pad3">'
						+ '<a href="'+issue.comments_url+'" target="_new"><u>'+issue.comments+' commentaire(s)</u></a>'
					+ '</div><br /><br />';
		}
		div.append('<div class="ui-state-active ui-corner-top pad3 gros gras margeTop10">#'+issue.number+' '+issue.title + '</div>'
				+  '<div class="ui-state-default ui-corner-bottom pad3">'
					+ assignee
					+ '<div class="petit ui-state-disabled pad3">par <b>'+issue.user.login+'</b>, le <i>'+dateIssue.toString('dd/MM/yyyy, HH:mm')+'</i></div>'
					+ nl2br(issue.body)
					+ '<br />'+comment
				+  '</div>');
//		console.log(issue);
	}

	// Setup Ajax pour auth CORS
	$.ajaxSetup({
		headers: { Origin: "http://www.robert.polosson.com" }
	});


	// Envoi de nouveau bug, ou want-more
	function sendNewIssue (type) {
		var token = $('#access_token').val();
		var params = JSON.stringify({
			"title" : $('#issueTitre').val(),
			"body"  : $('#issueDesc').val(),
			"labels": [type]
		});
		$.post('https://api.github.com/repos/RobertManager/robert/issues?access_token=' + token, params, function(rep){
			console.log(rep);
		}, 'json');
		$('#modalAddIssue').dialog('close');
	}

	// Document Ready
	$(function(){

		// récup des bugs chez GitHub
		$.get('https://api.github.com/repos/RobertManager/robert/issues?state=open&labels=bug', function(data) {
			$('#bugList').html('');
			data.reverse();
			$.each(data, function(idx, issue){
				afficheIssue(issue, $('#bugList'));
			});
		}, 'json');

		// récup des want-more chez GitHub
		$.get('https://api.github.com/repos/RobertManager/robert/issues?state=open&labels=wantMore', function(data) {
			$('#wantMoreList').html('');
//			data.reverse();
			$.each(data, function(idx, issue){
				afficheIssue(issue, $('#wantMoreList'));});
		}, 'json');

		if (localStorage['codeAuthGitHub']) {
			console.log('récup du token chez GitHub...');
			var code = localStorage['codeAuthGitHub'];
			$('#code').val(code);
			$.get('fct/gitHubLink.php?code=' + code, function (access_token) {
				$('#access_token').val(access_token);
				$.getJSON('https://api.github.com/user?access_token=' + access_token, function (user) {
					$('#username').val(user.login);
				});
			});
		}

		// Bouton ajout de bug
		$('#btnAddBug').click(function(){
			if (localStorage['codeAuthGitHub']) {
				$('#modalAddIssue').dialog({
					autoOpen: true, height: 500, width: 660, modal: true, title: 'Ajouter un BUG',
					open: function(e, ui){ $('#issueTypeLabel').addClass('ui-state-error').html('BUG'); },
					buttons:{'Envoyer' : function() { sendNewIssue('bug'); },
							 'Annuler' : function() { $(this).dialog('close'); }}
				});
				localStorage.removeItem("codeAuthGitHub");
			}
			else
				window.location('https://github.com/login/oauth/authorize?client_id=47884071d6faa11df001&scope=public_repo');
//				window.open('https://github.com/login/oauth/authorize?client_id=47884071d6faa11df001&scope=public_repo');

		});

		// Bouton ajout de want-more
		$('#btnAddWM').click(function(){
			if (localStorage['codeAuthGitHub']) {
				$('#modalAddIssue').dialog({
					autoOpen: true, height: 500, width: 660, modal: true, title: 'Ajouter un "want-more"',
					open: function(e, ui){ $('#issueTypeLabel').addClass('ui-state-active').html('Want-More'); },
					buttons:{'Envoyer' : function() { sendNewIssue('wantMore'); },
							 'Annuler' : function() { $(this).dialog('close'); }}
				});
				localStorage.removeItem("codeAuthGitHub");
			}
			else
				window.location('https://github.com/login/oauth/authorize?client_id=47884071d6faa11df001&scope=public_repo');
//				window.open('https://github.com/login/oauth/authorize?client_id=47884071d6faa11df001&scope=public_repo');
		});

	});
</script>


<div class="pageContent">

	<div class="inline top marge30r" style="width:45%;">
		<div class="ui-widget-header ui-corner-all big gras center pad5">
			<div class="floatRight nano">
				<span class="bouton" title="Ajouter un 'BUG'" id="btnAddBug"><span class="ui-icon ui-icon-plusthick"></span></span>
			</div>
			Liste des bugs
		</div>
		<div id="bugList">
			<div class="center"><img src="gfx/loading.gif" width="35" /></div>
		</div>
	</div>

	<div class="inline top marge30l" style="width:45%;">
		<div class="ui-widget-header ui-corner-all big gras center pad5">
			<div class="floatRight nano">
				<span class="bouton" title="Ajouter un 'Want-More'" id="btnAddWM"><span class="ui-icon ui-icon-plusthick"></span></span>
			</div>
			Liste des "want-More"
		</div>
		<div id="wantMoreList">
			<div class="center"><img src="gfx/loading.gif" width="35" /></div>
		</div>
	</div>

</div>

<div class="hide" id="modalAddIssue">
	<div class="inline ui-corner-all padH5 marge15bot marge10r center" style="width:90px;" id="issueTypeLabel"></div>Donnez-lui un titre (description courte) et une description détaillée :
	<br />
	<div class="inline" style="width:100px;">Titre :</div><input class="shadowOut" type="text" size="50" id="issueTitre" />
	<br /><br />
	<div class="inline top" style="width:100px;">Description :<br /><small class="ui-state-disabled">Soyez le plus précis possible !</small></div><textarea class="shadowOut" id="issueDesc" cols="48" rows="15"></textarea>
	<input type="text" class="hide" id="code" />
	<input type="text" class="hide" id="access_token" />
	<input type="text" class="hide" id="username" />
</div>









