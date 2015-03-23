<?php
	require_once('config.php');
	$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server: " . $_SERVER['SCRIPT_NAME']);
	mysql_select_db($mysqldb) or die("Could not select database: " . $_SERVER['SCRIPT_NAME']);
	require_once('data.php');
	$curfile = getCurrentFile($link);
	$curext = getFileExtension($curfile);
	$webroot = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Code Collaboration</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="chosen.min.css">
	<link rel="stylesheet" href="style.css">
	<meta property="og:type" content="blog">
	<meta property="og:title" content="Code Collaboration | WebSight Designs">
	<meta property="og:description" content="Technology / Web Development">
	<meta property="og:url" content="http://websightdesigns.com/lab/collaborate.html">
	<meta property="og:site_name" content="WebSight Designs">
	<meta property="og:image" content="http://www.websightdesigns.com/img/ico/apple-touch-icon-144x144-precomposed.png">
</head>
<body>
	<div class="container clearfix">
		<h1>Code Collaboration</h1>
		<a class="headerimg" href="<?php echo $webroot; ?>">
			<img src="collaborate-icon.png" alt="">
		</a>
		<?php require_once('menu.php'); ?>
	</div>
	<div id="editor"><?php include('getdata.php'); ?></div>
	<span id="github">
		<a href="https://github.com/websightdesigns/collaborate" target="_blank">Clone on Github</a>
	</span>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="http://code.jquery.com/jquery-1.9.1.min.js"><\/script>')</script>
	<script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!-- <script src="http://rawgithub.com/ajaxorg/ace-builds/master/src-noconflict/ace.js"></script> -->
	<script>window.ace || document.write('<script src="src-min-noconflict/ace.js"><\/script>')</script>
	<script>
	    var editor = ace.edit("editor");
	    editor.setTheme("ace/theme/tomorrow_night");
	    editor.getSession().setMode("ace/mode/javascript");
	    editor.getSession().setUseWorker(false);
	</script>
	<script>
		// get initial syntax highlighting
		$(document).ready(function() {
			if(location.hostname != "collaborate.localhost") var directory = "/dev/lab/collaborate";
			else var directory = null;
			var ajaxurl = location.protocol + '//' + location.hostname;
			if(directory) ajaxurl = ajaxurl + directory;
			ajaxurl = ajaxurl + '/loadsyntax.php?filename='
				+ $('#filename option[selected="selected"]').prop('value');
			$.ajax({
				type: "POST",
				url: ajaxurl,
				success: function(data) {
					editor.getSession().setMode( "ace/mode/" + data );
				}
			});
		});
		// on change, set syntax highlighting
		$('#mode').on('change', function() {
			editor.getSession().setMode( "ace/mode/" + $(this).val() );
		});
		$('#theme').on('change', function() {
			editor.setTheme( $(this).val() );
		});
		$('#fontsize').on('change', function() {
			document.getElementById('editor').style.fontSize=$(this).val();
		});
	</script>
	<script src="togetherjs.js"></script>
	<script src="jquery.chosen.min.js"></script>
	<script src="chosen.js"></script>
	<script src="script.js"></script>
</body>
</html>