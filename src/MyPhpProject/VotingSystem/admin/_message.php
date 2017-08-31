<?php
	$sql="select * from message order by id desc";
	$result=$mysqli->query($sql);

?>
<div class="message-box">
		<?php 
		 if($result->num_rows){
		?>
			<ul>
			<?php
					$num=0;
					while ($row=$result->fetch_assoc()) {
						$num++;
			?>
						<li>
							<span class="num"><?php echo $num; ?></span>
			                <div class="txt"><?php  echo $row["content"]; ?></div>
			                <div class="handle">
								<a href="./messageDelDo.php?id=<?php echo $row["id"]; ?>">删除</a>
			                </div>
					    </li>
			<?php
			}
			?>
			</ul>

		<?php
		}else{
		?>
			asdfsdf
		<?php
		}
		?>
		

</div>

<div style="height: 300px;"></div>