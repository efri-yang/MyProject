<?php
	class A {
		public $a=10;
		public $b=20;
		protected $c=30;


		public function demo(){

	    	echo "xxx";
	    }

		function __construct(){

			$a=func_get_args();
			$i=func_num_args();
			if(method_exists($this,$f='__construct'.$i)){ //检查类的方法是否存在
				call_user_func_array(array($this,$f),$a); 
				//$a 就是一个数组.array($this,$f)  把第一个参数作为回调函数调用
				//Call the $$this->$f() method with 2 arguments
			}
		}

		function __construct1($a1) 
	    { 
	        echo('__construct with 1 param called: '.$a1.PHP_EOL); 
	    } 
	    
	    function __construct2($a1,$a2) 
	    { 
	        echo('__construct with 2 params called: '.$a1.','.$a2.PHP_EOL); 
	    } 
	    
	    function __construct3($a1,$a2,$a3) 
	    { 
	        echo('__construct with 3 params called: '.$a1.','.$a2.','.$a3.PHP_EOL); 
	    } 


	}

	
	$o = new A('sheep','cat');

	var_dump($o);

?>