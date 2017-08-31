	<div class="header">
		<div class="container">
			<div class="txt">
				欢迎光临！
				<?php
					if(isset($adminId)){
						echo $row["username"];
						echo '<a href="logout.php">退出</a>';	
					}
				?>
			</div>
		</div>
	</div>


