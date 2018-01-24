<?php
	class Address{
		protected $city;
		protected $country;

		public function setCity($city){
			echo "调用了Address->setCity"."<br/>";
			$this->city=$city;
		}
		public function getCity(){
			echo "调用了Address->getCity"."<br/>";
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
			echo "调用了Person->setName"."<br/>";
			$this->name=$name;
		}
		public function getName(){
			echo "调用了Person->getName"."<br/>";
			return $this->name;
		}
		public function __call($method,$arguments){ // $rasmus->setCity 这个方法在Person 未定义所以就触发了这个函数
			echo "Person ---call"."<br/>";
			echo $method."<br/>";
			if(method_exists($this->address,$method)){ // 判断address 对象中是否有method的方法，如果有
				return call_user_func_array(array($this->address,$method),$arguments);
				//调用address 对象中 setCity 方法
			}
		}
	}

	$rasmus=new Person();

	$rasmus->setName('杨艺辉');
	$rasmus->setCity('厦门');

	$rasmus->address->getCity(); 
	
	// echo $rasmus->getCity()."<br/>";

	// $zeev=clone $rasmus;


	// $zeev->setName("杨鹏辉")."<br/>";
	// $zeev->setCity("赤土")."<br/>";


	// print_r($rasmus->getName())."<br/>";
	// echo "<br />";
	// print_r($zeev->getName())."<br/>";
	// echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";

	// print_r($rasmus->getCity())."<br/>";

	// echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";
	// print_r($zeev->getCity())."<br/>";


?>