<?php
	session_start();

	
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");

	if(isset($_POST["submit"])){
		$title=$_POST["title"];
		$subtitle=$_POST["subtitle"];
		$pclassid=$_POST["pclassid"];
		$keyword=$_POST["keyword"];
		$intro=$_POST["intro"];
		$thumbnail=$_POST["thumbnail"];
		$content=$_POST["content"];
		if(empty($title)){
			$strErorr="<p>请输入标题！</p>";
		}
	}



	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加信息</title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>
	<script type="text/javascript">
		var imageSave='<?php echo STATIC_PATH; ?>'+"/uploads/images/";
	</script>

	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/page-news.css">
	<script type="text/javascript" charset="utf-8" src="<?php echo STATIC_PATH; ?>/admin/static/js/ueditor1_4_3_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo STATIC_PATH; ?>/admin/static/js/ueditor1_4_3_3/ueditor.all.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/ueditor1_4_3_3/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/layer/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/js/webuploader/webuploader.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/webuploader/webuploader.js"></script>
</head>
<body>
	<?php include(ROOT_PATH.'/admin/template/header_top.php') ?>
	<div class="container">
		<?php  
			if(isset($_POST["submit"]) && !empty($strErorr)){
		?>
				<div class="news-add-error">
					<?php echo $strErorr; ?>
				</div>
		<?php		
			}
		?>
		<form method="post" action="index.php">
			<table class="news-add-tbl">
				<tr>
					<td class="para-tit"><span class="star">*</span>标题：</td>
					<td><input type="text" size="45" name="title" value="<?php echo $title;?>"></td>
				</tr>
				<tr>
					<td class="para-tit">副标题：</td>
					<td><input type="text" size="45" name="subtitle"  value="<?php echo $subtitle;?>"></td>
				</tr>
				<tr>
					<td class="para-tit">所属栏目：</td>
					<td>
						<?php  
							$sql="select * from mc_columns";
							$result=$mysqli->query($sql);
							$results=resultToArray($result);
							$data=ClassTree::hTree($results);
							$data=ClassTree::sort($data,'sortrank');
							function dispalyList($arr,$str="",$step=1,$pclassId=""){
								foreach($arr as $key =>$value){
									$emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$step);
									$flag="|-";
									$disabled=!!$value["islast"] ? "" :"disabled";
									if($pclassId==$value['classid']){
										$str.="<option selected value='".$value['classid']."' ".$disabled.">".$emptyholer.$flag.$value["classname"]."</option>";
									}else{
										$str.="<option value='".$value['classid']."' ".$disabled.">".$emptyholer.$flag.$value["classname"]."</option>";
									}
									
									if(!empty($value['sub'])){
										$str=dispalyList($value['sub'],$str,$step+1,$pclassId);
									}
								}
								return $str;
							}
						?>
						<select class="sel-1" size="12" name="pclassid" id="selparent">
							<option value="0" disabled>根目录</option>
							<?php echo dispalyList($data,"",1,$pclassId) ?>
						</select>

						<p style="padding-top: 10px"><a href="../pagecolumns/editColumns.php?action=create" class="btn btn-success">创建目录</a></p>

					</td>
				</tr>
				
				<tr>
					<td class="para-tit">关键字：</td>
					<td>
						<textarea rows="2" cols="60" name="keyword" value="<?php echo $keyword;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td class="para-tit">描述：</td>
					<td>
						<textarea rows="3" cols="60" name="intro" value="<?php echo $intro;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td class="para-tit">封面图：</td>
					<td>
						<div class="coms-zoom-img">
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
					<td class="para-tit">内容：</td>
					<td>
						<script id="editor" type="text/plain" name="content" style="width:1024px;height:200px;"></script>
					</td>
				</tr>
				<tr>
					<td class="para-tit"></td>
					<td>
						<input type="submit" name="submit" class="btn btn-success btn-lg" value="提交" />
					</td>
				</tr>
			</table>
		</form>
	</div>

	<script type="text/javascript" src="./js/upload2.js"></script>
	<script type="text/javascript">
		$(function(){
			 var ue = UE.getEditor('editor');
		})
	</script>
	
	<div style="height: 150px"></div>
	
</body>
</html>