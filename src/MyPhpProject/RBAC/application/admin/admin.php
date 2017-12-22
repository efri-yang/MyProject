<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $action=$_GET["action"];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台首页</title>
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/jquery/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">

    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/common.js"></script>
</head>
<body>
    <?php
        include("./include/header.php");
    ?>
	  <div class="com-layout-container">
			<div class="com-layout-aside">
                <div class="aside-nav-list">
				    <?php
                        include("./include/aside.php");
                        echo  dispalyAside($asideData,$action); 
                    ?>
			    </div>
            </div>
			<div class="com-layout-content">
				<div class="bread-nav-box">
					<p class="tit">管理首页</p>
				</div>
                <style type="text/css">
                    .home-intro{
                        padding:20px;
                        font-size:16px;  
                    }
                    .home-intro p{
                        text-indent: 2em;
                    }
                </style>
                <div class="home-intro">
                    <p>欢迎来到管理首页</p>
                    <p>babababababababbaba.............................................</p>
                </div>
			</div>
	  </div>
</body>
</html>