<?php
	namespace app\index\service;


	class User{
		public function checklogin($username = '', $password = ''){
			if (empty($username) || empty($password)) {
	            return false;
	        }
		}
	}


?>