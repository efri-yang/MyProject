<?php 

 
$mysqli=new mysqli("localhost","root","yyh","test");
if($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();	
}
$mysqli->query("set names utf8");



$sql="select * from treenodes";
$result=$mysqli->query($sql);

while($row=$result->fetch_assoc()){
	$strArr[]=$row;
}

// print_r($strArr);

function GetTree($arr,$pid,$step){
    global $tree;
    foreach($arr as $key=>$val) {
        if($val['pid'] == $pid) {
        	$indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$step);
            $flg = str_repeat('└―',$step);
            $val['name'] =$indent. $flg.$val['name'];
            $tree[] = $val;
            GetTree($arr , $val['id'] ,$step+1);
        }
    }
    return $tree;
}
$data=GetTree($strArr,0,0);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	table{
		border:1px solid #999;
		width: 50%;
	}
	table td{
		border:1px solid #999;
	}
</style>

	<?php
		$strTbl="<table>";
		foreach ($data as $key => $value) {
			$strTbl.="<tr>";
			$strTbl.="<td>".$value['id']."</td>";
			$strTbl.="<td>".$value['name']."</td>";
			$strTbl."</tr>";
		}
		$strTbl.="</table>";
		echo $strTbl;
	 ?>
</body>
</html>

