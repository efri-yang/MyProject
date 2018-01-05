<?php
	spl_autoload_register(function ($class_name) {
    	require_once ROOT_PATH."/application/admin/class/".$class_name . '.class.php';
	});


	function resultDrawGuide($type,$title,$url,$time=3){
		if($type===1){
			$flagClass="success";
		}else{
			$flagClass="error";
		}
		$str='<div class="com-result-tip '.$flagClass.'">';
			$str.='<p class="tit">'.$title.'</p>';
			$str.='<p class="txt-1">页面将在<span id="timecount">'.$time.'</span>秒之后跳转！<a href="'.$url.'">手动点击跳转！</a></p>';
			$str.='</div>';

		echo $str;
		echo "<script type='text/javascript'>handleResultLocation('$url','timecount','$time');</script>";
	}

	function sessionDrawGuide($id,$url){
		if(empty($id) || !isset($id)){
			header('Location:'.$url);
		}
	}


	function getUrlFileName(){
		$url = $_SERVER['PHP_SELF'];
    	$filename= substr( $url , strrpos($url,'/')+1);
    	return $filename;
	}

	
?>