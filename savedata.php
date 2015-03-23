<?php

require_once('config.php');
$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server [savedata.php]");
mysql_select_db($mysqldb) or die("Could not select database [savedata.php]");

$data = addslashes(htmlentities($_POST['data']));
if($_GET['filename'] && $_GET['filename'] != "undefined") $sql = "UPDATE " . $mysqltbl . " SET data='$data', updated=NOW() WHERE filename='". $_GET['filename'] ."'";
else $sql = "UPDATE " . $mysqltbl . " SET data='$data', updated=NOW() ORDER BY updated DESC LIMIT 1";
$query = mysql_query($sql) or die(mysql_error());
