<?php
	session_start();
	date_default_timezone_set('Asia/Shanghai');
	include("../../config.inc.php");
    include($dirName."/common/mysqli.php");
	include("file.class.php");

	$files=getFiles();  

  print_r($files);
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
						$keyCount=1;
						foreach ($files as $key => $value) {
							echo $value;
					?>
							<tr>
								<td><?php echo $keyCount; ?></td>
			                    <td><?php echo substr($value,strripos($value,'/')+1); ?></td>
			                    <td><span class="img-type type-file"></span></td>
			                    <td><?php echo getSize($value); ?></td>
			                    <td><span class="img-wr <?php echo is_readable($value) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><span class="img-wr <?php echo is_writable($value) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><span class="img-wr <?php echo is_executable($value) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><?php echo date('Y-m-d H:i:s',filectime($value)); ?></td>
			                    <td><?php echo date('Y-m-d H:i:s',filemtime($value)); ?></td>
			                    <td><?php echo date('Y-m-d H:i:s',fileatime($value)); ?></td>
			                    <td>
			                    	<?php 

			                    		
			                    		if(getFileType($value)=="image"){
			                    	?>
			                    			<a href="javascript:void(0)" data-url="<?php echo $value; ?>" class="img-handle img-see"></a>
			                    			<a href="index.php?act=edit&filetype=image&path=<?php echo $path; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}elseif(getFileType($file)=="dir"){
			                    	?>
											<a href="index.php?act=showdir&path=<?php echo $path; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}else{
			                    	?>
			                    			<a href="index.php?act=edit&filetype=image&path=<?php echo $path; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}
			                    	 ?>
			                    	

			                    	


			                    	<a href="" class="img-handle img-copy"></a>


			                    	<a href="" class="img-handle img-cut"></a>

			                    	<a href="" class="img-handle img-delete"></a>

			                    	<a href="" class="img-handle img-download"></a>
			                    	
			                   
			                    </td>
							</tr>
					<?php
							$keyCount++;		
						}
					?>
					
				</tbody>
				</table>
			</div>	

	<?php		
		}else{

		}
	?>

		
	
</body>
</html>