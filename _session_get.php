<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Hello " . $_SESSION['username'];
    echo " password: ".  $_SESSION['password'];
} else {
    echo "Please login.";
}
?>