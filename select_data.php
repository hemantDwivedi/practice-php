<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <h1>Contacts list</h1>
        <table class="table mt-3">
            <thead>
                <th>S.NO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Date</th>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database_name = "contact_info";
                $conn = mysqli_connect($servername, $username, $password, $database_name);
                if (!$conn) {
                    die("connection failed: " . mysqli_connect_error());
                }

                $select_query = "SELECT * FROM `contacts`";
                $result = mysqli_query($conn, $select_query);
                $length = mysqli_num_rows($result);

                # display data
                if ($length > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo var_dump($row);
                        echo "<tr>";
                        echo '<td scope="row">' . $row['sno'] . '</td>';
                        echo '<td scope="row">' . $row['name'] . '</td>';
                        echo '<td scope="row">' . $row['email'] . '</td>';
                        echo '<td scope="row">' . $row['salary'] . '</td>';
                        echo '<td scope="row">' . $row['date'] . '</td>';
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>