<?php
namespace app\index\controller;
use think\Controller;
use think\View;
class Index extends Controller
{
    public function index()
    {
        $res=Db::table("think_auth_user")->find();
        print_r($res);
    }
}
