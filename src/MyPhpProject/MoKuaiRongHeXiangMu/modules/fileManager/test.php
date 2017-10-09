<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><a href="test.php?file=./files/3.html">3.html</a></p>
	<p><a href="test.php?file=./files/3.txt">3.txt</a></p>
	<p><a href="test.php?file=./files/pro_slide_111.jpg">pro_slide_111.jpg</a></p>

	<?php
		$filename=$_REQUEST['file'];
		if(!!$filename){
			header("content-disposition:attachment;filename=".basename($filename));
			header("content-length:".filesize($filename));
			readfile($filename);
		}
	?>
</body>
</html>
