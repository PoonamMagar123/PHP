<?php
$db = mysqli_connect("localhost", "root", "", "phpcurd_db");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $date = mysqli_real_escape_string($db, $_POST['date']);

    $qry = "INSERT INTO user (name, date) VALUES ('$name', '$date')";
    
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("User registered successfully...");</script>';
        header('Location: user.php');
        exit();
    } else {
        echo mysqli_error($db);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">

    <h2>PHP FORM</h2>

    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <hr>

    <h3>User List</h3>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $qry = "SELECT * FROM user";
            $run = $db->query($qry);
            if ($run->num_rows > 0) {
                while ($row = $run->fetch_assoc()) {
                    $id = $row['id'];
            ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

