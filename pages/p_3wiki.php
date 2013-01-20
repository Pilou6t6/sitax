<script src="js/markdown.js"></script>
<script>
	$(function(){
		$('.pageContent').on('click', '.openWiki', function(){
			var idPageWiki = $(this).attr('idPage');
			$('.wikiContent').hide();
			$('#html_code_'+idPageWiki).show(300);
		});
	});
</script>

<div class="pageContent">

	<h1>Wiki</h1>
	
	<?php
	$np = 0;
	foreach (glob('../robert.wiki/*.md') as $wikiFile) :
		$pageName = basename($wikiFile);
		$pageName = substr($pageName, 0, -3);
		$pageName = preg_replace('/-/', ' ', $pageName);
		$np++;
		?>
		<div class="ui-state-default pad5 ui-corner-all doigt openWiki" idPage="<?php echo $np; ?>"><?php echo $pageName; ?></div>

		<div id="markdown_code_<?php echo $np; ?>" class="hide">
			<textarea><?php echo "\n\n"; echo trim(file_get_contents($wikiFile)); ?>
			</textarea>
		</div>

		<div id="html_code_<?php echo $np; ?>" class="wikiContent hide"></div>

		<script>
			txt = markdown.toHTML($("#markdown_code_<?php echo $np; ?>").text() )
			$("#html_code_<?php echo $np; ?>").html(txt) ;
		</script>

	<?php endforeach; ?>

	<div class="margeTop10 mini"><a href="https://github.com/evilstreak/markdown-js" target="_blank">powered by markdown-js</a> :)</div>

</div>
