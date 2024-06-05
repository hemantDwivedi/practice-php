<?php
$show_error = false;
$show_alert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db_connet.php';
    $username = $_POST['username'];
    $user_email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $confirm_password = $_POST['signupConfirmPassword'];

    $email_exists = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$user_email'";
    $result = mysqli_query($conn, $email_exists);
    $rec_length = mysqli_num_rows($result);

    if ($rec_length > 0) {
        $show_error = "Email or Username already exists";
    } else {
        if ($password == $confirm_password) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_user = "INSERT INTO `users` (`username`, `email`, `password`, `created_at`) VALUES ('$username', '$user_email', '$hash_password', current_timestamp());";
            $result = mysqli_query($conn, $insert_user);
            if ($result) {
                $show_alert = true;
                header("location: /learn-php/fly-forum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $show_error = "Password do not match";
        }
    }
    header("location: /learn-php/fly-forum/index.php?signupsuccess=false&error=$show_error");
}
