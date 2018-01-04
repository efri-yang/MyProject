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
	<title>管理后台——用户信息列表</title>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">





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
				<div class="bread-nav-box clearfix">
					<p class="tit fl">用户列表</p>
					<a href="user-add.html" class="btn btn-success fr mt15">添加用户</a>
				</div>
				<div class="pl20 pr20 pt20">
					<div class="bg-fff">
						<table class="user-list-tbl">
							<thead>
								<tr>
									<th>名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql="select * from user where id !='$userId'";
									$res=$mysqli->query($sql);
									while ($row=$res->fetch_assoc()) {
										$resData[]=$row;
									}
									foreach ($resData as $key => $value) {
								?>
								<tr>
									<td><?php echo $value['username'] ?></td>
									<td>
										<a href='<?php echo "index.php?action=userEdit&id=".$userId;?>' class="btn btn-info mr10">修改</a>
										<a href="loginOut.php" class="btn btn-danger">删除</a>
									</td>
								</tr>
								<?php		
									}
								?>
							</tbody>
						</table>

						<!-- 
							定义 显示页数 $viewNum=5
							判断 总页数
								如果 小于 5 那么全部显示

						 -->
						<?php 
			$start=1;
			$end=$totalPage;
			$page_banner="<div class='com-pagination-box'>";
			if($pageNum>1){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='first'>首页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum-1)."' class='prev'>上一页</a>";
			}else{
				$page_banner.="<a href='javascript:void(0)' class='first disabled'>首页</a>";
				$page_banner.="<a href='javascript:void(0)' class='prev disabled'>上一页</a>";
			}

			if($totalPage > $pageShowFixLen){
				//例如 显示... 23456 ... 总页数一定要大于 5
				
				//当前页大于 3的时候=4  那么就是... 45678
				if($pageNum > $pageOffset+1){
					$page_banner.="<span>...</span>";
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

					$start=$start-($pageNum+$pageOffset-$end);
					$end=$totalPage;
				}
			}
			for($i=$start;$i<=$end;$i++){
				if($pageNum==$i){
					$page_banner.="<span class='current'>{$i}</span>";
				}else{
					$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
				}
			}

			if($totalPage >$pageShowFixLen && $totalPage > ($pageNum+$pageOffset)){
				$page_banner.="<span>...</span>";
			}

			if($pageNum <$totalPage){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum+1)."' class='next'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$totalPage."' class='last'>尾页</a>";
			}else{
				$page_banner.="<a href='javascript:void(0)' class='next disabled'>下一页</a>";
				$page_banner.="<a href='javascript:void(0)' class='last disabled'>尾页</a>";
			}
			
			$page_banner.="<span>共".$totalPage."</span>";
			$page_banner.="<form class='pageform' action='page1.php' method='post'>";
			$page_banner.="<span>到 <input type='text' size='2'>页</span><input type='submit' value='确定' />";
			$page_banner.="</form>";
			$page_banner.="</div>";
			echo $page_banner;
		 ?>
					</div>
				</div>
			</div>

	  </div>
</body>
</html>