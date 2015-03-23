<?php

require_once('config.php');
$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server [deletefile.php]");
mysql_select_db($mysqldb) or die("Could not select database [deletefile.php]");

if($_POST['data']) {
	$sql = "DELETE FROM " . $mysqltbl . " WHERE filename='" . $_POST['data'] . "'";
	$query = mysql_query($sql) or die(mysql_error());
}
