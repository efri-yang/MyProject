<?php
	class Address{
		protected $city;
		protected $country;

		public function setCity($city){
			$this->city=$city;
		}
		public function getCity(){
			return $this->city;
		}
		public function setCountry($country){
			$this->country=$country;
		}
		public function getCountry($country){
			return $this->country;
		}
	}


	class Person{
		protected $name;
		protected $address;
		public function __construct(){
			$this->address=new Address();
		}
		public function setName($name){
			echo "xxx"."<br/>";
			$this->name=$name;
		}
		public function getName(){
			return $this->name;
		}
		public function __call($method,$arguments){

			if(method_exists($this->address,$method)){
				return call_user_func_array(array($this->address,$method),$arguments);
			}
		}
	}

	$rasmus=new Person();

	$rasmus->setName('杨艺辉');
	$rasmus->setCity('厦门');
	
	// echo $rasmus->getCity()."<br/>";

	$zeev=clone $rasmus;


	$zeev->setName("杨鹏辉");
	$zeev->setCity("赤土");


	print_r($rasmus->getName())."<br/>";
	print_r($zeev->getName())."<br/>";


	print_r($rasmus->getCity())."<br/>";
	print_r($zeev->getCity())."<br/>";


?>