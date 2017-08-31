<?php
session_start();
$adminId = $_SESSION["aId"];
if (!isset($adminId)) {
    header("Location:adminlogin.php");
}
include("../libs/mysql.func.php");
$id=$_GET["id"];
if(isset($id)){
	$sql="delete from titem where id='$id'";
    $result=$mysqli->query($sql);
    if($mysqli->affected_rows){
    	echo true;
    }else{
    	echo false;
    }
}

?>