<?php
$loggedin = false;
$username = "";
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $username = $_SESSION['username'];
}
echo '
<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><strong>Fly_Forum</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="views/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Topics
                    </a>
                    <div class="dropdown-menu">';

                    $fetch_category= "SELECT `category_name`, `category_id` FROM `categories` LIMIT 5";
                    $result = mysqli_query($conn, $fetch_category);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<a class="dropdown-item" href="threads.php?categoryId='.$row['category_id'].'">'.$row['category_name'].'</a>';
                    }
                    
                    echo    '</div>
                </li>
                <li class="nav-item">
                    <a href="views/contact.php" class="nav-link text-dark">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex gap-2">';
            if (!$loggedin){
                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup">Sign up</button><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Login</button>';
            } else {
                    echo '<span class="my-auto border border-2 rounded-pill px-3 py-1 border-dark fw-bold">' . $username . '</span>';
                    echo '<a href="helper/logout.php" class="btn btn-danger">Logout</a>';
                }
            echo '</div>
        </div>
    </div>
</nav>';

include 'views/login.php';
include 'views/signup.php';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success: </strong>You have been signed up successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error: </strong>'.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>