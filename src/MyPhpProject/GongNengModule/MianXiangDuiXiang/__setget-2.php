<?php
	class Person{
		public $name;
		protected $age;
		private $phone;
		public function __set($propertyName,$value){
			echo "设置".$propertyName."的时候：Person->__set方法被调用"."<br/>";
			$this->$propertyName=$value;
		}
		public function __get($propertyName){
			echo "Person->__get方法被调用"."<br/>";
			return $this->$propertyName;
		}
	}
	$person1=new Person();
	$person1->name="杨艺辉"; //设置类中已声明的public属性，不会触发__set
	
	echo $person1->name; //类中name已经是public，不会触发__get
	

?>