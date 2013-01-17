<script src="js/markdown.js"></script>

<div class="pageContent">

	<div id="markdown_code" class="hide">
		<textarea>
			<?php
				$file = '../robert.wiki/5)-Documentation-du-Robert-:-DÉVELOPPEMENT.md';
				$handle = fopen($file, "r");
				$contents = fread($handle, filesize($file));
				fclose($handle);
				echo $contents ;
			?>
		</textarea>
	</div>

	<div id="html_code"></div>

<span><a href="https://github.com/evilstreak/markdown-js" target="_blank">powered by markdown-js</a> :)</span>

<script>
	txt = markdown.toHTML( $("#markdown_code").text() )
	$("#html_code").html ( txt ) ;
</script>

</div>
