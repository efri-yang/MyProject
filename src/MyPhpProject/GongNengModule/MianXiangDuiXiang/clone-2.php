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
		public function __clone(){
			echo "Person 类 中 __clone"."<br/>";
			$this->address=clone $this->address;
		}
	}

	$rasmus=new Person();

	$rasmus->setName('杨艺辉');
	$rasmus->setCity('厦门');
	
	// echo $rasmus->getCity()."<br/>";

	$zeev=clone $rasmus;


	$zeev->setName("杨鹏辉");
	$zeev->setCity("赤土");


	print_r($rasmus->getName());
	print_r($rasmus->getCity());
	echo "<br/>";

	print_r($zeev->getName());
	print_r($zeev->getCity());


?>