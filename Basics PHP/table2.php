<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Multiplication Table</title>
</head>
<body>
    <form method="post" action="">
        <div class="form-group col-md-4">
            <label for="date">Enter Number: </label>
            <input type="number" class="form-control" name="number">
        </div>

        <button type="submit" class="btn btn-primary m-3" name="generate">Generate Table</button>
        <button type="submit" class="btn btn-success m-3" name="download">Download</button>
    </form>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the number from the form
    $number = isset($_POST["number"]) ? $_POST["number"] : '';

    // Validate the number (you can add more validation if needed)
    if (!is_numeric($number)) {
        echo "Please enter a valid number.";
    } else {
        if (isset($_POST["generate"])) {
            // Generate table logic
            echo "<h2>Multiplication Table  $number</h2>";
            echo "<table border='1'>";
            for ($i = 1; $i <= 10; $i++) {
                $result = $number * $i;
                echo "<tr><td>$result</td></tr>";
            }
            echo "</table>";
        } elseif (isset($_POST["download"])) {
            // Download logic
            $csvData = "Multiplication of table $number\n";
            for ($i = 1; $i <= 10; $i++) {
                $result = $number * $i;
                $csvData .= " $result\n";
            }

            // Set headers for CSV download
            $filename = "multiplication_table_" . $number . ".csv";
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');

            // Output CSV data to the browser
            echo $csvData;

            // Stop further execution to prevent HTML output
            exit;
        }
    }
}
?>
