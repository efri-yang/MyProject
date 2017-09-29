<?php
	session_start();
	include("../../config.inc.php");
    include($dirName."/common/mysqli.php");
	include("file.class.php");

	$files=getFiles();  


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<script type="text/javascript" src="../../staitc/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="../../staitc/js/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../staitc/js/bootstrap/css/bootstrap.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/base.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		include("../../template/header_top.php");
		if(count($files)){
	?>
			<div class="filemanager-tbl-wrap">
				<table class="filemanager-tbl">
				<thead>
					<tr>
						<th>编号</th>
						<th>名称</th>
						<th>类型</th>
						<th>大小</th>
						<th>可读</th>
						<th>可写</th>
						<th>可执行</th>
						<th>创建时间</th>
						<th>修改时间</th>
						<th>访问时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
					?>
					<tr>
						<td>1</td>
	                    <td>2.jpg</td>
	                    <td><span class="img-type"></span></td>
	                    <td>158.52KB</td>
	                    <td><span class="img-wr wr-y"></span></td>
	                    <td><span class="img-wr wr-n"></span></td>
	                    <td><span class="img-wr wr-n"></span></td>
	                    <td>2017-09-21 15:14:34 </td>
	                    <td>2017-09-21 15:14:34</td>
	                    <td>2017-09-21 15:14:34</td>
	                    <td>
	                    	<a href="" class="img-handle img-see"></a>

	                    	<a href="" class="img-handle img-rename"></a>


	                    	<a href="" class="img-handle img-copy"></a>


	                    	<a href="" class="img-handle img-cut"></a>

	                    	<a href="" class="img-handle img-delete"></a>

	                    	<a href="" class="img-handle img-download"></a>
	                    	
	                   
	                    </td>
					</tr>
				</tbody>
				</table>
			</div>	

	<?php		
		}else{

		}
	?>

		
	
</body>
</html>