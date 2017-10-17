<?php
	class Person{
		public $name="yyh";
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

		public function getName($name){
			return $this->$name;
		}

		

	}

	// class Man extends Person{
	// 	public function getName($name){
	// 		echo "Man->getName方法被调用"."<br/>";
	// 		return $this->$name;
	// 	}
	// }

	$person1=new Person();
	$person1->name="杨艺辉"; //设置类中已声明的属性，不会触发__set
	$person1->username="散崖"; //设置类中未声明的属性，会触发__set
	// echo $person1->getName('name');
	// $man1=new Man();

	// echo $man1->getName('name');


?>