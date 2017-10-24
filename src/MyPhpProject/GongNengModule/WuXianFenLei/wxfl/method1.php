<?php
	 
$mysqli=new mysqli("localhost","root","yyh","test");
if($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();	
}
$mysqli->query("set names utf8");


function getChildId($parentid=0){
    global $mysqli;
    $sql="select * from treenodes where pid='{$parentid}'";
    $result=$mysqli->query($sql);
    $results=array();
    while($child= $result->fetch_assoc()){
        $results[]=$child;
    }
    return $results;
}

function getTree($parentid=0,$treeArray=array()){
    $child = getChildId($parentid);
    //返回的是形参输入的父id下面的子分类组，默认为一个包含国家的组。
    foreach($child as $baby){
    	//$baby此时为一个一个的国家
        $treeArray[]=$baby;
        //将默认传入的一个空数组装入子分类的数据，首先转入的为地球。　
        $treeArray = getTree($baby['id'],$treeArray);

        
        //函数回调，形成一个循环。当$child的值为0时，即父id下面没有子分类时。跳过foreach语句，直接执行下一句  
    }
    return $treeArray;
    //return装着子分类的数组，返回给函数，
}

$data1=getTree();

print_r($data1);


?>