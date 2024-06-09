<?php

class Human {
    private $name;

    function __construct($name){
        $this->name = $name;
    }

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }
}

class Hemant extends Human {
    function print(){
        echo 'I am derived class <br>';
    }
}

$hemant = new Hemant("John");
$hemant->print();
echo $hemant->get_name();
$hemant->set_name("Hemant");
echo $hemant->get_name();

?>