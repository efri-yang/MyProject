
<?php

  class include03{
  	public static $username="yyh";
  	public static function say(){
  		echo include02::$age;
  		echo "<br/>";
  		echo include04::$range;
  		echo "<br/>";
  		echo include04::run();

  	}
  }

?>