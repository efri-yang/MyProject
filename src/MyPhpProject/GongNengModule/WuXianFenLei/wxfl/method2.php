<?php  
	class ClassTree {
    /**
     * 分类排序（降序）
     */
	    static public function sort($arr,$cols){
	        //子分类排序
	        
	        foreach ($arr as $k => &$v) {
	
	        	//横向分类树 那么 $v["sub"] 是不存在的
	            if(!empty($v['sub'])){
	                $v['sub']=self::sort($v['sub'],$cols);
	            }
	            //array(0)=$v
	            $sort[$k]=$v[$cols];   
	        }
	        if(isset($sort))
	        	//对多个数组或多维数组进行排序
	            // array_multisort($sort,SORT_ASC,$arr);
	            array_multisort($sort,SORT_ASC,$arr);
	        	        	//$arr 对应$sort
	        	//第二个数组里的项目对应第一个数组后也进行了排序。

	        return $arr;
	    }
	    /**
	     * 横向分类树
	     */
	    static public function hTree($arr,$pid=0){
	        foreach($arr as $k => $v){
	            if($v['pid']==$pid){
	                $data[$v['id']]=$v;
	                $data[$v['id']]['sub']=self::hTree($arr,$v['id']);
	            }
	        }
	        return isset($data)?$data:array();
	    }
	    /**
	     * 纵向分类树
	     */
	    static public function vTree($arr,$pid=0){
	        foreach($arr as $k => $v){
	            if($v['pid']==$pid){
	                $data[$v['id']]=$v;
	                $data+=self::vTree($arr,$v['id']);
	            }
	        }
	        return isset($data)?$data:array();
	    }
	}

	$arr=Array(
		array("id"=>1,"name"=>"前端专区","pid"=>0,"sort"=>0),
		array("id"=>3,"name"=>"HTML栏目","pid"=>1,"sort"=>0),
		array("id"=>4,"name"=>"JS栏目","pid"=>1,"sort"=>2),
		array("id"=>5,"name"=>"CSS栏目","pid"=>1,"sort"=>1),
		array("id"=>2,"name"=>"后端专区","pid"=>0,"sort"=>2),
		array("id"=>6,"name"=>"PHP栏目","pid"=>2,"sort"=>0),
		array("id"=>7,"name"=>"JAVA栏目","pid"=>2,"sort"=>1),
		array("id"=>8,"name"=>"RUBY","pid"=>2,"sort"=>2),
		array("id"=>9,"name"=>"测试专区","pid"=>0,"sort"=>1),
		array("id"=>10,"name"=>"测试栏目1","pid"=>9,"sort"=>1),
		array("id"=>11,"name"=>"测试栏目2","pid"=>9,"sort"=>2),
		array("id"=>12,"name"=>"测试栏目3(专区)","pid"=>9,"sort"=>0),
		array("id"=>13,"name"=>"测试栏目3-1","pid"=>12,"sort"=>0),
		array("id"=>14,"name"=>"测试栏目3-2","pid"=>12,"sort"=>1)
	);
	

	// $arr=ClassTree::sort($arr,'sort');

	$data2=ClassTree::hTree($arr);
	$arr=ClassTree::sort($data2,'sort');

	// print_r($arr);

	// $data=ClassTree::hTree($arr);

	// print_r(json_encode($data));


?>