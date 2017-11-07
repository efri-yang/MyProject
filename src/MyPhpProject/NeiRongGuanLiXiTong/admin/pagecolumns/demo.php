<?php
	$mystring = '/aa/bb/cc/';
$findme   = '/';
$pos = strrpos($mystring, $findme);
echo ($pos+1)==strlen($mystring);

?>