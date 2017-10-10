
 <?php

 	// $fh=fopen('data.txt','r') or die("can't read file");
 	// while (!feof($fh)) {
 	// 	$s=fgets($fh,20);
 	// 	print_r($s);
 	// }

 	// fclose($fh) or die("can't close file");

 	// echo "<br/>";


 	// echo file_get_contents('data.txt');
 	// 
 // 	$tmpfname = tempnam("./", "FOO");

	// $handle = fopen($tmpfname, "w");
	// fwrite($handle, "writing to tempfile");
	// $handle = fopen($tmpfname, "r");

	// echo fgets($handle);
	// fclose($handle);
	// 
	// $fh=fopen("http://wnworld.com/fileTest/data1.txt",'r') or die("不能打开远程文件！");
	// // echo fgets($fh);
	// echo file_get_contents('http://wnworld.com/fileTest/data1.txt');
	// 
	
	// $file = 'data.txt';

	// if (file_exists($file)) {
	//     header('Content-Description: File Transfer');
	//     header('Content-Type: application/octet-stream');
	//     header('Content-Disposition: attachment; filename="'.basename($file).'"');
	//     header('Expires: 0');
	//     header('Cache-Control: must-revalidate');
	//     header('Pragma: public');
	//     header('Content-Length: ' . filesize($file));
	//     readfile($file);
	//     exit;
	// }
	// 
	// 
	// $lines=0;
	// if($fh=fopen('data.txt','r')){
	// 	while(!feof($fh)){
	// 		if(fgets($fh)){
	// 			$lines++;
	// 		}
	// 	}
	// }
	// echo $lines;
	
	$fh=fopen('data.txt','r') or die("链接失败！");
	preg_match('/\r\n/',file_get_contents('data.txt'),$matchs);
	print_r($matchs);
 	

 ?>