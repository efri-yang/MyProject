<?php
	/**
	 * 画布的大小
	 * 
	 * 验证码类型(1 数字 2 字母  3 数字字母类型)
	 * 验证码长度
	 * 填充的背景颜色
	 * 像素点$pixed_num
	 * 干扰线$line_num
	 */
	class VerifyImage{

		public $captchCode;
		private function contentType($type){
			$type=strtolower($type);
			$content;
			switch ($type) {
				case 'png':
					$content="image/png";
					break;
				case 'jpg':
					$content="image/jpeg";
					break;
				case 'jpeg':
					$content="image/jpeg";
					break;
				default:
					$content="image/png";
					break;
			}
		}
		//增加点点靠高元素
		private function pixedDraw($image,$num,$w,$h){
			for($i=0;$i<$num;$i++){
				$pointColor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
				imagesetpixel($image,rand(1,$w-1),rand(1,$h-1),$pointcolor);
			}
		}

		//增加线
		private function lineDraw($image,$num,$w,$h){
			for($i=0;$i<$num;$i++){
				$linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));   
       			imageline($image,rand(1,$w),rand(1,$h),rand(1,$w),rand(1,$h),$linecolor);
			}
			
		}

		private function captchCodeDraw($image,$codeType,$length,$w,$h){
			$captchVal;
			$fontsize=6;
			switch ($codeType) {
				case 1:
					$captchVal="123456789";
					break;
				case 2:
					$captchVal="abcdefghigklmnopqrstuvwxyz";
					break;
				case 3:
					$captchVal="abcdefghigklmnopqrstuvwxyz123456789";
					break;
				default:
					$captchVal="123456789";
					break;
			}
			for($i=0;$i<$length;$i++){
				$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
				$captchContent=substr($captchVal,rand(0,strlen($captchVal)-1),1);
				$this->captchCode.=$captchContent;
				$x=($i*$w/4)+rand(5,10);
	   			$y=rand(5,10);
	   			imagestring($image,$fontsize,$x,$y,$captchContent,$fontcolor);   
			}
		}

		public function createVerifyImage($w=100,$h=40,$codeType=1,$length=4, $fontSize=6,$imgType="png",$pixedNum=80,$lineNum=4,$bgcolor=[255,255,255]){
			$image=imagecreatetruecolor($w,$h);
			$bgcolor=imagecolorallocate($image,$bgcolor[0],$bgcolor[1],$bgcolor[2]);
			imagefill($image,0,0,$bgcolor);

			$this->captchCodeDraw($image,$codeType,$length,$w,$h);

			if(!!$pixedNum){
				$this->pixedDraw($image,$pixedNum,$w,$h);
			}

			if(!!$lineNum){
				$this->lineDraw($image,$lineNum,$w,$h);
			}

			$contentType=$this->contentType($imgType);
			header("content-type:".$contentType);
		    imagepng($image);
		    imagedestroy($image);

		}
	}


	

	
?>