<?php
$show_error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db_connet.php';
    $username = $_POST['username'];
    $password = $_POST['loginPassword'];

    $find_user = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $find_user);
    $rec_length = mysqli_num_rows($result);

    if ($rec_length == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            header("location: /learn-php/fly-forum/index.php?loginsuccess=true");
            exit();
        }
    }
    $show_error = "Username or Password is incorrect";
    header("location: /learn-php/fly-forum/index.php?loginsuccess=false&error=$show_error");
}
?>