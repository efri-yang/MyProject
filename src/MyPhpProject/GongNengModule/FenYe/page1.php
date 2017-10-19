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
			$page_banner="<div class='pagebox'>";
			if($pageNum>1){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum-1)."'>上一页</a>";
			}

			if($totalPage > $pageShowFixLen){
				//例如 显示... 23456 ... 总页数一定要大于 5
				
				//当前页大于 3的时候=4  那么就是... 45678
				if($pageNum > $pageOffset+1){
					$page_banner.="...";
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
					$start=$start-($page+$pageOffset-$end);
				}
			}
			for($i=$start;$i<$end;$i++){
				
			}

			if($pageNum <$totalPage){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum+1)."'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$totalPage."'>尾页</a>";
				
			}
			
			$page_banner.="<span>共".$totalPage."</span>";
			
			$page_banner.="</div>";
			echo $page_banner;
		 ?>

		<div class="pagebox">
			<a href="#">首页</a>
			<a href="#"><上一页</a>
			<span>...</span>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#">7</a>
			<span>...</span>
			<a href="#">下一页></a>
			<a href="#">尾页</a>
			<span>共11</span>

			<span>到<input type="text">页<button>确定</button></span>

		</div>

</body>
</html>

