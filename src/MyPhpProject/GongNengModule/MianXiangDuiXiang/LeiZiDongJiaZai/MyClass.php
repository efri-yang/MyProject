<?php
$step=0;
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});
echo "xxxx<br/>";
$obj  = new MyClass1();
echo "xxxx<br/>";

$obj2 = new MyClass2();
?>