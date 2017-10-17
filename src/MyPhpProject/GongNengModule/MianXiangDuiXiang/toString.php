<?php
	class Person{
	
		protected $email;
		protected $name;
		public function __set($propertyName,$value){
			echo "xxx";
			$this->$propertyName=$value;
		}

		
		public function  __toString(){
			return "$this->name---$this->email";
		}
		public function setName($name){
			$this->name=$name;
		}

		public function setEmail($name){
			$this->email=$name;
		}
	}

	$rasums=new Person();
	$rasums->setName("007");
	$rasums->setEmail("sdfasz");
	

	print_r($rasums);
	

	
?>