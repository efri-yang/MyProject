<?php
    //其他文件引用这个文件，APP_ROOT 都是固定不变的，被引用后 输出的还是Path.php 所在文件夹
	define("APP_ROOT_PATH",dirname(__FILE__)); 
	define("APP_ROOT_URL",'http://'.$_SERVER['HTTP_HOST']."/MyProject/src/MyPhpProject/NeiRongGuanLiXiTong");
?>