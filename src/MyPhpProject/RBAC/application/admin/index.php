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
        print_r($data);
        // 
        /**
         * Array(
            [2] => Array(
            [rid] => 1
            [id] => 2
            [pid] => 0
            [name] => 文章管理
            [fname] => articleIndex
            [status] => 0
            [aside] => 1
            [sub] => Array(
                    [3] => Array(
                            [rid] => 1
                            [id] => 3
                            [pid] => 2
                            [name] => 文章列表
                            [fname] => articleList
                            [status] => 0
                            [aside] => 1
                            [sub] => Array(
                                    [22] => Array(
                                            [rid] => 1
                                            [id] => 22
                                            [pid] => 3
                                            [name] => 国内文章
                                            [fname] => gnwz
                                            [status] => 0
                                            [aside] => 1
                                            [sub] => Array()
                                        )
                                    [23] => Array(
                                            [rid] => 1
                                            [id] => 23
                                            [pid] => 3
                                            [name] => 国外文章
                                            [fname] => gwwz
                                            [status] => 0
                                            [aside] => 1
                                            [sub] => Array()
                                        )
                                )
                        )

                    [4] => Array(
                            [rid] => 1
                            [id] => 4
                            [pid] => 2
                            [name] => 添加文章
                            [fname] => articleAdd
                            [status] => 0
                            [aside] => 1
                            [sub] => Array()
                        )
                )
            )
        )
      
        
        function dispalyAside($data,$className='',$pid,$step=0,$str=""){
            $str.="<ul>";
            $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
            foreach ($data as $k => $v) {
                $str.="<li><a> </a>";
                if($subLen){
                    $str="<ul><li><a> </a>"
                         $str.="<ul>";
                        $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
                        $str.="<li> <a></a>";
                                (
                                    $str.="<ul><li><a> </a><ul>";
                                    $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
                                    $str.="<li> <a></a>";
                                     $str.="</li>";
                                       $str.="</ul>";
                                     return $str; <ul><li><a></a><ul><li><a></a></li></ul>
                                )
                          $str.="</li>";
                           $str.="</ul>"
                         return $str;;<ul><li><a></a><ul><li><a></a></li></ul></li></ul>
                }
                $str.="</li>";
            }
            $str.="</ul>";
            return $str;
        }

         */
       
      
        function dispalyAside($data,$className='',$pid,$step=0,$str=""){
            $str.="<ul>";
            $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
            foreach ($data as $k => $v) {
                $subLen=count($v["sub"]);
                $active=($v["fname"]==$className) ? "active" :"";
                $current=($v['pid']==$pid) ? 'current' :"";
                $str.="<li class='".$active." ".$current."'><a href='index.php?class=".$v["fname"]."'>".$emptyholer.$v["name"]."</a>";
                if($subLen){
                    $str=dispalyAside($v["sub"],$v['id'],$className,$step+1,$str);
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
				    <?php echo  dispalyAside($data,"articleList",0)?>
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