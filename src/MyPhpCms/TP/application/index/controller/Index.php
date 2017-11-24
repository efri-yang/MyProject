<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index(){	
    	$res=Db::query("select * from mc_article where id=?",[3]);
    	dump($res);	
    }

    public function page1(){
        return $this->fetch();
    }
	

    
}
