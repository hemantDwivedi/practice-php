<?php

# file writing
// $fpt = fopen("note.txt", "w") or die("Unable to open file.");
// fwrite($fpt, "Check the meeting schedule.");

# file append
$fpt = fopen("note.txt", "a") or die("Unable to open file.");
fwrite($fpt, "Check the meeting schedule. If you are available.");


fclose($fpt);

?>