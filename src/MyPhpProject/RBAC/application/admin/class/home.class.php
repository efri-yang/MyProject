<?php
	class Home{
		public function index($destUrl){
			header("Location:".$destUrl);
		}
	}
?>