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

    <div class="container my-5">
        <h2 class="mb-4 text-center">
            Browse Categories
        </h2>
        <div class="row px-5">
        <?php
        $all_categories = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $all_categories);
        while ($row = mysqli_fetch_assoc($result)){
            echo '  <div class="col-md-4 mb-4">
            <div class="card bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">'. $row['category_name'] .'</h5>
                    <p class="card-text">'. substr($row['category_description'], 0, 50) .'...</p>
                    <a href="threads.php?categoryId=' . $row['category_id'] . '" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>';
        }
        ?>
        </div>
    </div>

    <?php include 'views/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>