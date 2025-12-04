<?php
$a = 20;
$b = 35;
$c = 12;

if ($a >= $b && $a >= $c) {
    echo "$a is the largest";
} elseif ($b >= $a && $b >= $c) {
    echo "$b is the largest";
} else {
    echo "$c is the largest";
}
?>