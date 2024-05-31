<?php
session_start();
$_SESSION['username'] = "user";
$_SESSION['password'] = "12345";
echo "session saved!"
?>