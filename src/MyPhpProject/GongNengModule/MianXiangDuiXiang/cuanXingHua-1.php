
 <?php
 	
 	function say(){
 		$args=func_get_args();
 		print_r($args);
 	}

 	say(1,2,3);

	
 ?>