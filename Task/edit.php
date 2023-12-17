<?php
$db = mysqli_connect("localhost", "root", "", "phpcurd_db");
if (!$db) {
    die('error in db' . mysqli_error($db));
} else {
    $id = $_GET['id'];
    $qry = "SELECT * FROM user WHERE id=$id";
    $run = $db->query($qry);
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $name = $row['name'];
            $date = $row['date'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">

    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];

    $qry = "UPDATE user SET name='$name', date='$date' WHERE id = $id ";

    if (mysqli_query($db, $qry)) {
        header('location: user.php');
    } else {
        echo mysqli_error($db);
    }
}
?>
