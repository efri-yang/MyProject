<?php
	session_start();
	if($_REQUEST["type"]=="ajax"){
		if($_REQUEST["yzm"]==$_SESSION["authcode"]){
			echo json_encode(array("valid"=>true));
		}else{
			echo json_encode(array("valid"=>false));
		}
	}else{
	    //填充底色
		$image=imagecreatetruecolor (100,34);
		$bgcolor=imagecolorallocate($image,255,255,255);
		imagefill($image,0,0,$bgcolor);

		//填充文字
		$captch_code;
		$fontsize=6;
		$codeStr='12345678';
		for($i=0;$i<4;$i++){
			$fontcontent=substr($codeStr,rand(0,strlen($codeStr)-1),1);
			$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));

			
			$captch_code.=$fontcontent;
			$x=($i*100/4)+rand(5,10);
			$y=rand(5,10);
			imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor); 

		}
		$_SESSION["authcode"]=$captch_code;
		
		//添加点点来点缀
		
		for($i=0;$i<200;$i++){
		  $pointcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
		  imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
	    }

	    //添加线来点缀
	    for($i=0;$i<3;$i++){
		   $linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));   
	       imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
	   }
	   	header('Content-type: image/jpeg');
	    ob_clean();
		imagepng($image);
		imagedestroy($image);

	}


?>