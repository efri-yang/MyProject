<?php
session_start();
$adminId = $_SESSION["aId"];
if (!isset($adminId)) {
    header("Location:adminlogin.php");
}
include("../libs/mysql.func.php");
$options=$_POST["options"];
$id=$_GET["id"];

 $value="";
 foreach($options as $key =>$val){
 	if($key==count($options)-1){
 		$value.="('$val','$id')";
 	}else{
 		$value.="($val,$id),";
 	}
 }
$sql="insert into titem(title,tid) values".$value;
$result=$mysqli->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆页面</title>
    
</head>
<body>
	<div class="container">
		<div class="row">
			<?php
				if($mysqli->affected_rows){
			?>
					<h1>插入成功！</h1>
					<script type="text/javascript">
				    	setTimeout(function(){
				    		history.back();
				    	},2500)
				    </script>
			<?php
				}else{
			?>
					<h1>插入失败！</h1>
				    <script type="text/javascript">
				    	setTimeout(function(){
				    		window.history.back();
				    	},2500)
				    </script>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>