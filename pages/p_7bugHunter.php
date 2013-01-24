<script type="text/javascript" src="js/date.js"></script>

<script>

	function nl2br(value) {
		return value.replace(/\n/g, "<br />");
	}

	$(function(){
		// récup des bugs chez GitHub
		$.get('https://api.github.com/repos/RobertManager/robert/issues?state=open&labels=bug', function(data) {
			$('#bugList').html('');
			data.reverse();
			$.each(data, function(idx, issue){
				console.log(issue);
				var dateIssue = Date.parseExact(issue.created_at, 'yyyy-MM-ddTHH:mm:ssZ');
				$('#bugList').append('<div class="ui-state-active ui-corner-top pad3 gros gras margeTop10">#'+issue.number+' '+issue.title + '</div>');
				$('#bugList').append('<div class="ui-state-default ui-corner-bottom pad3">'
										+ '<div class="petit ui-state-disabled pad3">par <b>'+issue.user.login+'</b>, le <i>'+dateIssue.toString('dd/MM/yyyy, HH:mm')+'</i></div>'
										+ nl2br(issue.body)
									+'</div>');
			});
		}, 'json');

		// récup des want-more chez GitHub
		$.get('https://api.github.com/repos/RobertManager/robert/issues?state=open&labels=wantMore', function(data) {
			$('#wantMoreList').html('');
			data.reverse();
			$.each(data, function(idx, issue){
				console.log(issue);
				var dateIssue = Date.parseExact(issue.created_at, 'yyyy-MM-ddTHH:mm:ssZ');
				$('#wantMoreList').append('<div class="ui-state-active ui-corner-top pad3 gros gras margeTop10">#'+issue.number+' '+issue.title + '</div>');
				$('#wantMoreList').append('<div class="ui-state-default ui-corner-bottom pad3">'
										+ '<div class="petit ui-state-disabled pad3">par <b>'+issue.user.login+'</b>, le <i>'+dateIssue.toString('dd/MM/yyyy, HH:mm')+'</i></div>'
										+ nl2br(issue.body)
									+'</div>');
			});
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