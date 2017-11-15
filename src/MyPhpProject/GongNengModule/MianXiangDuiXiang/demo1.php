<?php
	class test1{

		public $test1V="早上";
	}

	class test2{
		public $test1obj;
		public $test2V="下午";
	}


	$test2_1=new test2();
	$test1=new test1();

	$test2_1->test1obj=$test1;
	$test2_2=clone $test2_1;	
	$test2_1->test1obj->test1V="吃早餐111";
	$test2_1->test2V="中午饭";

	echo  $test2_2->test1obj->test1V;
?>