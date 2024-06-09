<?php

abstract class Template {
    abstract public function message();
}

class Greeting extends Template {
    function message()
    {
     echo "This function is defined.";
    }
}

$obj = new Greeting();
$obj->message();

?>