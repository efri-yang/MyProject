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

?>