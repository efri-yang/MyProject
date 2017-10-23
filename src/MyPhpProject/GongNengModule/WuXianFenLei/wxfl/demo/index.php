<?php
















header("Content-type:text/html;charset=utf-8");
   //catename  分类的姓名   cateorder   排序   createtime 创建的时间
   require("../conn/conn.php");
   
   //获取所有的分类
	   
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
  
  
 function getCategory($cid, &$category = array()) {
    $sql = 'SELECT * FROM deepcate WHERE id='.$cid.' LIMIT 1';
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    if ( $row ) {
        $category[] = $row;
        getCategory($row['pid'], $category);
    }
    krsort($category); //逆序,达到从父类到子类的效果
    return $category;
}
  
function displayCategory($cid) {
    $result = getCategory($cid);
    $str = "";
    foreach ( $result as $item ) {
        $str .= '<a href="'.$item['id'].'">'.$item['catename'].'</a>>';
    }
    return substr($str, 0, strlen($str) - 1);
}
  
echo displayLists(0, 3);
  
echo displayCategory(5);
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
?>