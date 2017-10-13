<?php  
$width = 200;  
$height = 200;  
$canvas_w = $height + 1;  
$canvas_h = $height + 1;  
$im = imagecreatetruecolor($canvas_w,$canvas_h);  
  
$white = imagecolorallocate($im, 255, 255, 255);  
$red = imagecolorallocate($im, 255, 0, 0);  
$green = imagecolorallocate($im, 0, 255, 0);  
$blue = imagecolorallocate($im, 0, 0, 255);  
$mixed = imagecolorallocate($im, 0, 255, 255);  
$line_color = $blue;  
imagefill($im, 0, 0, $white);  
$fontsize = 20;  
$fontfile = "msyh.ttc";  
$text = "string";  
$font_x = 40;  
$font_y = 40;  
  
for($start_x = 0;$start_x <= $canvas_w;$start_x += 20){  
    if($start_x == $font_x){  
        imageline($im,$start_x,0,$start_x,$width,$mixed);  
    }else{  
        imageline($im,$start_x,0,$start_x,$width,$red);  
    }  
}  
  
for($start_y = 0;$start_y <= $canvas_h;$start_y += 20){  
    if($start_y == $font_y){  
        imageline($im,0,$start_y,$height,$start_y,$mixed);  
    }else{  
        imageline($im,0,$start_y,$height,$start_y,$red);  
    }  
}  
  
imagettftext($im ,$fontsize,0,$font_x,$font_y,$green ,$fontfile ,$text);  
$box = imagettfbbox($fontsize,0,$fontfile,$text); 
 
  
$left_bottom = array($box[0],$box[1]);  
$right_bottom = array($box[2],$box[3]);  
$right_top = array($box[4],$box[5]);  
$left_top = array($box[6],$box[7]);  
  
$box_width = max(abs($box[2] - $box[0]),abs($box[4] - $box[6]));  
$box_height = max(abs($box[7] - $box[1]),abs($box[5] - $box[3]));  
  
$abs_y1 = abs($box[1]);  
$abs_y2 = abs($box_height - $abs_y1);  
$left_bottom_x  = $font_x +$box[0];  
$left_bottom_y  = $font_y +$box[1];  
$right_bottom_x = $left_bottom_x + $box_width;  
$right_bottom_y = $left_bottom_y;  
$right_top_x    = $right_bottom_x;  
$right_top_y    = $right_bottom_y-$box_height;  
$left_top_x     = $left_bottom_x;  
$left_top_y     = $right_top_y;  
  
imageline($im,$left_bottom_x,$left_bottom_y,$right_bottom_x,$right_bottom_y,$blue);  
imageline($im,$right_bottom_x,$right_bottom_y,$right_top_x,$right_top_y,$blue);  
imageline($im,$right_top_x,$right_top_y,$left_top_x,$left_top_y,$blue);  
imageline($im,$left_top_x,$left_top_y,$left_bottom_x,$left_bottom_y,$blue);  
 header("Content-type:image/png");
imagejpeg($im);  
imagedestroy($im);  