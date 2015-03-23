<?php

require_once('config.php');
require_once('data.php');
if( isset($_GET['filename']) ) {
	$curfile = getCurrentFile($_GET['filename']);
}
$curext = getFileExtension($curfile);

// need to get the language key from the curext...
if (in_array("." . $curext, $lang_exts)) {
	$lang_key = array_search("." . $curext, $lang_exts);
	print $lang_key;
}
