<!-- In PHP, variables starts with '$' -->

<?php
# variables

$x = 5;
$y = 10;
echo "Sum of x + y = ". $x+$y;
echo "<br>";

?>

<?php

$name = "Hemant";

print "Hello ". $name;
echo "Hello $name, How are you doing?";
echo "<br>";

?>

<?php

$a = 13;

# var_dump() function returns the data type and the value.
var_dump($a);
echo "<br>"

?>

<?php
$a = 1; /* global scope */ 

function test()
{ 
    global $a; # "global" keyword used to access a global variable from within a function.
    echo $a; /* reference to local scope variable */ 
} 

test();
?>

<?php

# local scope
function localVar(){
    $a = 10;
    echo $a;
}

localVar();
?>

<?php
# static scope
function staticVar(){
    static $a = 10;
    echo $a;
    $a++;
}

staticVar();
staticVar();

?>