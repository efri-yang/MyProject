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



<?php
                                    $tree=new Tree();
                                    $resHData=$tree->vTree($resData,$roleData["pid"]);



                                    foreach ($resHData as $key => $v) {
                                        
                                ?>
                                        <tr>
                                            <td><?php echo $v['name']. ?></td>
                                            <td>
                                            <?php 
                                                if($v["pid"]==$roleData["pid"]){
                                                    //当前角色 角色是超级管理员
                                            ?>  
                                                    <a href="roleInfo.php?id=<?php echo $v['id']; ?>" class="btn btn-info mr10">查看</a>
                                                
                                            
                                            <?php       
                                                }
                                             ?>
                                                <!-- <a href="roleInfo.php?id=<?php echo $v['id']; ?>" class="btn btn-info mr10">查看</a>
                                                <a href="roleEdit.php?id=<?php echo $v['id']; ?>" class="btn btn-info mr10">修改</a>
                                                <a href="roleDelDo.php?id=<?php echo $v['id']; ?>" class="btn btn-danger">删除</a> -->
                                            </td>
                                        </tr>
                                <?php       
                                    }
                                ?>
