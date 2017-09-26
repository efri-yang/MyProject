<?php
	class ms_new_mysql{
		private $dbHost;
		private $dbUser;
		private $dbPassword;
		private $dbTable;
		private $dbConn;
		private $result;
		private $sql;
		private $pre;
		private $coding;
		private $pcon;
		private $queryNum;
		private static $daoImpl;


		public function __construct($dbHost,$dbUser,$dbPassword,$dbTable,$pre,$coding,$pcon){
			$this->dbHost=$dbHost;
			$this->dbUser=$dbUser;
			$this->dbPassword=$dbPassword;
			$this->dbTable=$dbTable;
			$this->pre=$pre;
			$this->coding=$coding;
			$this->pcon=$pcon;
			$this->connect();
			$this->select_db($dbTable);
		}

		public function __clone(){
			return self::$daoImpl;
		}

		public static function getDaoTmpl($linkConfig){

		}

		public  function connect(){
			$func=$this->pcon
		}
	}
?>