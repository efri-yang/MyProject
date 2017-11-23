<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
class Index extends Controller
{
    public function index()
    {	

    	$list=[
    		'user1'=>[
    			'name'=>'y1',
    			'email'=>'01'
    		],
    		'user2'=>[
    			'name'=>'y2',
    			'email'=>'02'
    		],
    		'user3'=>[
    			'name'=>'y3',
    			'email'=>'03'
    		]
    	];

    	$list=[];
    	$this->assign('list',$list);
    	return $this->fetch();	
		
		
		
    }

	

    
}
