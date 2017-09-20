<?php
	function getExt($filename){
		return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	}
	function getUniName(){
		return md5(uniqid(microtime(true),true));
	}
?>