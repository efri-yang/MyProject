<?php
















header("Content-type:text/html;charset=utf-8");
   //catename  ���������   cateorder   ����   createtime ������ʱ��
   require("../conn/conn.php");
   
   //��ȡ���еķ���
	   
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
	    $result=getLists($pid);//��ȡ���еķ���
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
    krsort($category); //����,�ﵽ�Ӹ��ൽ�����Ч��
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