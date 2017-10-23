<?php 

  function a(){
  	global $a;
  	$a=0;
  	$a++;
  }
  a();
  a();
  echo $a;
 ?>