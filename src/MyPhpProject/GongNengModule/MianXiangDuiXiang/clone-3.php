<?php
	class SubObject{
		static $instances=0;
		public $instance;

		public function __construct(){

			$this->instance=++self::$instances;
		}
		public function __clone(){
			$this->instance=++self::$instances;
		}
	}

	class MyCloneable{
		public $object1;
    	public $object2;

    	function __clone(){
    		$this->object1 = clone $this->object1;
    	}
	}

	$obj = new MyCloneable();
	$obj->object1 = new SubObject();  // 1
	$obj->object2 = new SubObject();  //2


	$obj2 = clone $obj;  //$obj->object1=3

	print("Original Object:\n");
	print_r($obj);

	print("Cloned Object:\n");
	print_r($obj2);
?>