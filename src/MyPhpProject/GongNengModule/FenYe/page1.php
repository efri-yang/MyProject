<?php
	$pageNum=$_REQUEST['p'] ? $_REQUEST['p'] :1;
	$everyPageShowNum=10;
	$pageShowFixLen=5;
	$pageOffset=($pageShowFixLen-1)/2;


	$mysqli=new mysqli("localhost","root","yyh","mokuai");
	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysqli->connect_error);
    	exit();
	}
	$mysqli->query("set names 'utf8'");

	$sql="select * from m_page";
	$result=$mysqli->query($sql);

	$totalPage=ceil($result->num_rows/$everyPageShowNum);
    



	$sql="select * from m_page limit ".($pageNum-1)*$everyPageShowNum.",".$everyPageShowNum;

	$result=$mysqli->query($sql);



	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<table width="50%" border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>名字</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['name'];?></td>
					</tr>

				<?php		
					}
				?>
			</tbody>
		</table>


		<?php 
			$start=1;
			$end=$totalPage;
			$page_banner="<div class='pagination-box'>";
			if($pageNum>1){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='first'>首页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum-1)."' class='prev'>上一页</a>";
			}else{
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='first disabled'>首页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum-1)."' class='prev disabled'>上一页</a>";
			}

			if($totalPage > $pageShowFixLen){
				//例如 显示... 23456 ... 总页数一定要大于 5
				
				//当前页大于 3的时候=4  那么就是... 45678
				if($pageNum > $pageOffset+1){
					$page_banner.="<span>...</span>";
				}
				//3 4 5.....
				if($pageNum > $pageOffset){
					$start=$pageNum-$pageOffset;
					$end=$totalPage > $pageNum+$pageOffset ? $pageNum+$pageOffset :$totalPage;
				}else{
					$start=1;
					$end=$totalPage > $pageShowFixLen ? $pageShowFixLen : $totalPage;
				}

				if(($pageOffset+$pageNum) > $totalPage){

					$start=$start-($pageNum+$pageOffset-$end);
					$end=$totalPage;
				}
			}
			for($i=$start;$i<=$end;$i++){
				if($pageNum==$i){
					$page_banner.="<span class='current'>{$i}</span>";
				}else{
					$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
				}
			}

			if($totalPage >$pageShowFixLen && $totalPage > ($pageNum+$pageOffset)){
				$page_banner.="<span>...</span>";
			}

			if($pageNum <$totalPage){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum+1)."' class='next'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$totalPage."' class='last'>尾页</a>";
			}else{
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum+1)."' class='next disabled'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$totalPage."' class='last disabled'>尾页</a>";
			}
			
			$page_banner.="<span>共".$totalPage."</span>";
			$page_banner.="<form class='pageform' action='page1.php' method='post'>";
			$page_banner.="<span>到 <input type='text' size='2'>页</span><input type='submit' value='确定' />";
			$page_banner.="</form>";
			$page_banner.="</div>";
			echo $page_banner;
		 ?>

		<div class="pagination-box">
			<a href="#" class="first disabled">首页</a>
			<a href="#" class="prev disabled">上一页</a>
			<span>...</span>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#">7</a>
			<span>...</span>
			<a href="#" class="next disabled">下一页</a>
			<a href="#" class="last disabled">尾页</a>
			<span>共11</span>
			<form class="pageform" action="m_page.sql" method="post">
				<span>到 <input type="text" size="2">页</span>
				<input type="submit" value="确定" />
			</form>
		</div>

</body>
</html>


<!-- 
	1、首页，第一页 判断：比较简单如果$page <1 那么首页和尾页就要隐藏或者disable 
	2、最后一页 尾页 判断：如果$page > $totalpage 那么默下一页和尾页就要隐藏或者disabled

	3、判断分页
		$start=1;
		$end=$totalPage; 
		$viewLen=5//假设可见页数5个 ...456789...
		$pageOffset=2 //偏移量   （5-1)/2
		通过start 和 end 以及 偏移量 pageOffset然后进行显示页数(主思想就是这个)
	  3.1、如果总页数 <=5 那么就显示出来 不做任何处理
	  3.2、如果总页数 >5($totalPage)：

			if($page > $pageOffset+1){
				输出	 ...
			}

			if($pageNum > $pageOffset){  3>2
				$start=$pageNum-$pageOffset;
			}

 -->

