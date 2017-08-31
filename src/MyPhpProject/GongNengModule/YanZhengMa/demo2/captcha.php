<?php

   header("Content-type: text/html; charset=utf-8"); 
   if(isset($_REQUEST["authcode"])){
	   session_start();
	/*   echo $_REQUEST["authcode"]."<br/>";
 echo $_SESSION["authcode"];*/
	   if(strtolower($_REQUEST["authcode"])==$_SESSION["authcode"]){
		  echo "<p>输入正确！</p>";   
	   }else{
		  echo "<p>输入错误！</p>";   
	   }   
	   exit();
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>验证码</title>
</head>

<body>
   <form method="post" action="form.php">
      <div>
         验证码图片：<img id="captcha_img" border="1" src="captcha_img.php?r=<?php echo rand();?>" width="200" height="200">
         <a href="javascript:void(0)" onClick="document.getElementById('captcha_img').src='./captcha_img.php?r='+Math.random()">看不清</a>
      </div>
      <div>请输入图片中的内容：<input type="text" name="authcode" value="" /></div>
      <div><input type="submit" value="提交" /></div>
   </form>
</body>
</html>


































