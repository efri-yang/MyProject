
<?php
	function test(){
		return 10;
	}


	
class  Test{
	protected $a=111;

	protected $c;

	public function say(){
		echo $this->c;
	}

	public function age(){
		return 24;
	}

	public function tc(){
		$this->c=$this->age();
	}

	
}

	$test1=new Test();
	$test1->tc();
	echo $test1->say();
?>