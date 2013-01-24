<script type="text/javascript" src="js/date.js"></script>

<script>

	function nl2br(value) {
		return value.replace(/\n/g, "<br />");
	}

	function afficheIssue (issue, div) {
		console.log(issue);
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
	}

	$.ajaxSetup({
		headers: { Origin: "http://www.robert.polosson.com" }
	});


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
			data.reverse();
			$.each(data, function(idx, issue){
				afficheIssue(issue, $('#wantMoreList'));});
		}, 'json');

	});
</script>


<div class="pageContent">

	<div class="inline top marge30r" style="width:45%;">
		<div class="ui-widget-header ui-corner-all big gras center pad5">
			Liste des bugs
		</div>
		<div id="bugList">
			<div class="center"><img src="gfx/loading.gif" width="50" /></div>
		</div>
	</div>

	<div class="inline top marge30l" style="width:45%;">
		<div class="ui-widget-header ui-corner-all big gras center pad5">
			Liste des "want-More"
		</div>
		<div id="wantMoreList">
			<div class="center"><img src="gfx/loading.gif" width="50" /></div>
		</div>
	</div>

</div>