<?php
	session_start();

	
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");

	$classId=$_REQUEST["classid"];

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
		<table class="col-edit-tbl">
			<thead>
				<tr>
					<th width="15%"></th>
					<th width="85%"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="para-tit">栏目名称：</td>
					<td><input type="text" name="classname" size="50"></td>
				</tr>
				<tr>
					<td class="para-tit">所属父栏目：</td>
					<td>
						<select class="sel-type-1" size="10"></select>
					</td>
				</tr>
				<tr>
					<td class="para-tit">是否是终极栏目：</td>
					<td>是</td>
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
										<input type="text" name="dirfile" id="J_dirfile" value="">
									</td>
									<td><input type="text" name="distfile" id="J_distfile" value=""></td>
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
							<!-- .preview -->
							<div class="upload-img" id="J_upload-imgbox">
								预览中...
							</div>
							<div class="upload-img">
								<img src="../static/images/pagecolumn/default_avatar.jpg"/>
								<div class="handle-bar" id="J_handle-bar">
									<span class="upload-btn">上传</span>
									<span class="del-btn">删除</span>
								</div>
								<div class="progress" id="J_progress">
									<span style="width: 15%;"></span>
								</div>
							</div>
							<div class="upload-img">
								<img src="../static/images/pagecolumn/default_avatar.jpg" />
								<div class="handle-bar">
									<span class="upload-btn">上传</span>
									<span class="del-btn">删除</span>
								</div>
								<div class="progress" id="J_progress">
									<span style="width: 15%;"></span>
								</div>
							</div>
							<div class="upload-img">
								<img src="../static/images/pagecolumn/default_avatar.jpg" />
								<div class="handle-bar">
									<span class="upload-btn">上传</span>
									<span class="del-btn">删除</span>
								</div>
								<div class="error">上传错误！</div>
							</div>
							<div class="upload-img">
								<img src="../static/images/pagecolumn/default_avatar.jpg" />
								<div class="handle-bar" id="J_handle-bar">
									<span class="upload-btn">上传</span>
									<span class="del-btn">删除</span>
								</div>
								<div class="success"></div>
							</div>
							<div id="filePicker" class="filepicker-container">
								
							</div>
							<div class="uploader-server">从服务器端选择</div>
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
						<textarea rows="3" cols="50" name="keyword"></textarea>
					</td>
				</tr>
				<tr>
					
					<td colspan="2" class="align-c">
						<input type="submit" name="submit" value="提交" class="btn btn-success  btn-lg">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="height: 200px;"></div>

	<script type="text/javascript">
		var $classId=<?php echo $classId;?>;
	</script>
	<script type="text/javascript" src="./js/upload2.js"></script>
	
</body>
</html>