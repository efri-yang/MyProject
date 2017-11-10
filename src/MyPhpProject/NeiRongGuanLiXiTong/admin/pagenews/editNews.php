
<?php
	session_start();

	
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");
	date_default_timezone_set('PRC');




	$action=$_REQUEST['action'];
	if($action=="edit" && !isset($_POST["submit"])){
		$newId=$_REQUEST["id"];
		$sql="select mc_article.classid,mc_columns.classname,mc_article.title,mc_article.shorttitle,mc_article.content,mc_article.thumbnail,mc_article.keywords,mc_article.description,author from mc_article  inner join mc_columns on mc_article.classid=mc_columns.classid where mc_article.id='$newId'";
		$result=$mysqli->query($sql);
		$results=resultToArray($result);

		$title=$results[0]["title"];
		$subtitle=$results[0]["shorttitle"];
		$pclassid=$results[0]["classid"];
		$keyword=$results[0]["keywords"];
		$intro=$results[0]["description"];
		$thumbnail=$results[0]["thumbnail"];
		$content=$results[0]["content"];
		$author=$results[0]["author"];
	}else{
		$newId=$_REQUEST["id"];
		$title=$_POST["title"];
		$subtitle=$_POST["subtitle"];
		$pclassid=$_POST["pclassid"];
		$keyword=$_POST["keyword"];
		$intro=$_POST["intro"];
		$thumbnail=$_POST["thumbnail"];
		$content=$_POST["content"];
		$publicTime=date('Y-m-d H:i:s');
		$author=$_POST["author"];
		if(isset($_POST["submit"])){
			if(empty($title)){
				$strErorr="<p>请输入标题！</p>";
			}elseif(!isset($pclassid)){
				$strErorr="<p>请选择父栏目！</p>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加信息</title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>
	
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
	
		<?php  
			if(!empty($strErorr)){
		?>
				<div class="container">
					<div class="news-add-error">
						<?php echo $strErorr; ?>
					</div>
				</div>


		<?php		
			}
			if(isset($_POST["submit"]) && empty($strErorr)){

				//有些字符插入数据库的时候会被解释成控制符，这些字符包括 单引号 双引号 反斜杠和空字符(NULL),所以我们需要转移
				$content2=addslashes($content);
				if($action=="create" || empty($action)){
					$sql="insert into mc_article(classid,title,shorttitle,content,thumbnail,keywords,description,publictime,author) values('$pclassid','$title','$subtitle','$content2','$thumbnail','$keyword','$intro','$publicTime',$author)";
				}elseif($action=="edit"){
					$sql='update mc_article set classid="'.$pclassid.'",title="'.$title.'",shorttitle="'.$subtitle.'",content="'.$content2.'",thumbnail="'.$thumbnail.'",keywords="'.$keyword.'",description="'.$intro.'",author="'.$author.'" where id="'.$newId.'"';
				}
				
				$result=$mysqli->query($sql);
				if($mysqli->affected_rows){
					handleResult(1,"修改成功！","index.php");	
				}else{
					handleResult(1,"修改失败！","index.php");
				}
			}else{
		?>
		
		

	<div class="container">
		<form method="post" action="editNews.php?action=<?php echo $action; ?>&id=<?php echo $newId; ?>">
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
							<?php echo dispalyList($data,"",1,$pclassid); ?>
						</select>

						<p style="padding-top: 10px"><a href="../pagecolumns/editColumns.php?action=create" class="btn btn-success">创建目录</a></p>

					</td>
				</tr>
				
				<tr>
					<td class="para-tit">关键字：</td>
					<td>
						<textarea rows="2" cols="60" name="keyword"><?php echo $keyword;?></textarea>
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
							<?php

								if(empty($thumbnail)){
							?>
									<div class="no-pic" id="J_no-pic"></div>
							<?php		
								}else{
							?>
								<ul class="upload-img">
									<li>
										<div class="img-wrap">
											<img src="<?php echo $thumbnail;?>">
										</div>
									</li>
								</ul>
							<?php		
								}
							?>
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
						<script id="editor" type="text/plain" name="content" style="width:1024px;height:200px;">
							<?php echo $content; ?>
						</script>
					</td>
				</tr>
				<tr>
					<td class="para-tit">作者：</td>
					<td>
						<input type="text" name="author" value="<?php echo $author; ?>">
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

	<?php
		}
	?>
	
	
	<div style="height: 150px"></div>


	<!-- 
	
	 -->
	
</body>
</html>