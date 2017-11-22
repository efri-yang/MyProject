<?php 
	return [
		'hello/:id' =>['index/index/index',['ext'=>'shtml'],['id'=>'\d{4}']],
	];
	// use think\Route;
	// Route::get('/index',function(){
	// 	return 'Hello,world!';
	// });

	Route::rule('new/:id','index/index/info');
?>