<?php
	session_start();
	include("./libs/mysql.func.php");
	
	if(isset($_SESSION["id"])){
		$userId=$_SESSION["id"];
		$sql="select * from user where id='$userId'";
		$result=$mysqli->query($sql);
		if($result->num_rows){
			$row=$result->fetch_array();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./styles/base.css">
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.css">
    <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/style.css">


    <script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./UEditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/language/zh_CN.js"></script>
</head>
<body>
	
	<?php include("./tpl/header.php"); ?>
	<div class="container">
		<div class="row" style="padding: 0 35px">
			<form id="messageform" method="post" style="padding-top: 25px;" action="./messageformDo.php">
			  <div class="form-group">
                    <textarea style="height: 150px;width: 100%" name="messagecon" placeholder="请输入留言的内容"></textarea>
				  
			  	</div>

			  	<div class="form-group ipt-submit">
				   <button  type="submit"  class="btn btn-success btn-lg">提交</button>
			  	</div>
			</form>
		</div>	
	</div>
	<?php include("./tpl/footer.php"); ?>

<script type="text/javascript">
	$(function(){
		
		

		 $('#messageform').bootstrapValidator({
            message: '验证未通过',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                messagecon:{
                    validators: {
                        notEmpty: { //非空提示
                            message: '请输入标题！'
                        },
                    }
                }
            }
        }).on('success.form.bv', function (e) {
             
              var isLogin="<?php echo $userId;?>";
              if(!!isLogin){
                    
              }else{
                 e.preventDefault(); 
                 alert("你未登录请登录后在评价！")
              }
                 
        });          
              
              

	})
</script>
</body>
</html>