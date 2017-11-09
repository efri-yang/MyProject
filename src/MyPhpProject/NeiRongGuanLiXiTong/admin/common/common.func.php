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


	function handleResultSuccess($text,$url,$skipTime=5){
		$str="";
		//要对$text $url,$skipTime 进行判断，避免传入不合理的值
		if(!empty($text)){
			echo "handleResultSuccess函数的参数$text值不能为空！";
			return false;
		}
		$str.='<div class="dohand-box-success">';
			$str.='<h1>'.$text.'</h1>';
			$str.='<p>页面将在<span id="timecount"></span>秒之后跳转！<a href="'.$url.'">手动点击跳转！</a></p>';
		$str.='</div>';
		$str.=




	}
?>