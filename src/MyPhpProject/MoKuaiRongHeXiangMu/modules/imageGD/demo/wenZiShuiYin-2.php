<?php  
    
    include("imageftcenter.func.php");


    $image=imagecreatefromjpeg("../images/01.jpg");
   



    
    $w=200;
    $h=100;
    
    $font="./msyh.ttc";

    $stamp=imagecreatetruecolor($w,$h);
    imagefilledrectangle($stamp,0,0,$w-1,$h-1,0xFFFFFF);

    $textColor=0x000000;

    imagestring($stamp,4, 10, 10,"第一行第一行！",$textColor);
    imagestring($stamp,4,10,28,"第二行第二行！",$textColor);
    imagestring($stamp,4,10,46,"第三行第三行！",$textColor);

    $margin=['right'=>10,'bottom'=>10];
    $opacity=50;

    imagecopymerge($image, $stamp,imagesx($image)-imagesx($stamp)-$margin['right'],imagesy($image)-imagesy($stamp)-$margin['bottom'], 0, 0, imagesx($stamp),imagesy($stamp), $opacity);




    
    Header('Content-type:image/jpeg');  
    imagepng($image);  
    imagedestroy($image);
    imagedestroy($image);

?>