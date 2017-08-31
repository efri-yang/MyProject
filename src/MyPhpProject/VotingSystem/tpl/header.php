<?php

/**
 * $_SERVER['PHP_SELF'] 表示当前 php 文件相对于网站根目录的位置地址
 * http://www.5idev.com/php/ ：/php/index.php
http://www.5idev.com/php/index.php ：/php/index.php
http://www.5idev.com/php/index.php?test=foo ：/php/index.php
http://www.5idev.com/php/index.php/test/foo ：/php/index.php/test/foo

$_SERVER['PHP_SELF']=/MyProject/src/MyPhpProject/VotingSystem/index.php

strrpos:在字符串中最后一次出现的位置：
strrpos($_SERVER['PHP_SELF'],'/')=40
 */

function php_self(){

    $php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

    return $php_self;

}

?>

<div class="header">
		<div class="container">
			<div class="txt">
				欢迎光临！
				<?php
					if(isset($userId)){
						echo '<a href="./admin/userset.php">'.$row["username"]."</a>";
						echo '<a href="logout.php">退出</a>';	
					}
				?>
			</div>
			<?php
				if(!isset($userId)){
			?>
			
					<a href="login.php" class="login-rigster">登陆</a>
					<a href="register.php"  class="login-rigster">注册</a>
			<?php
				}
			?>
			
		</div>
	</div>

	<div class="container">
		<ul class="nav-box clearfix">
			<li <?php echo (php_self()=="index.php") ? "class='active'" :"";?>><a href="index.php">首页</a></li>
			<li <?php echo (php_self()=="votelist.php") ? "class='active'" :"";?>><a href="votelist.php">投票主题</a></li>
			<li <?php echo (php_self()=="messageform.php") ? "class='active'" :"";?>><a href="messageform.php">留言板</a></li>
		</ul>
	</div>