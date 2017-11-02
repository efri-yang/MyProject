<?php
	session_start();

	
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>
	

	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/page-column.css">
</head>
<body>
	<?php include(ROOT_PATH.'/admin/template/header_top.php') ?>


	<?php 
		$sql="select * from mc_columns";
		$result=$mysqli->query($sql);
		$results=resultToArray($result);
		
		if(empty($results)){
	?>
			<div class="columns-nodata">
				<p class="txt-1">目前没有栏目哦！您可以新建栏目在去发布信息哦！</p>
				<p><a href="./addColumns.php" class="btn btn-success btn-large">新建栏目</a></p>
			</div>

	<?php		
		}else{

			
			$data=ClassTree::hTree($results);
			$data=ClassTree::sort($data,'sortrank');
			
			function disPlayList($arr,$str="",$step=0){
				
				foreach($arr as $key=>$value){
					$flg = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$step);
					$str.="<tr>";
					$str.="<td class='first'>".$flg."<img src='./images/".($value['islast']==1 ? "txt.gif" :"dir.gif")."'/></td>";
					$str.="<td>".$value['sortrank']."</td>";
					$str.="<td>".$value['classid']."</td>";
					$str.="<td class='align-l'>".$flg.$value['classname']."</td>";
					$str.="<td class='handle'><a href='#'>编辑</a><a href='#'>删除</a></td>";
					$str.="<tr>";
					if(!empty($value['sub'])){
						$str=disPlayList($value['sub'],$str,$step+1);
					}
				}
				return $str;

			}

			

		?>
		<div class="container columns-h">
			<div class="soma-hd clearfix">
				<a href="./addColumns.php" class="btn btn-success btn-large fr">添加栏目</a>
			</div>
			<table class="columns-h-tbl">
				<thead>
					<tr>
						<th width="10%">类型</th>
						<th width="10%">排序值</th>
						<th>ID</th>
						<th>栏目名</th>
						<th>栏目管理</th>
					</tr>
				</thead>	
				<tbody>
					<?php
						echo disPlayList($data);
					?>
				</tbody>
			</table>
		</div>

	<?php  
		}
	?>


	
	





	
</body>
</html>