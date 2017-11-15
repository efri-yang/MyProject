<?php
	class BaseClass{
		protected static $name;
		protected static $age=26;
		protected static $profression;

		protected static function action(){
			self::$profression="目前还是学生";
			return "[".date("Y-m-d H:i:s")."]".self::$profression;
		}

		protected function action2(){
			self::$name="李开勇";
		}
	}

	class sonClass extends BaseClass{
		private static $address="广州市天河区";
		private static $school="毕业于广州大学";
		public static function result(){
			$BaseClass=new BaseClass();
			$BaseClass->action2();

			return array(
				"名称"=>parent::$name,
				"年龄"=>parent::$age,
				"职业"=>parent::action(),
				"住址"=>self::$address,
				"毕业学校"=>self::$school
			);
		}
	}

	$rows=sonClass::result();
	var_dump($rows);
?>