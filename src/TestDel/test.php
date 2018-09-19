<?php

$files = array("1.txt", "2.txt", "3.txt", "4.txt");
usort($files, function ($a, $b) {
    return strnatcmp($b, $a);
});

print_r($files);
// $increment = 7;
// $add = function ($i, $j) use ($increment) {
//     return $i + $j + $increment;
// };
// $sum = $add(1, 2);

// print_r($sum);

// $name = "yyh";
// $age = 24;
// function test() {
//     global $name, $age;
//     unset($name);
//     unset($GLOBALS['name']);
// }

// print_r($name); //yyh
// test();
// print_r($name); //undefined

// function logf() {
//     $date = date(DATE_RSS);
//     $args = func_get_args();
//     $format = array_shift($args);
//     return print "$data: " . vsprintf($format, $args) . "\n";
// }

// $dispatch = array(
//     'add' => 'do_add',
//     'commit' => 'do_commit',
//     'checkout' => 'do_checkout',
//     'update' => 'do_update',
// );

// $cmd = "";
// if (array_key_exists($cmd, $dispatch)) {
//     $function = $dispatch[$cmd];
//     call_user_func($function);
// }
// function get_file($filename) {
//     return file_get_contents($filename);
// }
// $function = 'get_file';
// $filename = '1.txt';
// print_r(call_user_func($function, $filename));
// function time_parts($time) {
//     return explode(":", $time);
// }

// list(, $munute) = time_parts('12:34:56');
// echo $munute;

// $user_1 = array("name" => "yyh01", "age" => 2401, "address" => "漳浦赤土01");
// function &array_find_value($needle, &$haystack) {
//     foreach ($haystack as $key => $value) {
//         if ($needle == $value) {
//             return $haystack[$key];
//         }
//     }
// }
// $band = &array_find_value("yyh01", $user_1);
// $band = "cccccc";
// print_r($user_1); //那么变成ccc

// $user_1 = array("name" => "yyh01", "age" => 2401, "address" => "漳浦赤土01");
// $user_2 = array("name" => "yyh02", "age" => 2402, "address" => "漳浦赤土02");

// $user_2['friend'] = &$user_1;
// $user_1['friend'] = &$user_2;

// $user_1['job'] = 'Swindler';
// $user_2['job'] = 'Accountant';

// var_export($user_2);
// // $arr = array("name" => "yyh", "age" => 24, "address" => "漳浦赤土");
// print_r('<a href="1.php?cart=' . urlencode(serialize($arr)) . '">sadfasdf</a>');
// $arr = array("name" => "yyh", "age" => 24, "address" => "漳浦赤土");

// $fp = fopen("./1.txt", "w") or die("不能打开文件");

// fputs($fp, json_encode($arr));
// fclose($fp);

// $new_arr = unserialize(file_get_contents("./1.txt"));

// print_r($new_arr);

// $arr = array("name" => "yyh", "age" => 24, "address" => "漳浦赤土");

// $fp = fopen("./1.txt", "w") or die("不能打开文件");

// fputs($fp, serialize($arr));
// fclose($fp);

// $shmop_key = ftok(__FILE__, 'p');

// $shmop_id = shmop_open($shmop_key, "c", 0600, 16384);

// $population = shmop_read($shmop_id, 0, 0);

// function track_times_called() {
//     static $i = 0;
//     $i++;
//     return $i;
// }
// echo track_times_called();
// echo track_times_called();

// $store = array("name", "age", "address");
// $store_name = "yyh";
// $store_age = 24;
// $store_address = "漳浦赤土";
// foreach ($store as $key => $value) {
//     print "$value  ${'store_' . $value}\n";
// }

?>

