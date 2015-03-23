<?php

require_once('config.php');
$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server [newfile.php]");
mysql_select_db($mysqldb) or die("Could not select database [newfile.php]");

$siteuri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://')
	. $_SERVER['HTTP_HOST']
	. str_replace("/newfile.php", "/", $_SERVER['REQUEST_URI']);

$filename = ( isset($_POST['newfilename']) ? $_POST['newfilename'] : '' );
$sql = "INSERT INTO " . $mysqltbl . " (filename, data, created, updated) VALUES ('$filename', '', NOW(), NOW())";
$query = mysql_query($sql) or die(mysql_error());

header('Location: ' . $siteuri);
