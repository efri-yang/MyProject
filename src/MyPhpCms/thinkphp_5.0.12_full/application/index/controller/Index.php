<?php
namespace app\index\controller;
use think\View;
class Index extends Controller
{
    public function index()
    {
        $this->assign('name','ThinkPHP');
        return $this->fetch('index');
    }
}
