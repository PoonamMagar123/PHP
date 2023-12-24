<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the number from the form
    // $number= $_POST["number"];

    $number = isset($_POST["number"]) ? $_POST["number"] : '';

    // Validate the number (you can add more validation if needed)
    if (!is_numeric($number)) {
        echo "Please enter a valid number.";
    } else {
        // Generate CSV data
        $csvData = "Multiplication of table $number \n";
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            $csvData .= "$result\n";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Multiplication Table</title>
</head>
<body>

<form method="post" action="">

        <div class="form-group col-md-4">
            <label for="date">Enter Number: </label>
            <input type="number" class="form-control" name="number" required>
        </div>

        <button type="submit" class="btn btn-success m-3" name="download">Download</button>
    
</form>

</body>
</html>

