<?php
session_start();
$table = array(
'pic0'=>'猫',
'pic1'=>'狗',
'pic2'=>'蛇',
'pic3'=>'马'
);
$index = rand(0,3);
$value = $table['pic'.$index];
$_SESSION['authcode'] = $value;
$filename = dirname(__FILE__).'\\pic'.$index.'.jpg';
$contents = file_get_contents($filename);
header('content-type:imege/jpg');
echo $contents;

?>