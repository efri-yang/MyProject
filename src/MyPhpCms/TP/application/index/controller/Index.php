<?php
namespace app\index\controller;

use think\Controller;
use think\Db;



// use think\Loader;
class Index extends Controller
{
    public function index(){


    	// $res=Db::table('user')->where('id',24)->setField('email',"xxx@qq.com");
    	// $res=Db::table('user')->update(['username' => 'thinkphp','id'=>22]);
    	$res=Db::getTableInfo("user");
    	dump($res);
    	// Db::table('user')->chunk(2,function($users){
    	// 	foreach($users as $key =>$user){
    	// 		dump($user);
    	// 	}
    	// },'reg_time',"asc");

    	//第一种方式::$res 返回的是一个数组，没有数据返回的是空数组
    	// $res=Db::table("user")->query("select * from user where id=?",[1]);
    	// dump($res);

	    	//变种1
	    	// $res=Db::table("user")->query("select * from user where id=13");
	    	// dump($res);


    	//方法2
    	//返回一条数据，没有数据就返回NULL
    	// $res=Db::table("user")->find();
    	// dump($res);
    		
    		// $res=Db::table("user")->where("id",13)->find();
    		// dump($res);
    	
    	//方法3 返回所有的数据，是一个数组。没有数据的时候就返回一个空数组 
    		// $res=Db::table("user")->where('id',13)->column('username','email');
    		// dump($res);
    	

    	//方法4 助手函数，使用这个函数她会重新连接数据库，而Db::name
    		// $res=db("user")->select();
    		// dump($res);

    	//方法5  Query对象
    	//
  //   	$query = new \think\db\Query();
		// $query->table('user')->where('id',13);
		// $res=Db::select($query);
		// dump($res);
		
    	//方法6  闭包函数 返回的是对象
		// $res=Db::select(function($query){
		// 	$query->table('user')->where('id',1);
		// });

		// dump($res);



    	
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
    }
}
