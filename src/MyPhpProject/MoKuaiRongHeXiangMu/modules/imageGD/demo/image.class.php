<?php
	class Image{
		//文字水印
		

		private $imgInfo;
		private $fun;
		private $fun1;
		private $suffix;
		private $image;
		private $syImage;
		private $syInfo;
		private $sySuffix;
		function __construct($file){
			if(!file_exists($file)){
				die("文件不存在！");
			}
			$this->imgInfo=getimagesize($file);
			$this->suffix=image_type_to_extension($this->imgInfo['2'],false);
			$fun="imagecreatefrom{$this->suffix}";
			$this->image=$fun($file);





			// print_r($this->['mime']);
			// print_r($this->image);

		}
		
		public function watermarkText($text,$fontSize,$angle,$x,$y,$fontColor,$fontType=''){
			 if(empty($fontType)){
			 	imagestring($this->image,$fontSize, $x , $y,$text,$fontColor);
			 }else{
			 	imagettftext($this->image,$fontSize,$angle , $x , $y , $fontColor , $fontType , $text);
			 }
		}

		public function watermarkImg($file,$distx,$disty,$srcx,$srcx){
			$this->syInfo=getimagesize($file);
			$this->sySuffix=image_type_to_extension($this->syInfo[2],false);
			$fun="imagecreatefrom{$this->sySuffix}";
			$this->syImage=$fun($file);
			imagecopy($this->image, $this->syImage,$distx,$disty, $srcx, $srcx,imagesx($this->syImage), imagesy($this->syImage));


		}

		public function thumbnail(){

		}

		public function showImg(){
				header("Content-type:".$this->imgInfo['mime']);
				$fun1="image{$this->suffix}";
				$fun1($this->image);
		}


		public function __destruct(){

			imagedestroy($this->image);

		}


		//图片水印
		//缩略图像
		//显示图像
		//销毁图像

	}



	$Image1=new Image("../images/01.jpg");
	// $Image1->watermarkText("幸福了吗",20,0,50,50,0xFFFFFF,'./msyh.ttc');
	// 
	// $Image1->watermarkText("nihao",5,0,100,50,0xFFFFFF);
	$Image1->watermarkImg('../images/bowl_logo.png',10,10,0,0);
	$Image1->showImg();
?>