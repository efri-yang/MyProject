<?php
//引入配置文件
require ('config.php');
//向模板文件中传递值
$smarty->assign('text','hello Smarty dsfdasdf');
//渲染模板
$smarty->display('start.tpl');
?>