<?php
$is_insert = false;
$is_delete = false;
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "notes_db";
$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
?>