<?php
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$sql="select title from theme where id='$id'";
		$result=$mysqli->query($sql);
		if($result->num_rows){
			$row=$result->fetch_assoc();
			$themetitle=$row["title"];
		}
	}
?>

<div class="theme-module">
	<div class="tit-type-2">
		 <span class="tit"><?php echo $themetitle;?></span>
	</div>

	
		<form class="theme-form1 form-horizontal" id="J_theme-form1" method="post" action="./theme-itemdo.php?id=<?php echo $id;?>">
			<div class="para-item">
		<?php
		 	$sql2="select * from titem where tid='$id'";
			$result=$mysqli->query($sql2);
		 	if($result->num_rows){
		 		$num=0;
				while ($row=$result->fetch_array()) {
					$num++;
		?>
					<div class="form-group">
					    <label  class="col-sm-1 control-label">选项<?php echo $num;?></label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control"   placeholder="请输入选项内容" disabled="disabled" value="<?php echo $row['title'];?>" />
					      <input type="hidden" value="<?php echo $row['id']; ?>">
					    </div>
					    <div class="col-sm-1"><button type="button" class="btn btn-danger btn-item-del" data-url="./theme-itemDelDo.php?id=<?php echo $row['id'];?>">删除</button></div>
					</div>
		<?php
				}
			}else{
		?>
		  <div class="form-group">
		    <label  class="col-sm-1 control-label">选项1</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="options[]"  placeholder="请输入选项内容">
		      <input type="hidden" name="ids[]" value="">
		    </div>
		    <div class="col-sm-1"><button type="button" class="btn btn-danger btn-item-del">删除</button data-url="./theme-itemDelDo.php?id=''"></div>
		  </div>
		  <div class="form-group">
		    <label  class="col-sm-1 control-label">选项2</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control"  name="options[]"  placeholder="请输入选项内容">
		      <input type="hidden" name="ids[]" value="<?php echo $row['id'];?>">
		    </div>
		    <div class="col-sm-1"><button type="button" class="btn btn-danger btn-item-del">删除</button></div>
		  </div>
		  <div class="form-group">
		    <label  class="col-sm-1 control-label">选项3</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="options[]" placeholder="请输入选项内容">
		      <input type="hidden" name="ids[]" value="">
		    </div>
		    <div class="col-sm-1"><button type="button" class="btn btn-danger btn-item-del">删除</button></div>
		  </div>
		<?php
		}
		?>
		</div>
		  <div class="form-group">
		  		<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<button class="btn btn-primary" type="button" id="J_addItem">添加选项+</button>
				</div>
		  </div>
		  <div class="form-group">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<button type="submit" style="width: 100%;" class="btn btn-success btn-lg">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
				</div>
				<div class="col-sm-4"></div>
		  </div>
		</form>
		

		<script type="text/javascript">
		$(function(){
			var layerindex1; 
			$(document).on("click",".btn-item-del",function(e){
				var $this=$(this);
				var url=$this.data("url");
				if(!!url){
					$.ajax({
						url: url,
						type: 'post',
						dataType:"json",
						beforeSend:function(){
							layerindex1= layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
						},
						success:function(data){
							layer.close(layerindex1);
							if(!!data){
								$this.parent().parent(".form-group").remove();
								layer.msg('删除成功！');
							}else{
								layer.msg("删除失败！");
							}

						}
					})
				}else{
					$this.parent().parent(".form-group").remove();
					
				}
				
				
				
				
			});

			
			$("#J_addItem").on("click",function(){
				
				$('<div class="form-group"><label  class="col-sm-1 control-label">选项</label><div class="col-sm-10"><input type="text" class="form-control" name="options[]" placeholder="请输入选项内容"><input type="hidden" name="ids[]" value=""></div><div class="col-sm-1"><button type="button" class="btn btn-danger btn-item-del">删除</button></div></div>').appendTo($("#J_theme-form1 .para-item"));
			})
		})

		</script>
	
</div>

