<?php
	$mysqli= new mysqli('localhost', 'root', 'yyh', 'concms');
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	$mysqli->query("set names utf8");
	// $mysqli->query("set name utf8");

	function likecate($path='') {
	 global $mysqli;
	  $sql = "select id,catename,path,concat(path,',',id) as fullpath from tp_likecate order by fullpath asc";
	  $res =$mysqli->query($sql);
	  $result = array();
	  while($row=$res->fetch_assoc()) {
	    $deep = count(explode(',', trim($row['fullpath'], ','))); // explode字符串转换为数组 implode数组转换为字符串
	    $row['catename'] = @str_repeat('  ', $deep).'|--'.$row['catename'];
	    $result[] = $row;
	  }
	  return $result;
	}

$res = likecate();

print_r($res);
 
echo "<select name='cate'>";
foreach($res as $key=>$val) {
  echo "<option>{$val['catename']}</option>";
}
echo "</select>";
echo "<br />";


function getPathCate($cateid) {
	global $mysqli;
  $sql = "select *,concat(path, ',',id) fullpath from tp_likecate where id = $cateid";
  $res = $mysqli->query($sql);
  $row = $res->fetch_assoc();
  $ids = $row['fullpath'];
  print_r($ids);
  $sql = "select * from tp_likecate where id in($ids) order by id asc";
  $res = $mysqli->query($sql);
  $result = array();
  while($row =$res->fetch_assoc()) {
    $result[] = $row;
  }
  return $result;
}

print_r(getPathCate(4));


// 加上了链接的参数
function displayCatePath($cateid,$link='cate.php?cid=') { // 也可以组装
  $res = getPathCate($cateid);
  $str = '';
  foreach($res as $k=>$v) {
    $str.= "<a href='{$link}{$v['id']}'>{$v['catename']}</a> > ";
  }
  return $str;
}
// echo displayCatePath(4);



?>