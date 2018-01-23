<?php

class TextInput{
	$label="asdfasdf";
	public function __toString(){
		return $this->label;
	}
}

$p1=new TextInput();
	
	// function get_file($filename){
	// 	return file_get_contents($filename);
	// }

	// $function="get_file";
	// $args=array("https://mmbiz.qpic.cn/mmbiz_gif/uxWj6c30TTuxoAmVhySQuDKqyj5NHYFA5vVRFQics8DGxGqXbhz8lOECdTQM9j8Uuicmj84lqQpZ2NIsfpicfluXw/?wx_fmt=gif&tp=webp&wxfrom=5&wx_lazy=1");


	// echo call_user_func_array($function,$args);

	
	// $food="pizza";
	// $drink="beer";

	// function party(){
	// 	global $food,$drink;
	// 	unset($food);
	// 	unset($GLOBALS['drink']);
	// }

	// print "$food:$drink"."<br/>";
	// party();
	// print "$food:$drink"."<br/>";
	//pizza:beer
	//pizza:


	

	
?>