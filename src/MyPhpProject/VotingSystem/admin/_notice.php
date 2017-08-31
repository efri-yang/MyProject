<?php
	$sql="select * from notice order by id desc";
	$result=$mysqli->query($sql);
?>
<div class="notice-module">
	 <div class="tit-type-2">
		 <span class="tit">公告列表</span>
		 <a href="index.php?paget=addnotice" class="btn btn-success fr">添加公告</a>
	 </div>

	<?php 
		 if($result->num_rows){
	?>
			<ul class="notice-list">
				<?php
					$num=0;
					while ($row=$result->fetch_assoc()) {
						$num++;
				?>
					<li>
				    	<span class="num"><?php echo $num; ?></span>
				    	<a href="#"><?php echo $row["title"]; ?></a>
						<span class="hand">
							<a href="index.php?paget=addnotice&id=<?php echo $row['id']; ?>">修改</a>
							<a href="notice_del.php?id=<?php echo $row['id']; ?>">删除</a>
						</span>
				    </li>
				<?php
					}
				?>
			</ul>
	<?php
		 }else{
	?>
			<div class="nodata-box">暂无数据</div>	
	<?php	 	
		 }
	?>
</div>