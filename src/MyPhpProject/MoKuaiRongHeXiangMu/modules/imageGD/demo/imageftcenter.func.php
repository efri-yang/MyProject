<?php
	function ImageFTCenter($image, $size, $angle, $font, $text, $extrainfo = array()) {

    // find the size of the image
    $xi = ImageSX($image);
    $yi = ImageSY($image);

    // find the size of the text
    $box = ImageFTBBox($size, $angle, $font, $text, $extrainfo);

    $xr = abs(max($box[2], $box[4]));
    $yr = abs(max($box[5], $box[7]));

    // compute centering
    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi + $yr) / 2);

    return array($x, $y);
}

	function ImageStringCenter($image,$text,$font){
		$width=array(1=>5,6,7,8,9);
		/**
		 * Array ( [1] => 5 [2] => 6 [3] => 7 [4] => 8 )
		 */
		$height=array(1=>6,8,13,15,15);

		$xi=imagesx($image);
		$yi=imagesy($image);

		$xr=$width[$font]*strlen($text);
		$yr=$height[$font];
		$x=intval(($xi-$xr)/2);
		$y=intval(($yi+$yr)/2);
		return array($x,$y);	
	}
?>