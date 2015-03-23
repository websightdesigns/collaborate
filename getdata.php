<?php

require_once('config.php');
$link = mysql_connect($mysqlhost . ":" . $mysqlport, $mysqluser, $mysqlpass) or die("Could not connect to server [getdata.php]");
mysql_select_db($mysqldb) or die("Could not select database [getdata.php]");

if( isset($_GET['filename']) && $_GET['filename'] ) {
	$sql = "SELECT id, data FROM " . $mysqltbl . " WHERE filename='" . $_GET['filename'] . "'";
} else {
	$sql = "SELECT id, data FROM " . $mysqltbl . " ORDER BY updated DESC LIMIT 1";
}

$query = mysql_query($sql) or die(mysql_error());
$numrows = mysql_num_rows($query);

if($numrows):
	while(list($id, $data) = mysql_fetch_row($query)) {
		echo str_replace("\\\\", "\\", $data);
	}
endif;
