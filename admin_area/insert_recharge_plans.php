<?php

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $operator = $_POST['operator'];
    //$plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);
    $data = mysqli_real_escape_string($con, $_POST['data']);
    $validity = mysqli_real_escape_string($con, $_POST['validity']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Insert data into the corresponding table based on the selected operator
    switch ($operator) {
        case 'jio':
            $table = 'jio_plans';
            break;
        case 'bsnl':
            $table = 'bsnl_plans';
            break;
        case 'airtel':
            $table = 'airtel_plans';
            break;
        case 'vi':
            $table = 'vi_plans';
            break;
        default:
            // Handle invalid operator selection
            echo 'Invalid operator selected';
            exit;
    }

    // Insert data into the selected operator's table
    $insert_query = "INSERT INTO $table ( data, validity, description, price) VALUES ( '$data', '$validity', '$description', '$price')";
    if (mysqli_query($con, $insert_query)) {
        echo 'Plan data inserted successfully';
    } else {
        echo 'Error inserting plan data: ' . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Plan Data</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Insert Plan Data</h2>
        <form method="post" action="insert_plan.php">
            <div class="mb-3">
                <label for="operator" class="form-label">Select Operator:</label>
                <select name="operator" id="operator" class="form-select">
                    <option value="jio">Jio</option>
                    <option value="bsnl">BSNL</option>
                    <option value="airtel">Airtel</option>
                    <option value="vi">Vi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="text" id="data" name="data" class="form-control">
            </div>
            <div class="mb-3">
                <label for="validity" class="form-label">Validity:</label>
                <input type="text" id="validity" name="validity" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" id="description" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" id="price" name="price" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
