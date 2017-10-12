<?php
	session_start();
    include("../../Path.php");
    include("../../common/session.php");
    include("../../common/mysqli.php");

    $fileInfo=$_FILES['image'];

    if($fileInfo['error']==0){
    	$fileFullName=$fileInfo['name'];
    	$fileNameArr=explode(".",$fileFullName);
    	$date  = date('Y-m-d H:i:s');
    	$fileName=$fileNameArr[0];
    	$type=$fileInfo['type'];
    	$fp    = fopen($fileInfo['tmp_name'], 'rb');
    	$image = addslashes(fread($fp, filesize($fileInfo['tmp_name'])));

    	$data=array(
    		"name"=>$fileName,
    		"pic"=>$image,
    		"type"=>$type,
    		"date"=>$date
    	); 

    	$id=$db->insert('m_image',$data);
    	if($id){
?>
<style type="text/css">
    .dologin-box-success{
        text-align: center;
        margin-top: 80px;
    }

    .dologin-box-success h1{
        text-align: center;
        font-size: 32px;
        color:green;
        font-weight: bold;
    }
</style>
        <div class="dologin-box-success">
    <h1>插入成功！</h1>
    <p>页面将在<span id="timecount"></span>秒之后跳转！<a href="index.php">手动点击跳转！</a></p>
</div>
<script type="text/javascript">
    var countElem=document.getElementById("timecount");
    var num=3;
    var Timer;
    countElem.innerHTML=num;
    function timereduce(){
        clearTimeout(Timer);
        if(num<=1){
            window.location.href="index.php"
        }else{
            num--;
            countElem.innerHTML=num;
            Timer=setTimeout(timereduce,1000);

        }

    }
    Timer=setTimeout(timereduce,1000);
</script>
<?php
    	}

    }
?>