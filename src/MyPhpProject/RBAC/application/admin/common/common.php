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
		if($time===0 || !!$time){
			$str.='<p class="txt-1">页面将在<span id="timecount">'.$time.'</span>秒之后跳转！<a href="'.$url.'">手动点击跳转！</a></p>';
		}
			$str.='</div>';

		echo $str;
		if($time===0 || !!$time){
			echo "<script type='text/javascript'>handleResultLocation('$url','timecount','$time');</script>";
		}
		
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


	function permissionSave($uid){
		 global $mysqli;
		$sql01="select perssion.id,perssion.pid,perssion.name,perssion.url,perssion.is_last from user_role inner join perssion_role on user_role.rid=perssion_role.rid inner join perssion on perssion_role.pid=perssion.id where user_role.uid=$uid";
		$result=$mysqli->query($sql01);
		while ($row=$result->fetch_assoc()) {
			$resData[]=$row;
		}

		return $resData;
	}

	function checkPermission($uid,$urlFileName){
		$hasPermission=false;
		$resData=permissionSave($uid);
		foreach ($resData as $key => $v) {
			if($v["url"]==$urlFileName){
				$hasPermission=true;
				break;
			}else{
				if($key==(count($resData)-1)){
					resultDrawGuide(0,"您没有权限,请联系管理员！","",false);
					exit();
				}
			}
		}
		return $hasPermission;
	}

	
?>