<?php
	session_start();
	include("../../Path.php");
	include("../../common/mysqli.php");
	include("../../common/session.php");
	include("../common/common.func.php");
	include("../common/classtree.func.php");

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
	<?php include('../../template/scriptstyle.php') ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" charset="utf-8" src="../../staitc/js/ueditor1_4_3_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../staitc/js/ueditor1_4_3_3/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../../staitc/js/ueditor1_4_3_3/lang/zh-cn/zh-cn.js"></script>


    <script type="text/javascript" src="../../staitc/js/layer/layer.js"></script>
</head>
<body>

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
					<td class="para-tit">缩略图：</td>
					<td>
						<div class="news-zoomimg">
							<img src="" id="J_zoomimg">
						</div>

						<a href="javascript:;" class="a-upload">
    						<input type="file" name="thumbnail" id="J_classimgfile">点击这里上传文件
    					</a>

						<p><button class="btn btn-success">从服务端选择</button></p>
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
	<div class="upload-box" id="J_upload-box">
			<div class="newzoom-img">
				<img src=""  id="J_newzoom-img" />
			</div>
			<p class="align-c mt15"><button class="btn btn-success btn-lg" id="J_uploadbtn">上传</button></p>
	</div>
	<div style="height: 150px"></div>
	<script type="text/javascript">
		function getObjectURL(file) {
            var url = null;
            if (window.createObjectURL != undefined) {
                url = window.createObjectURL(file)
            } else if (window.URL != undefined) {
                url = window.URL.createObjectURL(file)
            } else if (window.webkitURL != undefined) {
                url = window.webkitURL.createObjectURL(file)
            }
            return url
        };
		$(function(){
			var ue = UE.getEditor('editor');
			ue.addListener("ready", function () {
		        // editor准备好之后才可以使用
		        ue.setContent('<?php echo $content; ?>');
			});
			

			$("#J_classimgfile").on("change",function(){
				var _this=this;
				layer.open({
				  type: 1,
				  title:"上传文件",
				  area: '516px',
				  shadeClose: true,
				  content: $('#J_upload-box'),
				  success:function(){
				  	var url = getObjectURL(_this.files[0]); 
                	$("#J_newzoom-img").attr("src",url);
				  }
				});
			});


			$("#J_uploadbtn").on("click",function(){
				$.$.ajax({
					url: './doUploadFile.php',
					type: 'POST',
					dataType: 'json',
					data: {file: },
				})
				
				
			})			
			 

		})
	</script>
</body>
</html>