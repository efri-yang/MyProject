<?php
	session_start();

	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");

	$className=$_POST["classname"];
	$pclassId=$_POST["pclassid"];
	$isLast=$_POST["islast"];
	$dirFile=$_POST["dirfile"];
	$distFile=$_POST["distfile"];
	$classImg=$_POST["classimg"];
	$keyword=$_POST["keyword"];
	$intro=$_POST["intro"];
	$thumbnailImg=$_POST["zoomurl"];
	$path="../../";
	$classPath=$path.(!!$dirFile ? $dirFile."/" : "/").$distFile;


	if(isset($_POST['submit'])){
		$errorTxt="";
		if(empty($className)){
			$errorTxt.="<p>栏目名称不能为空</p>";
		}
		if(empty($pclassId)){
			$errorTxt.="<p>父栏目不能为空</p>";
		}
		if(empty($dirFile)){
			$errorTxt.="<p>存放的路劲不能为空</p>";
		}
		if(empty($distFile)){
			$errorTxt.="<p>存放的最终文件夹不能为空</p>";
		}
		if(file_exists($classPath) && !is_dir($classPath)){
			$errorTxt.="<p>存放的完整路劲不正确！</p>";
		}
	}
	

	



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加栏目</title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>


	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/page-column.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/layer/layer.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/js/webuploader/webuploader.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/webuploader/webuploader.js"></script>
</head>
<body>
	<?php include(ROOT_PATH.'/admin/template/header_top.php') ?>

	
	<div class="container">
		<?php 
			
			if(empty($errorTxt) && isset($_POST['submit'])){
				
				echo "dsafsadfasdf重中之重做做";
				
				$sql="insert into mc_columns(pclassid,classname,classpath,thumbnail,description,keywords,islast) values('$pclassId','$className','$classPath','$thumbnailImg','$intro','$keyword','$isLast')";
				$result=$mysqli->query($sql);
				if($result){
					echo "<h1>添加成功！</h1>";
					header("location:index.php");
				}else{
					echo "<h1>添加失败！</h1>";
					header("location:addColumns.php");

				}
			}else{
				
		?>
		<?php 
			if($errorTxt){
		?>
			<div class='col-add-error-box'>
				<?php echo $errorTxt; ?>
			</div>
		<?php		
			}
		 ?>
		<form action="./addColumns.php" method="post">


		
			<table class="col-add-tbl">
				<thead>
					<tr>
						<th width="15%"></th>
						<th width="85%"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td class="para-tit">栏目名称：</td>
					<td><input type="text" name="classname" value="<?php echo $className;?>"></td>
				</tr>
				<tr>
					<td>所属父栏目:</td>
					<td>
						<?php 
							$sql="select * from mc_columns where islast=0";
							$result=$mysqli->query($sql);
							$results=resultToArray($result);
							$data=ClassTree::hTree($results);
							$data=ClassTree::sort($data,'sortrank');
							
							function dispalyList($arr,$str="",$step=1,$pclassId=0){
								foreach($arr as $key =>$value){
									$emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$step);
									$flag="|-";
									if($pclassId==$value['classid']){
										$str.="<option selected value='".$value['classid']."'>".$emptyholer.$flag.$value["classname"]."</option>";
									}else{
										$str.="<option value='".$value['classid']."'>".$emptyholer.$flag.$value["classname"]."</option>";
									}
									
									if(!empty($value['sub'])){
										$str=dispalyList($value['sub'],$str,$step+1,$pclassId);
									}
								}
								return $str;
							}
						 ?>
						<select class="sel-1" size="7" name="pclassid" id="selparent">
							<option value="0">根目录</option>
							<?php echo dispalyList($data,"",1,$pclassId) ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>是否终级栏目:</td> 
					<td>	
						<input type="radio" value="1" checked name="islast">是
						<input type="radio" value="0"  name="islast">否
					</td>
				</tr>
				<tr>
					<td>栏目存放文件夹:</td>
					<td>
						<table class="dir-tbl">
							<tr class="dir-up">
								<td></td>
								<td>上层栏目目录</td>
								<td>本栏目目录</td>
								<td></td>
							</tr>
							<tr>
								<td>根目录/</td>
								<td>
									<input type="text" name="dirfile" id="J_dirfile" value="<?php echo $dirFile; ?>">
								</td>
								<td><input type="text" name="distfile" id="J_distfile" value="<?php echo $distFile; ?>" /></td>
								<td><button class="btn btn-success" id="J_jclmbtn">检测目录</button></td>
							</tr>
						</table>
						
						
					</td>
				</tr>
				<tr>
					<td>栏目缩略图:</td>
					<td>
						<div class="zoom-container">
							<ul class="queue-list" id="J_queue-list"></ul>
							<div class="uploader-default-container">
								<div class="uploader-no-pic"></div>
							</div>
							<div id="filePicker" class="filepicker-container"></div>
							<a href="#" class="upload-btn" id="J_uploadBtn">上传</a>
							<input type="hidden" name="zoomurl" value="" id="J_zoomurl">
						</div>
					</td>
				</tr>
				<tr>
					<td>页面关键字:</td>
					<td>
						<textarea rows="3" cols="50" name="keyword"></textarea>
					</td>
				</tr>
				<tr>
					<td>栏目简介:</td>
					<td>
						<textarea rows="3" cols="50" class="intro"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="align-c"><input type="submit" name="submit" value="提交" class="btn btn-success btn-lg"></td>
				</tr>
				</tbody>
				
			</table>

		</form>
	</div>

	<div style="height: 80px"></div>
	
	<script type="text/javascript" src="./js/upload.js"></script>
	<script type="text/javascript">

             
			$(function(){
				
				//
				$("#selparent").on("change",function(){
					var valId=$(this).val();
					alert("xxx");
					$.ajax({
						url:"doPath.php",
						dataType:"json",
						data:{pid:valId},
						type:"post",
						success:function(data){
							if(data.length){
								$("#J_dirfile").val(data[0].classpath)
							}else{
								$("#J_dirfile").val("");
							}
						}
					})
				});

			
			$("#J_jclmbtn").on("click",function(event){
				event.preventDefault();
				var distVal=$.trim($("#J_distfile").val());
				if(!distVal){
					alert("请输入最终目录！")
				}else{
					var reg=/^[a-zA-Z]{1}\w*$/;
					var result=reg.test(distVal);
					if(result){
						var dirVal=$.trim($("#J_dirfile").val());
						var finalPath=(!!dirVal ? dirVal+"/" :"/")+(distVal);
						$.ajax({
								url: './doDetectDir.php',
								type: 'POST',
								dataType: 'json',
								data: {finalPath:finalPath},
								success:function(data){
									if(!!data){
										alert("存在！")
									}else{
										alert("不存在可以创建！")
									}
								}
						})
					}else{
						alert("目录必须是以字母开头，由字母和数字或者下划线组成");
					}
				}	
			});
		})
	</script>
<?php		
			}

		 ?>
</body>
</html>

<!-- 

	typedir	char(60否	
 -->