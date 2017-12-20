<?php
	class Tree{
		//垂直数据
		/**
		 * $data=[
		 * 		2=>[id:2,pid:0....]
		 *   			
		 * ]
		 *  $pid= $v["id"]=2  vTree($arr,2)
		 * 
		 * 	pid=2的元素
		 *
		 */
		public function hTree($arr,$pid=0){
	        foreach($arr as $k => $v){
	            if($v['pid']==$pid){
	                $data[$v['id']]=$v;
	                $data[$v['id']]['sub']=self::hTree($arr,$v['id']);
	            }
	        }
	        return isset($data)?$data:array();
	    }
	}

?>