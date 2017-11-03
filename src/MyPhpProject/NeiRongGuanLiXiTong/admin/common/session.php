<?php

	
	if(empty($_SESSION['userid'])){
		header("Location:".STATIC_PATH."/admin/login.php");
	}
?>