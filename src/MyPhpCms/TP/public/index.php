<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录




//当前内容写在哪个文件就显示这个文件目录  不会随着include 的改变而改变
//G:\xampp\htdocs\MyProject\src\MyPhpCms\thinkphp\public
define('APP_PATH', __DIR__ . '/../application/');

define('CONF_PATH',__DIR__.'/../conf/');


// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
