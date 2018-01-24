<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

define('THINK_VERSION', '5.0.12');
define('THINK_START_TIME', microtime(true)); // microtime() 函数返回当前 Unix 时间戳的微秒数
define('THINK_START_MEM', memory_get_usage()); //memory_get_usage — 返回分配给 PHP 的内存量
define('EXT', '.php');
//DIRECTORY_SEPARATOR是php的内部常量，不需要任何定义与包含即可直接使用,不同操作系统的兼容问题
define('DS', DIRECTORY_SEPARATOR);  //http://blog.csdn.net/wjc19911118/article/details/12943487
//THINK_PATH=..../thinkphp/
defined('THINK_PATH') or define('THINK_PATH', __DIR__ . DS);//defined() 函数检查某常量是否存在。 不存在执行or 后面的函数
//LIB_PATH=..../thinkphp/library/
define('LIB_PATH', THINK_PATH . 'library' . DS);

//CORE_PATH=..../thinkphp/library/think/
define('CORE_PATH', LIB_PATH . 'think' . DS);

//TRAIT_PATH=..../thinkphp/library/traits/
define('TRAIT_PATH', LIB_PATH . 'traits' . DS);

//APP_PATH=G:/xampp/htdocs/MyProject/src/MyPhpCms/TP/public  指向public 所以在入口文件中定义的时候 就不会应用是默认的值
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);

//dirname 返回目录部分(返回 path 的父目录)
//realpath('./../../etc/passwd'); 返回绝对路劲  /etc/passwd  这个有事
//ROOT_PATH=G:\xampp\htdocs\MyProject\src\MyPhpCms\TP
defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
//EXTEND_PATH=G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\extend\   扩展类库目录
defined('EXTEND_PATH') or define('EXTEND_PATH', ROOT_PATH . 'extend' . DS);

//VENDOR_PATH=G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\vendor\   第三方类库目录
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);

//应用的运行时目录  G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\runtime\
defined('RUNTIME_PATH') or define('RUNTIME_PATH', ROOT_PATH . 'runtime' . DS);

//G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\runtime\log\
defined('LOG_PATH') or define('LOG_PATH', RUNTIME_PATH . 'log' . DS);
defined('CACHE_PATH') or define('CACHE_PATH', RUNTIME_PATH . 'cache' . DS);
defined('TEMP_PATH') or define('TEMP_PATH', RUNTIME_PATH . 'temp' . DS);

//CONF_PATH=G:/xampp/htdocs/MyProject/src/MyPhpCms/TP/public  
defined('CONF_PATH') or define('CONF_PATH', APP_PATH); // 配置文件目录
defined('CONF_EXT') or define('CONF_EXT', EXT); // 配置文件后缀
defined('ENV_PREFIX') or define('ENV_PREFIX', 'PHP_'); // 环境变量的配置前缀

// 环境常量
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false); //操作系统

// 载入Loader类
// ..../thinkphp/library/think/Loader.php
require CORE_PATH . 'Loader.php';

// 加载环境变量配置文件
// G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\.env  环境变量配置文件存在
if (is_file(ROOT_PATH . '.env')) {
    $env = parse_ini_file(ROOT_PATH . '.env', true);
    foreach ($env as $key => $val) {
        $name = ENV_PREFIX . strtoupper($key);
        if (is_array($val)) {
            foreach ($val as $k => $v) {
                $item = $name . '_' . strtoupper($k);
                putenv("$item=$v");
            }
        } else {
            putenv("$name=$val");
        }
    }
}

// 注册自动加载
\think\Loader::register();

// 注册错误和异常处理机制
\think\Error::register();

// 加载惯例配置文件
\think\Config::set(include THINK_PATH . 'convention' . EXT);
