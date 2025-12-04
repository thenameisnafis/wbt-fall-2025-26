<?php

$arr = array(16, 25, 40, 45, 69);
$search = 40;
$found = false;

for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] == $search) {
        $found = true;
        break;
    }
}


if ($found) {
    echo "$search found in the array.";
} else {
    echo "$search not found in the array.";
}
?>

