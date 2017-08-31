<?php







$i=1;
function deeploop(){
 global $i;
 echo $i;
 $i++;
 if($i<10){
      deeploop($i);	 
 }	
};
deeploop();













































?>