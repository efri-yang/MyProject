<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
class Index extends Controller
{
    public function index()
    {	

    	// $list=[
    	// 	'user1'=>[
    	// 		'name'=>'y1',
    	// 		'email'=>'01'
    	// 	],
    	// 	'user2'=>[
    	// 		'name'=>'y2',
    	// 		'email'=>'02'
    	// 	],
    	// 	'user3'=>[
    	// 		'name'=>'y3',
    	// 		'email'=>'03'
    	// 	]
    	// ];

    	// $list=[];
    	// $this->assign('list',$list);
    	// return $this->fetch();
		
		// return $this->fetch('index',['name'=>'thinkphp']);
		// return $this->display("xxxxx{name}",['name'=>"yyh"]);
        
        // return view("index",['name'=>'thinkphp']); 
        // 
      
        // return $this->fetch("index",['name'=>"yyh"]);
        $this->assign('name',"yyh");
        return $this->fetch();
	
    }

	

    
}
