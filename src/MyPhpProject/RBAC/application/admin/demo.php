<?php

$arr=array(
		"1"=>array(
            "id" => 1,
            "username" =>"admin",
            "rid" => 1,
            "pid" => 0,
            "sub" => array
                (
                    "2" => array
                        (
                            "id" => 2,
                            "username" => "ptadmin",
                            "rid" => 2,
                            "pid" => 1,
                            "sub" => array
                                (
                                    "1" => array
                                        (
                                            "id" =>3,
                                            "username" => "user",
                                            "rid" => 3,
                                            "pid" => 2,
                                            "sub" =>array() 
                                        )

                                )

                        )

                )
            )

        );



function getData($arr,$id){
	foreach($arr as $k => $v){
	            if($v['pid']==$id){
	               $data[$k]=$v;
	            }
	            if(!!count($v["sub"])){
	            	$data[$k]["sub"]=getData($v["sub"],$v["id"]);
	            }
	        }
	return isset($data)?$data:array();
	
	
}

print_r(getData($arr,2));



// function getData($data,$pid){
// 	foreach($data as $k => $v){
// 		if($v["pid"]==$pid){

			
// 		}
// 		if(count($v["sub"])){
				
// 				foreach($data as $k => $v){
// 					if($v["pid"]==$pid){

						
// 					}
// 					if(count($v["sub"])){
						

// 						$data=(function(){
// 							foreach($data as $k => $v){
// 								if($v["pid"]==$pid){
// 									
									
// 								}
// 								if(count($v["sub"])){
									
// 								}
// 							}
// 							return isset($data)?$data:array(); array()孔
// 						})()
// 					}
// 				}
// 				


// 		}
// 	}
// }


?>


