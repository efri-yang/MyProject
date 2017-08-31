
	<div class="container">
		<ul class="nav-box clearfix">
			<li <?php echo ($_REQUEST["paget"]=="notice") ? "class='active'" :"";?>><a href="index.php?paget=notice">公告管理</a></li>
			<li <?php echo ($_REQUEST["paget"]=="theme") ? "class='active'" :"";?>><a href="index.php?paget=theme">投票主题</a></li>
			<li <?php echo ($_REQUEST["paget"]=="message") ? "class='active'" :"";?>><a href="index.php?paget=message">留言管理</a></li>
		</ul>
	</div>