<?php

// COLUMN 1: Stars
for ($i = 1; $i <= 3; $i++) {

    // Print stars
    for ($s = 1; $s <= $i; $s++) {
        echo "*";
    }

    echo " &nbsp;&nbsp;&nbsp; ";  // spacing between columns

    // COLUMN 2: Numbers decreasing by row
    for ($n = 1; $n <= 4 - $i; $n++) {
        echo $n . " ";
    }

    echo " &nbsp;&nbsp;&nbsp; ";  // spacing between columns

    // COLUMN 3: Increasing letters
    $letterCount = $i;  
    static $letter = 'A';

    for ($k = 1; $k <= $letterCount; $k++) {
        echo $letter . " ";
        $letter++;
    }

    echo "<br>";
}
?>
