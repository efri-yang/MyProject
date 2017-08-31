
<?php
    $title="";
    $content="";
    $id="";
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql="select * from notice where id='$id'";
        $result=$mysqli->query($sql);
        if($result->num_rows){
           $row=$result->fetch_assoc();
           $title=stripcslashes($row["title"]);
           $content=html_entity_decode($row["content"]);
        }
    }
?>
<script type="text/javascript" charset="utf-8" src="../UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../UEditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../UEditor/lang/zh-cn/zh-cn.js"></script>
<div class="notice-form mt30">
    <div class="tit-type-2">
         <span class="tit">公告表单</span>
         <a href="index.php?paget=notice" class="btn btn-success fr">查看列表</a>
     </div>
	<form action="noticeDo.php?id=<?php echo $id; ?>" method="post" id="defaultForm" class="donoticeform">
		<div class="form-group">
		    <label>标题</label>
		    <input type="text" name="title" value='<?php echo $title; ?>'  class="form-control"  placeholder="请输入标题">
	  	</div>
	  	<div class="form-group">
		    <label>内容</label>
		    <script id="UEId" type="text/plain" style="width:100%;height:300px;"></script>
		   <input class="form-control" type="text" id="inputId" name="inputName"
	　　　　　　　　 style="height:0px;border:0px;margin:0px;padding:0px"  value="<?php echo $content; ?>" />
            <input type="hidden" id="J_editorCon" name="context" value="<?php echo $content; ?>">
	  	</div>

	  	<div class="form-group ipt-submit">
		   <button  type="submit"  class="btn btn-success btn-lg">提交</button>
	  	</div>
	</form>
</div>

<script type="text/javascript">
	$(function(){
		editor=UE.getEditor("UEId",{
			 initialFrameHeight:300
		}).ready(function(){
			var editor = UE.getEditor("UEId");
            editor.setContent("<?php echo $content;  ?>")
            /*找到UEditor的iframe*/
            var  margintop = $($('#UEId .edui-editor-toolbarbox')[0]).height();
            $($('#divId i')[0]).css('margin-top', margintop);
            var contents = $('#UEId').find('iframe').contents();
            var fn = function () {
                $("#inputId").val(UE.getEditor("UEId").getContent());
                $('#defaultForm').data('bootstrapValidator')//重新验证inputName
                  .updateStatus('inputName', 'NOT_VALIDATED', null)
                  .validateField('inputName');
               $($('#UEId div')[0]).css('border-color', $('#labelId').css('color'));                
            }

            if (document.all) {//document.all识别是否在IE下，在IE下为true
                contents.get(0).attachEvent('onpropertychange', function (e) {
                    fn();
                });
            } else {
                contents.on('input', fn);
            }

		});

		 $('#defaultForm').submit(function () {
            $('#defaultForm').data('bootstrapValidator')
　　　　　　.updateStatus('inputName', 'NOT_VALIDATED', null)
　　　　　　.validateField('inputName');
            $($('#UEId div')[0]).css('border-color', $('#labelId').css('color')); 
        });

		 $('#defaultForm').bootstrapValidator({
            message: '验证未通过',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	title:{
            		validators: {
                        notEmpty: { //非空提示
                            message: '请输入标题！'
                        },
                    }
            	},
                inputName: {//所提交的控件name属性
                    message: '所提交的数据不能为空',
                    validators: {
                        notEmpty: { //非空提示
                            message: '填写的数据不能为空'
                        },
                    }
                },
            }
        }).on('success.form.bv', function (e) { 
       
            var contxt=UE.getEditor("UEId").getContent(); 
            $("#J_editorCon").val(contxt);        
          
           
        });          

	})
</script>