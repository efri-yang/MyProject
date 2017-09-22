<!-- <?php 
	$size=20481;
	$arr=array("Byte","KB","MB","GB","TB","EB");
	$i=0;
	while($size>=1024){
		$size/=1024;
		$i++;
	}
	echo round($size,2).$arr[$i];
 ?> -->

<!-- <?php
	$path="./file/1.txt";
	$ext=pathinfo($path,PATHINFO_EXTENSION);
	echo $ext;
?> -->

<!-- <?php 
	
	if($handle=opendir(".")){
		while (false !==($file=readdir($handle))) {
			if($file !="." && $file !=".."){
				 echo "$file\n";
			}
		}
		closedir($handle);
	}
 ?> -->


 <?php
 	$path="./fileMR/file/2.jpg";
 	

 	print_r(basename("./fileMR/index.html"));
 ?>