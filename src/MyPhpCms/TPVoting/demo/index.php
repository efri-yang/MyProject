<?php

// function parseName($name, $type = 0, $ucfirst = true) {
// 	if ($type) {
// 		$name = preg_replace_callback('/_([a-zA-Z])/', function ($match) {
// 			return strtoupper($match[1]);
// 		}, $name);
// 		return $ucfirst ? ucfirst($name) : lcfirst($name);
// 	} else {
// 		return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
// 	}
// }
//
// array(
// 		
// 		2=>array(
// 			parent_id=>0,
// 			menu_id=>2
// 		)
// 		3=>array(
// 			parent_id=>2,
// 			menu_id=>3
// 		)
// )



function  getCurrentNav($arr, 3, $parent_ids = array(), $current_nav = '') {
	$a = $newarr = array();
	if (is_array($arr)) {
		foreach ($arr as $id => $a) {
			if ($a['menu_id'] == $myid) {
				if ($a['parent_id'] != 0) {
					array_push($parent_ids, $a['parent_id']);
					//$parent_ids=[2]
					$ru = '<li><a><i class="fa ' . $a['icon'] . '"></i> ' . $a['title'] . '</a></li>';
					$current_nav = $ru . $current_nav;
					$temp_result =getCurrentNav($arr,$parent_id=2 ,[2], '<li><a href=''>操作日志</a></li>') {
						$a = $newarr = array();
						if (is_array($arr)) {
							foreach ($arr as $id => $a) {
								if ($a['menu_id'] == $myid==2) {
									if ($a['parent_id'] != 0) {
										array_push([2], [1]);
										$ru = '<li><a><i class="fa ' . $a['icon'] . '"></i> ' . $a['title'] . '</a></li>';
										$current_nav="<li><a href=''>日志管理</a></li>"
										//当$a['parent_id']=0 的时候，这个时候返回的是完整的
										$temp_result =getCurrentNav($arr,$parent_id=1 ,[2,1], '<li>...') {
											return !empty([$parent_ids, $current_nav]) ? [$parent_ids, $current_nav] : false;
										}====[$parent_ids, $current_nav]=[[2,1],"<li>...</li><li>...</li>"]
										$parent_ids = $temp_result[0];
										$current_nav = $temp_result[1]; //一系列字符窜<li></li>
									}
								}
							}
						}
						return !empty([$parent_ids, $current_nav]) ? [$parent_ids, $current_nav] : false;


					}====[$parent_ids, $current_nav]=[[2,1],"<li>...</li><li>...</li>"]
					
					$parent_ids = $temp_result[0];
					$current_nav = $temp_result[1]; //一系列字符窜<li></li>

				}
			}
		}
	}

	return !empty([$parent_ids, $current_nav]) ? [$parent_ids, $current_nav] : false;
}
?>