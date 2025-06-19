<?php

for ($y = 0; $y < 5; $y++) {

    for ($x = 0; $x < $y; $x++) {
        echo "*";
    }
    echo "<br>";
}
for ($y = 5; $y > 0; $y--) {

    for ($x = 0; $x < $y; $x++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for ($y = 0; $y < 5; $y++) {
    for ($x = 0; $x <= 10; $x++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

$xyz = 11;

for ($y = 0; $y <= 5; $y++) {
    for ($z = 0; $z < $y; $z++) {
        echo "&nbsp&nbsp";
    }
    for ($x = 0; $x < $xyz; $x++) {
        echo "*";
    }
    echo "<br>";

    $xyz-=2;
}

echo "<br>";

$xyz = 1;

for ($y = 5; $y >= 0; $y--) {
    for ($z = 0; $z < $y; $z++) {
        echo "&nbsp&nbsp";
    }
    for ($x = 0; $x < $xyz; $x++) {
        echo "*";
    }
    echo "<br>";

    $xyz+=2;
}
?>