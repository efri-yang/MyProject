<?php
	session_start();
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");


	$classId=$_REQUEST["classid"];
	$editType=!!$classId && !isset($_POST['submit']);

	if($editType){
		$sql="select * from mc_columns where classid='$classId'";
		$result=$mysqli->query($sql);
		$results=resultToArray($result);
		foreach($results as $key=>$value){
			$className=$value['classname'];
			$pclassId=$value["pclassid"];
			$isLast=$value["islast"];
			$classPath=$value['classpath'];
			$classImg=$value["thumbnail"];
			$keyword=$value["keyword"];
			$intro=$value["intro"];
			$pFile=substr($classPath,0,strrpos($classPath,'/')+1);
			$distFile=substr($classPath,strrpos($classPath,'/')+1);
		}
	}else if(isset($_POST['submit'])){
		$className=$_POST["classname"];
		$pclassId=$_POST["pclassid"];
		$isLast=$_POST["islast"];
		$pFile=$_POST["pfile"];
		$distFile=$_POST["distfile"];
		$classImg=$_POST["thumbnail"];
		$keyword=$_POST["keyword"];
		$intro=$_POST["intro"];
		$path="../../";
		$classPath=$path.(!!$pFile ? $pFile."/" : "/").$distFile;

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
	<title>栏目编辑</title>
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
					
					
					$sql="insert into mc_columns(pclassid,classname,classpath,thumbnail,description,keywords,islast) values('$pclassId','$className','$classPath','$classImg','$intro','$keyword','$isLast')";
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
		<table class="col-edit-tbl">
			<thead>
				<tr>
					<th width="15%"></th>
					<th width="85%"></th>
				</tr>
			</thead>
			<tbody>
				<form action="./editColumns.php" method="post">
						<tr>
							<td class="para-tit">栏目名称：</td>
							<td><input type="text" name="classname" size="50" value='<?php echo $className; ?>'></td>
						</tr>
						<tr>
							<td class="para-tit">所属父栏目：</td>
							<td>
								<?php
									$sql="select * from mc_columns";
									$result=$mysqli->query($sql);
									$results=resultToArray($result);
									$data=ClassTree::hTree($results);
									$data=ClassTree::sort($data,'sortrank');

									function dispalyList($arr,$str="",$step=1,$pclassId=0){
										foreach($arr as $key =>$value){
											$emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$step);
											$flag="|-";
											$disabled=$value['islast'] ? 'disabled' :'';
											if($pclassId==$value['classid']){
												$str.="<option selected value='".$value['classid']."' $disabled>".$emptyholer.$flag.$value["classname"]."</option>";
											}else{
												$str.="<option value='".$value['classid']."' $disabled>".$emptyholer.$flag.$value["classname"]."</option>";
											}
											
											if(!empty($value['sub'])){
												$str=dispalyList($value['sub'],$str,$step+1,$pclassId);
											}
										}
										return $str;
									}
								?>
								<select class="sel-type-1" size="10" name="pclassid" id="selparent">
									<option value="0">根目录</option>
									<?php echo dispalyList($data,"",1,$classId) ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="para-tit">是否是终极栏目：</td>
							<td>
								<label><input type="radio" value="1" name="islast" <?php echo $isLast==1 ? 'checked' :''; ?>  <?php echo $editType ? 'disabled' :''; ?>>是</label>
								<label><input type="radio" value="0" name="islast" <?php echo $isLast==0 ? 'checked' :''; ?>  <?php echo $editType ? 'disabled' :''; ?>>否</label>
								
							</td>
						</tr>
						<tr>
							<td class="para-tit">栏目存放文件夹：</td>
							<td>
								<table class="filedir-tbl">
									<tbody>
										<tr class="dir-up">
											<td></td>
											<td>上层栏目目录</td>
											<td>本栏目目录</td>
											<td></td>
										</tr>
										<tr>

											<td>根目录/</td>
											<td>
												<input type="text" name="pfile" id="J_dirfile" value="<?php echo $pFile; ?>">
											</td>
											<td><input type="text" name="distfile" id="J_distfile" value="<?php echo $distFile; ?>"></td>
											<td><button class="btn btn-success" id="J_jclmbtn">检测目录</button></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

						<tr>
							<td  class="para-tit">栏目缩略图：</td>
							<td>
								<div class="zoom-img">
									<div class="no-pic" id="J_no-pic"></div>
									<div id="J_uploader-list" class="clearfix"></div>
									<div id="filePicker" class="filepicker-container">
										
									</div>
									<div class="uploader-server">从服务器端选择</div>
									<input type="hidden" name="thumbnail" id="J_thumbnail-ipt">
								</div>
							</td>
						</tr>

						

						
						<tr>
							<td class="para-tit">页面关键字：</td>
							<td>
								<textarea rows="3" cols="50" name="keyword"></textarea>
							</td>
						</tr>
						<tr>
							<td  class="para-tit">栏目简介：</td>
							<td>
								<textarea rows="3" cols="50" name="intro"></textarea>
							</td>
						</tr>
						<tr>
							
							<td colspan="2" class="align-c">
								<input type="submit" name="submit" value="提交" class="btn btn-success  btn-lg">
							</td>
						</tr>
				</form>
			</tbody>
		</table>
	</div>
	<div style="height: 200px;"></div>

	
	<script type="text/javascript" src="./js/upload2.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#selparent").on("change",function(){
				var valId=$(this).val();
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