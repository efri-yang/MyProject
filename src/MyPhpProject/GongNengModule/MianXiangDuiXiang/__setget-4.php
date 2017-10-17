<?php
	class Model{
		protected static function say(){
			  echo  "Model";
		}
		public static function run(){
			 static::say();

			 echo get_called_class();
		}
	}

	class Bicyle extends Model{
		protected static function say(){
			echo "Bicyle";
		}
	}

	Model::run();


?>