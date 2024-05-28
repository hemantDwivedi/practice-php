<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "form_data";

# creating database connection
$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
echo "connected";

# creating database
$create_database = "CREATE DATABASE form_data";
mysqli_query($conn, $create_database);

# creating table
$query = "CREATE TABLE employees (`sno` INT(6) NOT NULL, `name` TEXT NOT NULL);";
mysqli_query($conn, $query);

# insert data into table
    $query = "INSERT INTO `employees` (`sno`, `name`) VALUES (3, 'rohan');";
    mysqli_query($conn, $query);
?>