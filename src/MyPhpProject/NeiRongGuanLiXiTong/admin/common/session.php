<?php

	
	if(empty($_SESSION['userid'])){
		header("Location:".APP_ROOT_URL."/admin/login.php");
	}
?>