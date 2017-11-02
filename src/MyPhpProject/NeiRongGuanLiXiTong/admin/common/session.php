<?php

	
	if(empty($_SESSION['userid'])){
		header("Location:".ROOT_PATH."/admin/login.php");
	}
?>