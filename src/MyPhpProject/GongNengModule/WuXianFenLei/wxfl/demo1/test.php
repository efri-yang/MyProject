<?php
























































  header("Content-type:text/html;charset=utf-8");

  include_once("conn/conn.php");
  
  function getSons($categorys,$catId=0){
	 $sons=array();
	 foreach($categorys as $item){
		 if($item["parentId"]==$catId){
		   $sons[]=$item;	 
		 }
	 } 
	 return $sons; 
  }
  
  function getSubs($categorys,$catId=1,$level=1){
	  $subs=array(); 
	  foreach($categorys as $item){
		  if($item["parentId"]==$catId){
			   $item["level"]=$level;
			   $subs[]=$item;
			   $subs=array_merge($subs,getSubs($categorys,$item["categoryId"],$level+1));  
		  }  
	  }
	  return  $subs;
  }
  
  function getParents($categorys,$catId){
	  $tree=array();
	  foreach($categorys as $item){
		   if($item["categoryId"]==$catId){
			   if($item["parentId"] >=0){
				   $tree=array_merge($tree,getParents($categorys,$item["parentId"]));
				   $tree[]=$item;
				   break;   
			   }   
		   } 
	  } 
	  return $tree; 
  }
  
  /*
    $catId=1的时候，遍历所有的category 如果有分类是为1的话，将对应的项加入到subs[],里面; 
	$subs[1]=
  */
  
  
  $sql="select * from category";
  $result=mysql_query($sql,$conn);
  while($row=mysql_fetch_assoc($result)){
	  $arr[]=$row;  
  }
  $Sons= getParents($arr,$catId=17);
  print_r($Sons);
  
 /* //获取某分类的直接子分类  
 function getSons($categorys,$catId=0){
     $sons=array();
	 foreach($categorys as $item){
	    if($item["parentId"]==$catId){
		    $sons[]=$item;	
		}	 
	 }
	 return $sons;	 
 }
 
 
 function getSubs($categorys,$cateId=0,$level=1){
	 $subs=array();
	 foreach($categorys as $item){
	    if($item["parentId"]==$cateId){
		   $item["level"]=$level;
		   $subs[]=$item;
		   $subs=array_merge($subs,getSubs($categorys,$item["categoryId"],$level+1));
		}	 
	 }
	 return $subs;
 }
 
 function getParents($categorys,$catId){
     $tree=array();
	 foreach($categorys as $item){
	   if($item["categoryId"]==$catId){
	       if($item["parentId"] > 0){
			   $tree=array_merge($tree,getParents($categorys,$item["parentId"]));   
		   }
	   }	 
	 }
	 	 
 }*/
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
?>