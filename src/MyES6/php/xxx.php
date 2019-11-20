<?php 
header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');


$id=@$_POST["id"];
$rand=mt_rand(0,1);

for($i=0;$i<100000000;$i++){
	$a=1;
}


if($rand==0){
	$arr["status"]=0;
	$arr["type"]=1;
	$arr["msg"]="请输入正确验证码";
}else{
	$arr["type"]=2;
	$arr["status"]=1;	
}
echo json_encode($arr);
?>