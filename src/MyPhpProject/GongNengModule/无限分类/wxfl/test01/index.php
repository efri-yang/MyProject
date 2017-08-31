<?php
   header("Content-type:text/html;charset=utf-8");
    include("../conn/conn.php");
	
	 function getLists($pid=0,&$lists=array(),$deep=1){
	    $sql="select * from deepcate where pid=".$pid;
		$res=mysql_query($sql);
		while($row=mysql_fetch_assoc($res)){
		   $row["catename"]=str_repeat("&nbsp;&nbsp;&nbsp;",$deep)."|---".$row["catename"];
		   $lists[]=$row;
		   getLists($row["id"],$lists,++$deep);
		   --$deep; 	
		}	
		return $lists;
	}
	
	
	function displayLists($pid=0,$selectid=1){
	    $result=getLists($pid);//获取所有的分类
		$str="<select>";
		foreach($result as $item){
		    $selected="";
			if($selectid==$item["id"]){
			   $selected="selected";	
			}	
			$str.='<option '.$selected. ' >'.$item["catename"]."</option>";
			
		} 
		return $str.="</select>";
  }
  function getParents($categorys,$catid){
	  $sql="select * from deepcate where id=".$catid;
	  $res=mysql_query($sql);
  }
  
  function  displayList2($categorys,$catid){
	  $sql="select * from  deepcate where pid=".$pid;
	  $res=mysql_query($sql);
	  
  }
  
  echo displayLists(0,3);



















  
  
  
  
  
  
?>