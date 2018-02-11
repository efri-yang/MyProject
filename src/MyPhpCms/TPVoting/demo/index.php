<?php
$data = array('foo' => 'bar',
	'baz' => 'boom',
	'cow' => 'milk',
	'php' => 'hypertext');

$code = http_build_query($data);
$sign = sha1($code);
// echo $code;
echo $sign;

?>