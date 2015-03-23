<?php
	require_once('config.php');
	$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server: " . $_SERVER['SCRIPT_NAME']);
	mysql_select_db($mysqldb) or die("Could not select database: " . $_SERVER['SCRIPT_NAME']);
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
		<a class="headerimg" href="/dev/lab/collaborate/">
			<img src="collaborate-icon.png" alt="">
		</a>
		<?php include('menu.php'); ?>
	</div>

	<br clear="all" />

	<div id="settingspage">
		<h2>Files</h2>
		<?php
			if($link) {
				$sql = "SELECT id, filename FROM " . $mysqltbl . " ORDER BY updated DESC";
				$query = mysql_query($sql) or die(mysql_error());
				$numrows = mysql_num_rows($query);
				if($numrows):
					$i = 0;
					while(list($id, $filename) = mysql_fetch_row($query)) {
						echo '<div id="'.$filename.'" class="filelisting">'.$filename;
						if($numrows > 1) echo ' <a href="" class="delete"><img src="delete-icon.png" alt="Delete"></a>';
						echo '</div>';
						$i++;
					}
				endif;
			}
		?>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="http://code.jquery.com/jquery-1.9.1.min.js"><\/script>')</script>
	<script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="jquery.chosen.min.js"></script>
	<script src="chosen.js"></script>
	<script src="script.js"></script>

</body>
</html>
