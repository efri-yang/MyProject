<?php
	class SubObject{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
    	echo "xxx";
        $this->instance = ++self::$instances;
    }
}

	class MyCloneable{
    public $object1;
    public $object2;

    function __clone()
    {
    	
      
        // 强制复制一份this->object， 否则仍然指向同一个对象
        $this->object1 = clone $this->object1;
    }
}


$obj1=new SubObject();
echo $obj1->instance;
clone  $obj1;
	// $obj = new MyCloneable();

	// $obj->object1 = new SubObject();

	// echo "obj——".$obj->object1->instance."<br/>";

	// $obj2 = clone $obj; //调用
	// echo "obj2——".$obj2->object1->instance."<br/>";

	// $obj->object1->instance++;
	// $obj->object1->instance++;
	// $obj->object1->instance++;

	// echo "obj——".$obj->object1->instance."<br/>";
	// echo "obj2——".$obj2->object1->instance."<br/>";

	
	

?>