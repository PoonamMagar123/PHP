<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip"; // Add your database name

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip` (`Name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // echo $sql;

        if($con->query($sql) == true){
            echo "Successfully Inserted";
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- csss link -->
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
    <title>Welcome to Travel Form</title>
</head>
<body>
    <img class="bg" src="./th.jpeg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur Us Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p class='submitMSG'>Successfully Submitting...!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
