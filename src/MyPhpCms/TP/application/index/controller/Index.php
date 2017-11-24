<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
class Index extends Controller
{
    public function index(){	

        $this->assign('name',"yyh");
        return $this->fetch();
	
    }

    public function page1(){
        return $this->fetch();
    }
	

    
}
