<?php  
    
    include("imageftcenter.func.php");


    $image=imagecreatefromjpeg("../images/01.jpg");    
    $size=40;
    $angle=0;
    $fontfile='msyh.ttc';
    $text="杨艺辉520!";

    list($x,$y)=ImageFTCenter($image,$size,$angel,$fontfile,$text);
    
    $yellow = imagecolorallocatealpha($image, 255, 255, 0, 30);
    $red    = imagecolorallocatealpha($image, 255, 0, 0, 30);
    $blue   = imagecolorallocatealpha($image, 0, 0, 255, 30);
     

    imagefttext($image, $size, $angle, $x, $y, $yellow, $fontfile,$text);
    Header('Content-type:image/jpeg');  
    imagepng($image);  
    imagedestroy($image);

?>