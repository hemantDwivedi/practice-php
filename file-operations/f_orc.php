<?php

$fpt = fopen("data.txt", "r") or die("Unable to open file.");

// echo fread($fpt, filesize("data.txt"));

// while ($a=fgets($fpt)) {
//     echo $a;
// }

while ($a=fgets($fpt)) {
    echo $a;
}

fclose($fpt);

?>