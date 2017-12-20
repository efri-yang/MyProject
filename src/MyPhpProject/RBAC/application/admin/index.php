<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");  
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

        $sql="select user_role.rid,perssion.id,perssion.pid,perssion.name,perssion.fname,perssion.status,perssion.aside from user_role inner join perssion_role on user_role.rid=perssion_role.rid inner join perssion on perssion_role.pid=perssion.id   where uid='$userId' and perssion.aside=1";

        $result=$mysqli->query($sql);
        while ($row=$result->fetch_assoc()) {
            $resArr[]=$row;
        }

        $tree=new Tree();
        $data=$tree->hTree($resArr);
        function dispalyAside($data,$str="",$step=0){
            $str.="<ul>";
            $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
            foreach ($data as $k => $v) {
                $str.="<li><a href='index.php?class=".$v["fname"]."'>".$emptyholer.$v["name"]."</a>";
                if(count($v["sub"])){
                    $str=dispalyAside($v["sub"],$str,$step+1);
                }
                $str.="</li>";
            }
            $str.="</ul>";
            return $str;
        }
       
    ?>
	  <div class="com-layout-container">
			<div class="com-layout-aside">
                <div class="aside-nav-list">
				    <?php echo  dispalyAside($data)?>
			    </div>
            </div>
			<div class="com-layout-content">
				<div class="bread-nav-box">
					<p class="tit">文章列表</p>
				</div>
			</div>
	  </div>
</body>
</html>