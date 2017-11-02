<?php
	require "../../global.php";
	echo "<h1>c.php</h1>";
	include(ROOT_PATH."/bbb/b.php");
	 echo STATIC_PATH;
	 echo "<br/>";
	 echo $basepath;
	 echo "<br/>";
echo $url;
echo ROOT_PATH;



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/static/css/base.css">
</head>
<body>

</body>
</html>