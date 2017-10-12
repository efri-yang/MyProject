<?php
    //用其他编辑器打开存储为utf-8 no bom  
    ob_clean();/* 清空（擦掉）输出缓冲区，不加此行可能无法显示图像*/  
    $height=600;  
    $width=600;  
    //创建一个图像标识符  
    $im=imagecreatetruecolor($width,$height);  
    //为图像选择颜色  
    $white=imagecolorallocate($im,255,255,255);  
    $blue=imagecolorallocate($im,0,0,64);  
    $c=imagecolorallocate($im,255,125,10);  
    $red=imagecolorallocate($im,255,0,0);  
    //绘制背景颜色  
    imagefill($im,0,0,$blue);  
    //从左上角开始画一条线导图像右下角  
    imageline($im,0,0,$width,$height,$white);  
    //从左下角开始画一条线导图像右上角  
    imageline($im,600,0,0,600,$red);  
    //添加文字  
    imagestring($im,5,250,150,'Hello World!',$c);  
    Header('Content-type:image/png');  
    imagepng($im);  
    imagedestroy($im);
	

	
?>