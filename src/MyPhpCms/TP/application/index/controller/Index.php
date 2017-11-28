<?php
namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
use think\Db;
use app\index\model\User2;

// use think\Loader;
class Index extends Controller
{
    public function index(){
    	
    	// $res=Db::connect()->query("select * from user where id=?",[14]);
    	// $query=new \think\db\Query();
    	// $query->table('user')->where('id',13);
    	// $res=Db::find($query);
    	//
    	
    	// $db=Db::table('user');
    	// //返回的是影长的行数
    	// $res=$db->where('id',"in","[1,2,3,4]")->where('id',"in","[1,2,3,5]")->buildSql();
    	// $res=Db::table('user')->where('id',13)->select();
    	// $res=Db::query("select * from user where id=?",[13]);
    	// $res=Db::execute("insert into user(username,password) value(?,?)",["yyhxx",md5("root")]);
    	
    
    	// $res=User::get(function($query){
    	// 	$query->where("id","eq",14);
    	// });
    	// $res=User::all(function($query){
    	// 	$query->where("id","<",20)->field("id,email");
    	// });
    	
    	// foreach($res as $val){
    	// 	dump($val->toArray());
    	// }
    	// $res->toArray();
    	// dump($res);
    	// return "Xxxx";
    	// $res=User::create([
    	// 	'username'=>'yyh1asdfasfasfd',
    	// 	'password'=>md5('imooc'),
    	// 	'email'=>'948061564@qq.com'
    	// ]);
    	
    	// $userModel=new User;
    	// $userModel->username='17771258';
    	// $userModel->email='17777@qq.com';
    	// $userModel=new User;
    	// $userModel->save(["username"=>"asdfas","password"=>md5("imooc")]);

    	// dump($userModel->id);
    	
    	$res=User2::get(2);
    	echo $res->sex;
    	 
    	
    }
}
