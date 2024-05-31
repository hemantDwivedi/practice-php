<?php

$login = false;
$show_error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include '_dbconnet.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  // $search_query = "SELECT * FROM `auth_info` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
  $search_query = "SELECT * FROM `auth_info` WHERE `username` = '$username'";
  $result = mysqli_query($conn, $search_query);
  $len = mysqli_num_rows($result);
  if ($len == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome_page.php");
      }
      else {
        $show_error = "Invalid credentials.";
      }
    }
  } else {
    $show_error = "Invalid credentials.";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Login</title>
</head>

<body>
  <?php require '_nav.php' ?>

  <div class="container w-25 mt-5">
    <h1 class="mb-3">Login</h1>
    <form action="/learn-php/login/login.php" method="post" class="mb-3">
      <div class="mb-3">
        <input name="username" type="text" class="form-control" id="username" placeholder="Username">
      </div>
      <div class="mb-3">
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php
    if ($login) {
      echo '<div class="alert alert-success" role="alert">
            login successful
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