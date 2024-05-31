<?php

$show_alert = false;
$show_error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnet.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    $exists_query = "SELECT `username` FROM `auth_info` WHERE `username` = '$username';";
    $username_found = mysqli_query($conn, $exists_query);

    if (mysqli_num_rows($username_found) > 0) {
        $show_error = "Username already exists";
    } else {
        if (($password == $confirm_password)) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO `auth_info` (`username`, `password`) VALUES ('$username', '$hash_password');";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                $show_alert = true;
            }
        } else {
            $show_error = "Password does not match";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign up</title>
</head>

<body>
    <?php require '_nav.php' ?>

    <div class="container w-25 mt-5">
        <h1 class="mb-3">Sign up</h1>
        <form method="post" action="/learn-php/login/sign_up.php">
            <div class="mb-3">
                <input name="username" type="text" class="form-control" id="username" placeholder="Username" maxlength="11">
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" maxlength="24">
            </div>
            <div class="mb-3">
                <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Sign up</button>
        </form>

        <?php
        if ($show_alert) {
            echo '<div class="alert alert-success" role="alert">
            Sign up successful.
            </div>';
        }
        if ($show_error) {
            echo '<div class="alert alert-danger" role="alert">
            ' . $show_error . '
            </div>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>