<?php 
	$size=20481;
	$arr=array("Byte","KB","MB","GB","TB","EB");
	$i=0;
	while($size>=1024){
		$size/=1024;
		$i++;
	}
	echo round($size,2).$arr[$i];
 ?>