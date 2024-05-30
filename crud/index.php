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

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $is_delete = true;
    $delete_query = "DELETE FROM `notes` WHERE `sno` = $sno";
    mysqli_query($conn, $delete_query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        # Update record
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $desc = $_POST['descriptionEdit'];
        $update_query = "UPDATE `notes` SET `title` = '$title', `description` = '$desc' WHERE `notes`.`sno` = $sno;";
        mysqli_query($conn, $update_query);
    } else {
        # Insert record
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $insert_query = "INSERT INTO `notes` (`title`, `description`, `created_at`) VALUES ('$title', '$desc', current_timestamp());";
        $success = mysqli_query($conn, $insert_query);

        if ($success) {
            $is_insert = true;
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <title>PHP - CRUD</title>
</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditModalLabel">Edit</h1>
                </div>
                <div class="modal-body">
                    <form action="/learn-php/crud/index.php" method="post">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="titleEdit" class="form-control" id="titleEdit">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="descriptionEdit" type="text" class="form-control" id="descriptionEdit"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TODO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 w-50">
        <h3 class="mb-3">Add Note...</h3>
        <?php
        if ($is_insert) {
            echo '<div class="alert alert-success" role="alert">
            saved successfully
          </div>';
        }
        if ($is_delete) {
            echo '<div class="alert alert-danger" role="alert">
            Record deleted
          </div>';
        }
        ?>
        <form action="/learn-php/crud/index.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <div class="container my-4">
        <h3>Notes</h3>
        <table class="table mt-3" id="notes_table">
            <thead>
                <th>S.NO</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                $select_query = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $select_query);
                # display data
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo var_dump($row);
                    echo "<tr><td>" . $row['sno'] . "</td>" .
                        "<td>" . $row['title'] . "</td>" .
                        "<td>" . $row['description'] . "</td>" .
                        "<td>" . "<button class='edit btn btn-success' id=" . $row['sno'] . ">Edit</button>&nbsp;<button class='delete btn btn-danger' id=d" . $row['sno'] . ">Delete</button>" . "</td>" .
                        "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let table = new DataTable('#notes_table');
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[1].innerText;
                description = tr.getElementsByTagName("td")[2].innerText;
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                $('#editModal').modal('toggle');
            })
        })


        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                sno = e.target.id.substr(1, );

                if (confirm('Are you sure?')) {
                    window.location = `/learn-php/crud/index.php?delete=${sno}`;
                }
            })
        })
    </script>
</body>

</html>