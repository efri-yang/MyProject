<?php
	class PropertyTest{
		private $data=array();
		public $declared=1;
		private $hidden=2;
		public function __set($name,$value){
			 echo "Setting '$name' to '$value'"."<br/>";
			 $this->data[$name] = $value;
		}
		public function __get($name){
			echo "Getting '$name'"."<br/>";
			if (array_key_exists($name, $this->data)) {
	            return $this->data[$name];
	        }
		}

		public function __isset($name){
	        echo "Is '$name' set?"."<br/>";
	        return isset($this->data[$name]);
	    }

	     public function __unset($name) 
    {
        echo "Unsetting '$name'"."<br/>";
        unset($this->data[$name]);
    }


    public function getHidden() 
    {
        return $this->hidden;
    }




	}

	$obj = new PropertyTest;
	$obj->username = 1;
	$obj->username ."<br/>";


	var_dump(isset($obj->username));
	echo "<br/>";

	unset($obj->username);
	echo "<br/>";

	echo $obj->declared . "<br/>";

	echo $obj->getHidden() . "<br/>";

	echo $obj->hidden . "<br/>";

?>