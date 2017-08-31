<?php
	$sql="select * from theme order by id desc";
	$result=$mysqli->query($sql);

?>
<div class="theme-module">
	 <div class="tit-type-2">
		 <span class="tit">投票主题列表</span>
		 <a href="index.php?paget=theme-titleform" class="btn btn-success fr">添加主题</a>
	 </div>
	<?php
		if($result->num_rows){
	?>
			<ul class="theme-list">
			<?php
				$tcount=0;
				while ($row=$result->fetch_array()) {
					$tcount++;
			?>
					<li>
				    	<span class="num"><?php echo $tcount;?></span>
				    	<span><?php echo $row["title"];?></span>
						<span class="hand">
							<a href="index.php?paget=theme-titleform&id=<?php echo $row['id']; ?>">修改</a>
							<a href="./theme-titleDelDo.php?id=<?php echo $row['id']; ?>">删除</a>
							<a href="index.php?paget=theme-itemform&id=<?php echo $row['id']; ?>">添加选项</a>
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