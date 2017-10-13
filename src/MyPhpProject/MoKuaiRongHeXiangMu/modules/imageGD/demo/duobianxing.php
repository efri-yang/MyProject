<?php
	$image = imagecreatetruecolor(400, 300);
	

	$col_poly = imagecolorallocate($image, 255, 255, 255);

	imagepolygon($image,
             array (
                    0, 0,
                    100, 200,
                    300, 200,
                    250,150
             ),
             4,
             $col_poly);
	header("Content-type: image/png");
imagepng($image);

?>