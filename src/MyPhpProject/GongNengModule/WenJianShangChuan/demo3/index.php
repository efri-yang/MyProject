<?php
  header("Content-type:text/html;charset=utf-8");
  include_once("uplod.func.php");
  //echo $_FILES["myFile1"]["error"];
  //echo $_FILES["myFile2"]["error"];
   // print_r($_FILES["myFile"]);

  // Array ( [name] => Array ( 
  //           [0] => bb_arrow_lf.png 
  //           [1] => bb_arrow_rt.png ) 
  //         [type] => Array ( 
  //           [0] => image/png 
  //           [1] => image/png ) 
  //         [tmp_name] => Array ( 
  //           [0] => E:\Xampp\tmp\php9D1C.tmp 
  //           [1] => E:\Xampp\tmp\php9D1D.tmp ) 
  //         [error] => Array ( 
  //           [0] => 0 
  //           [1] => 0 ) 
  //         [size] => Array ( 
  //           [0] => 418 
  //           [1] => 413 ) 
  //       )
  // print_r($_FILES);


  // Array ( 
  //       [myFile1] => Array ( 
  //           [name] => bb_arrow_lf.png 
  //           [type] => image/png 
  //           [tmp_name] => E:\Xampp\tmp\php2288.tmp 
  //           [error] => 0 
  //           [size] => 418 ) 
  //       [myFile2] => Array ( 
  //           [name] => bb_arrow_rt.png 
  //           [type] => image/png 
  //           [tmp_name] => E:\Xampp\tmp\php2298.tmp 
  //           [error] => 0 
  //           [size] => 413 ) 
  //   )

  // Array ( 
  //   [myFile] => Array ( 
  //       [name] => Array ( 
  //           [0] => bb_arrow_lf.png 
  //           [1] => bb_arrow_rt.png ) 
  //       [type] => Array ( 
  //           [0] => image/png 
  //           [1] => image/png ) 
  //       [tmp_name] => Array ( 
  //           [0] => E:\Xampp\tmp\php2979.tmp 
  //           [1] => E:\Xampp\tmp\php297A.tmp ) 
  //       [error] => Array ( 
  //           [0] => 0 
  //           [1] => 0 ) 
  //       [size] => Array ( 
  //           [0] => 418 
  //           [1] => 413 ) ) 
  //   )
  //echo count($_FILES); 
  foreach($_FILES as $fileInfo){
	 
	  $arr[]=uploadFile($fileInfo);

  }
  print_r($arr);
  

?>