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


	function getUserInfoData($uid){
		global $mysqli;
		$sql01="select user.id as userid, user.username,avatar,user_role.rid,role.pid,group_concat(perssion_role.pid) as perId,group_concat(perssion.url) as url from user inner join user_role on user.id=user_role.uid inner join role on role.id=user_role.rid inner join perssion_role on perssion_role.rid=user_role.rid inner join perssion on perssion.id=perssion_role.pid   where user.id='$uid' group by(userid)";
		$result=$mysqli->query($sql01);
		while ($row=$result->fetch_assoc()) {
			$resData[]=$row;
		}

		$_SESSION["perssion"]=explode(",",$userInfoData["url"]);

		return $resData;
	}

	function checkPermission($urlFileName){
		$perssionArr=$_SESSION["perssion"];
		
		foreach ($perssionArr as $key => $value) {
			if(strtolower($value) !=$urlFileName && ((count($perssionArr)-1)==$key)){
					resultDrawGuide(0,"您没有权限","",false);
					exit();
			}else{
				break;
			}
		}
	}

	
?>