<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>fly - forum</title>
</head>

<body>
    <?php include 'helper/db_connet.php' ?>
    <?php include 'views/header.php' ?>
    <?php
    $cat_id = $_GET['categoryId'];
    $find_category = "SELECT * from `categories` WHERE `category_id` = '$cat_id'";
    $result = mysqli_query($conn, $find_category);
    $row = mysqli_fetch_assoc($result);
    $title = $row['category_name'];
    $description = $row['category_description'];
    $created_at = $row['created_at'];
    ?>

    <?php
    $show_alert = false;
    $req_method = $_SERVER['REQUEST_METHOD'];

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        $userId = $_SESSION['user_id'];
        if ($req_method == 'POST'){
            $thread_title = $_POST['thread_title'];
            $thread_title = str_replace("<", "&lt;", $thread_title);
            $thread_title = str_replace(">", "&gt;", $thread_title);
            $thread_description = $_POST['thread_description'];
            $thread_description = str_replace("<", "&lt;", $thread_description);
            $thread_description = str_replace(">", "&gt;", $thread_description);
            
            $thread_insert_query = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `created_at`) VALUES ('$thread_title', '$thread_description', '$cat_id', '$userId', current_timestamp());";
            $result = mysqli_query($conn, $thread_insert_query);
            $show_alert = true;
            if($show_alert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success: </strong>Thread recorded.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    }

    ?>

    <div class="container my-5 py-5">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;  ?> - FORUM</h1>
            <p class="lead"><?php echo $description;  ?></p>
            <hr class="my-4">
            <p class="text-secondary">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>Posted at:<em> <?php echo substr($created_at, 0, 10);  ?> </em></p>
        </div>
    </div>

    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container my-5 pb-3">
        <h3 class="my-3">Start a Thread</h3>
        <form method="post" action="' . $_SERVER["REQUEST_URI"]. '">
            <div class="mb-3">
                <input type="text" class="form-control" name="thread_title" placeholder="title...">
            </div>
            <div class="mb-3">
                <textarea type="text" class="form-control" name="thread_description" placeholder="explain your problem..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>';
    } else {
        echo '<div class="container my-5 pb-3">
        <h3 class="my-3">Start a Thread</h3>
        <form>
        <fieldset disabled>
            <div class="mb-3">
                <input type="text" class="form-control" name="thread_title" placeholder="login to access">
            </div>
            <div class="mb-3">
                <textarea type="text" class="form-control" name="thread_description" placeholder="login to access"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    </div>';
    }
    ?>

    <div class="container my-5 pb-5">
        <h3 class="my-3">Active Threads</h3>
        <?php
        $cat_id = $_GET['categoryId'];
        $find_threads = "SELECT * from `threads` WHERE `thread_category_id` = '$cat_id'";
        $result = mysqli_query($conn, $find_threads);
        $resultFound = false;
        while ($row = mysqli_fetch_assoc($result)) {
            $resultFound = true;
            $user_name = getUserDetails($conn, $row['thread_user_id']);
            echo '<div class="d-flex mt-3">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mt-0"><a href="thread.php?threadId=' . $row['thread_id'] . '">' . $row['thread_title'] . '</a></h5>
                    ' . $row['thread_description'] . ' <div class="d-flex justify-content-end gap-2"><p class="mt-2"> edited: '. substr($row['created_at'], 0, 10) .'</p><p class="fw-bold mt-2">'. $user_name .'</p></div>
                </div>
            </div>';
        }
        if (!$resultFound) {
            echo '<h4>Ask questions...</h4>';
        }

        function getUserDetails($conn, $user_id){
            $find_user = "SELECT `username` FROM `users` WHERE `user_id` = $user_id";
            $result = mysqli_query($conn, $find_user);
            $row = mysqli_fetch_assoc($result);
            return $row['username'];
        }
        ?>
    </div>

    <?php include 'views/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>