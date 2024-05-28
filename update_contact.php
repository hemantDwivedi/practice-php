<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "contact_info";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if (!$conn) {
            die("connection failed: " . mysqli_connect_error());
        }

        $update_query = "UPDATE `contacts` SET `name` = '$name', `email` = '$email', `salary` = '$salary' WHERE `contacts`.`sno` = 1;";
        $success = mysqli_query($conn, $update_query);

        if ($success) {
            echo '<div class="alert alert-success" role="alert">
                updated successfully
              </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Warning: cannot save record now
              </div>';
        }
    }
    ?>
    <div class="container p-5">
        <h1>Update</h1>
        <form method="post" action="/learn-php/update_contact.php">
            <div class="mb-3">
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <input name="salary" type="text" class="form-control" placeholder="Salary">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>