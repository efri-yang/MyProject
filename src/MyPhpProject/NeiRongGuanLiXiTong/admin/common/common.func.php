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
		//要对$text $url,$skipTime 进行判断，避免传入不合理的值
		if(!empty($text)){
			echo "$text 参数不能为空！";
		}
	}
?>