<?php
	class MyDestructableClass{
		function __construct(){
			print "In MyDestructableClass-constructor"."<br/>";
			$this->name="MyDestructableClass";
		}

		function __destruct(){
			print "Destroying ".$this->name."\n";
		}
	}

	$obj=new MyDestructableClass();
?>