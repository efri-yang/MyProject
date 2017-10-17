<?php
	// class Person{
		
	// 	public function __set($propertyName,$value){
	// 		echo "设置(__set)".$propertyName."的时候：Person->__set方法被调用"."<br/>";
	// 		$this->$propertyName=$value;
	// 	}
	// 	public function __get($propertyName){
	// 		echo "获取(__get)".$propertyName."Person->__get方法被调用"."<br/>";
	// 		return $this->$propertyName;
	// 	}
	// }
	// 
	class Person{
		private $data=array();
		public function __set($propertyName,$value){
			echo "设置(__set)".$propertyName."的时候：Person->__set方法被调用"."<br/>";
			$this->data[$propertyName] = $value;
		}
		public function __get($propertyName){
			echo "获取(__get)".$propertyName."Person->__get方法被调用"."<br/>";
			return $this->data[$propertyName];
		}
	}
	$person1=new Person();
	$person1->username="杨艺辉"; //会调用set
	echo $person1->username."<br/>"; //会调用get  因为data是私有
?>