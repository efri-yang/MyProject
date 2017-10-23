<?php
	$arr = array(
	    0=>array(
	        'cid'=>1,
	        'pid'=>0,
	        'name'=>'亚洲',
	    ),
	    1=>array(
	        'cid'=>2,
	        'pid'=>0,
	        'name'=>'北美洲',
	    ),
	    2=>array(
	        'cid'=>3,
	        'pid'=>1,
	        'name'=>'中国',
	    ),
	    3=>array(
	        'cid'=>4,
	        'pid'=>2,
	        'name'=>'美国',
	    ),
	    4=>array(
	        'cid'=>5,
	        'pid'=>3,
	        'name'=>'北京',
	    ),
	    5=>array(
	        'cid'=>6,
	        'pid'=>3,
	        'name'=>'河北',
	    ),
	    6=>array(
	        'cid'=>7,
	        'pid'=>5,
	        'name'=>'东城区',
	    ),
	    7=>array(
	        'cid'=>8,
	        'pid'=>5,
	        'name'=>'海淀区',
	    )
	);


	function GetTree($arr,$pid,$step){
		global $tree;
	    foreach($arr as $key=>$val) {
	        if($val['pid'] == $pid) {
	            $flg = str_repeat('└―',$step);
	            $val['name'] = $flg.$val['name'];
	            $tree[] = $val;
	            GetTree($arr , $val['cid'] ,$step+1);
	        }
	    }
	    return $tree;
	}

	$newarr = GetTree($arr, 0, 0);

	print_r($newarr);
?>