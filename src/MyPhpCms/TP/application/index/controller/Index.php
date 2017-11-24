<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;

class Index extends Controller
{
    public function index(){	

        
        // $result=Db::query('select * from mc_article where id=?',[8]);
        // echo $result;

        return $this->fetch();
	
    }

    public function page1(){
        return $this->fetch();
    }
	

    
}
