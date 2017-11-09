<?php
	function resultToArray($result){
		$arr=array();
		if(empty($result)){
			echo "请输入查询结果句柄！";
			return $arr;
		}
		while ($row=$result->fetch_assoc()){
			$arr[]=$row;
		}
		return $arr;
	}


	function handleResult($type,$text,$url,$skipTime=5){
		$str="";
		//要对$text $url,$skipTime 进行判断，避免传入不合理的值
		if(empty($text)){
			echo __FUNCTION__.'函数的参数$text值不能为空！';
			return false;
		}
		
		if($type===1){
			$flagClass="dohand-box-success";
		}else{
			$flagClass="dohand-box-error";
		}
		$str.='<style type="text/css">.dohand-box-success{text-align:center;margin-top:80px}.dohand-box-success h1{text-align:center;font-size:32px;color:green;font-weight:bold}.dohand-box-success .tip-1{text-align:center;padding:15px 0}.dohand-box-success .tip-1 a{text-decoration:underline;color:blue}.dohand-box-error{text-align:center;margin-top:80px}.dohand-box-error h1{text-align:center;font-size:32px;color:red;font-weight:bold}.dohand-box-error .tip-1{text-align:center;padding:15px 0}.dohand-box-error .tip-1 a{text-decoration:underline;color:blue}</style>';
		$str.='<div class="'.$flagClass.'">';
			$str.='<h1>'.$text.'</h1>';
			$str.='<p class="tip-1">页面将在<span id="timecount"></span>秒之后跳转！<a href="'.$url.'">手动点击跳转！</a></p>';
		$str.='</div>';
		echo $str;
		echo "<script type='text/javascript' src='".STATIC_PATH."/admin/static/js/common.js'></script>";
		echo "<script type='text/javascript'>handleResultLocation('$url',$skipTime);</script>";
	}
?>



	
	
	

