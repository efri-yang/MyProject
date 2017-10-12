<?php
	
	session_start();

	include("../../Path.php");
	include("../../common/session.php");
	include("../../common/mysqli.php");
	date_default_timezone_set('Asia/Shanghai');
	include("file.class.php");
	$path=(!!$_REQUEST['path'] ? $_REQUEST['path'] : "./files");
	$currFileName=$_REQUEST['name'];
	$act=$_REQUEST['act'];

	$filesName=getFiles($path); 

	if($currFileName){
		$currFile=$path."/".$currFileName;
	}
	
	



  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<?php include("../../template/scriptstyle.php"); ?>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
	
		include("../../template/header_top.php");
		include("../../template/nav.php");

		if(count($filesName)){
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
						if($act=="download"){
							dl_file($currFile);
						} 
						$keyCount=1;
						foreach ($filesName as $key => $value) {
							$file=$path."/".$value;
					?>
							<tr>
								<td><?php echo $keyCount; ?></td>
			                    <td><?php echo $value; ?></td>
			                    <td><span class="img-type <?php echo getFileType($file)=='dir' ? 'type-dir' :'type-file' ?>"></span></td>
			                    <td><?php echo getSize($file); ?></td>
			                    <td><span class="img-wr <?php echo is_readable($file) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><span class="img-wr <?php echo is_writable($file) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><span class="img-wr <?php echo is_executable($file) ? 'wr-y' : 'wr-n'; ?>"></span></td>
			                    <td><?php echo date('Y-m-d H:i:s',filectime($file)); ?></td>
			                    <td><?php echo date('Y-m-d H:i:s',filemtime($file)); ?></td>
			                    <td><?php echo date('Y-m-d H:i:s',fileatime($file)); ?></td>
			                    <td>
			                    	<?php 

			                    		
			                    		if(getFileType($file)=="image"){
			                    	?>
			                    			<a href="javascript:void(0)" data-url="<?php echo $file; ?>" class="img-handle img-see J_img-see"></a>
			                    			<a href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}elseif(getFileType($file)=="dir"){
			                    	?>
			                    			<a href="index.php?act=seedir&path=<?php echo $file; ?>&name=<?php echo $value; ?>" class="img-handle img-see"></a>
											<a href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}else{
			                    			//如果是普通文件
			                    			
			        
			                    	?>
			                    			<a href="index.php?act=seefile&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-see"></a>
			                    			<a href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-rename"></a>
			                    	<?php		
			                    		}
			                    	 ?>
			                    	

			                    	
			

			                    <a href="index.php?act=copy&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-copy"></a>


		                    	<a href="" class="img-handle img-cut"></a>

		                    	<a href="index.php?act=delete&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-delete"></a>

		                    	<a href="index.php?act=download&path=<?php echo $path; ?>&name=<?php echo $value; ?>" class="img-handle img-download"></a>
			                    	
			                   
			                    </td>
							</tr>
							<?php
								if($act=='seefile' && $currFile==$file){

							?>
									<tr>
										<td colspan="12">
											
											<form action="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>" method="post">
												<textarea class="file-textarea" disabled>
													<?php echo file_get_contents($file); ?>
												</textarea>
												<input type="submit" class="ipt-xg-btn" value="修改" />
												<a href="index.php" class="cancel-btn">取消</a>
											</form>
										</td>
									</tr>
							<?php
								}elseif($act=='edit' && $currFile==$file){
									if(getFileType($currFile)=="file"){
							?>
										<tr>
											<td colspan="12">
												
												<form action="index.php?act=save&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>" method="post">
													<textarea class="file-textarea" name="filetextare">
														<?php echo file_get_contents($file); ?>
													</textarea>
													<input type="submit" class="ipt-xg-btn" value="保存" />
													<a href="index.php" class="cancel-btn">取消</a>
												</form>
											</td>
										</tr>
							<?php	
									}elseif(getFileType($currFile)=="image"){
							?>
										<tr>
											<td colspan="12">
												<form class="image-rename-form" action="index.php?act=save&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>" method="post">
													<div class="item"><strong>原图片名字：</strong><?php echo $value; ?></div>
													<div class="item"><strong>新的名字：</strong><input type="text" name="imagerename"  value="<?php echo $value; ?>"></div>
													<div class="item">
														 <input type="submit" value="修改">
													</div>
												</form>
											</td>
										</tr>
							<?php
									}elseif(getFileType($currFile)=="dir"){
							?>
										<tr>
											<td colspan="12">
												<form class="image-rename-form" action="index.php?act=save&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>" method="post">
													<div class="item"><strong>原文件夹名字：</strong><?php echo $value; ?></div>
													<div class="item"><strong>文件夹新名字：</strong><input type="text" name="filedirrename"  value="<?php echo $value; ?>"></div>
													<div class="item">
														 <input type="submit" value="修改">
													</div>
												</form>
											</td>
										</tr>
							<?php
									}
							?>
									
							<?php		
								}elseif($act=="save" && $currFile==$file){
									if(getFileType($currFile)=="file"){
										$fileContent=$_POST['filetextare'];
										if(file_put_contents($currFile,$fileContent) && $_SERVER['REQUEST_METHOD']=="POST"){

							?>
											<script type="text/javascript">
													$(function(){
														layer.msg('修改成功', {
															  icon: 1,
															  time: 2000 //2秒关闭（如果不配置，默认是3秒）
															}, function(){
															   window.location.href="index.php";
															});
												
													})
											</script>
							<?php
										}elseif(isset($_POST["submit"])){
							?>
											<script type="text/javascript">
													$(function(){
														layer.msg('修改失败！', {
															  icon: 1,
															  time: 2000 //2秒关闭（如果不配置，默认是3秒）
															}, function(){
															   window.location.href="index.php";
															});
													})
											</script>
							<?php
										}
									}elseif(getFileType($currFile)=="image"){

										$imageNewName=$_POST['imagerename']; //判断文件名字是否合法
										$imageNewFile=$path."/".$imageNewName;
										if(rename($currFile,$imageNewFile)){
							?>
											<tr>
												<td colspan="12">
													<script type="text/javascript">
														$(function(){
															layer.msg('修改成功！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php";
																});
														})
												    </script>
												</td>
											</tr>
							<?php
										}else{
							?>
											<tr>
												<td colspan="12">
													<script type="text/javascript">
														$(function(){
															layer.msg('修改失败！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>";
																});
														})
												    </script>
												</td>
											</tr>
							<?php
										}
							?>
										
							<?php			
									}elseif(getFileType($currFile)=="dir"){
										$fileDirNewName=$_POST['filedirrename']; //判断文件名字是否合法
										$fileDirNewFile=$path."/".$fileDirNewName;
										if(rename($currFile,$fileDirNewFile)){
							?>
											<tr>
												<td colspan="12">
													<script type="text/javascript">
														$(function(){
															layer.msg('修改成功！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php";
																});
														})
												    </script>
												</td>
											</tr>
							<?php
										}else{
							?>
											<tr>
												<td colspan="12">
													<script type="text/javascript">
														$(function(){
															layer.msg('修改失败！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>";
																});
														})
												    </script>
												</td>
											</tr>
							<?php				
										}
									}
								}elseif($act=="copy" && $currFile==$file){


							?>
											<tr>
												<td colspan="12">
													<form class="image-rename-form" action="index.php?act=copymove&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>" method="post">
														<div class="item"><strong>原文件的位置：</strong><?php echo $currFile; ?></div>
														<div class="item"><strong>新文件名字：</strong><input type="text" name="filecopy"  value="<?php echo $currFile; ?>"></div>
														<div class="item">
															 <input type="submit" value="修改">
														</div>
													</form>
												</td>
											</tr>
									
							<?php		
								}elseif($act=="copymove" && $currFile==$file){
									$fileCopy=$_POST['filecopy'];
									
							?>
										
									<tr>
										<td colspan="12">
											<?php 
												if(copy($currFile,$fileCopy)){
											?>
													<script type="text/javascript">
														$(function(){
															layer.msg('修改成功！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php";
																});
														})
												    </script>		
											<?php
												}else{
											?>
													<script type="text/javascript">
														$(function(){
															layer.msg('修改失败！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php";
																});
														})
												    </script>		
											<?php
												}
											 ?>
										</td>
									</tr>
							<?php		
								}elseif($act=="delete" && $currFile==$file){
							?>
									<tr>
										<td colspan="8">
										<?php 
											if(delFiles($file)){
										?>
												<script type="text/javascript">
														$(function(){
															layer.msg('删除成功！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php";
																});
														})
												    </script>
										<?php
											}else{
										?>
											<script type="text/javascript">
														$(function(){
															layer.msg('删除失败！', {
																  icon: 1,
																  time: 2000 //2秒关闭（如果不配置，默认是3秒）
																}, function(){
																   window.location.href="index.php?act=edit&path=<?php echo $path; ?>&name=<?php echo $currFileName; ?>";
																});
														})
												    </script>
										<?php
											}
										 ?>
										</td>
									</tr>
							<?php
								}
							 ?>
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
	<div id="J_dialog-img" style="float:left; display: none;"><img></div>
	<script type="text/javascript" src="../../staitc/js/layer/layer.js"></script>
	<script type="text/javascript">
		$(function(){
			$(document).on("click",'.J_img-see',function(){
				var url=$(this).data("url");
				var layerDia;
				var $dialogImg=$("#J_dialog-img img");
				$dialogImg.attr("src",url);
				$dialogImg.on("load",function(){
					
					layerDia=layer.open({
					  type: 1,
					  title: false,
					  closeBtn:true,
					  shade: false,
					  content:$("#J_dialog-img")
					});
				})
				
			})
		})

	</script>	
	
</body>
</html>