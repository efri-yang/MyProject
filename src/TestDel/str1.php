<?php

// 11
function lookandsay($s) {
    $r = '';
    $m = $s[0]; //第一次的时候$s不是字符窜$s[0]就是空
    $n = 1;
    for ($i = 1, $j = strlen($s); $i < $j; $i++) {
        if ($s[$i] == $m) {
            $n++;
        } else {
            $r .= $n . $m;
            $m = $s[$i];
            $n = 1;
        }
    }
    return $r . $n . $m;

}

print substr("watch out for thatxree", -5);

?>