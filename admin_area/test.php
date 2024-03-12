<?php
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $operator_id = mysqli_real_escape_string($con, $_POST['operator_id']);
    $plan_name = mysqli_real_escape_string($con, $_POST['plan_name']);
    $validity = mysqli_real_escape_string($con, $_POST['validity']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Insert data into the dth_plans table
    $insert_query = "INSERT INTO dth_plans (operator_id, plan_name, validity, description, price)
                    VALUES ('$operator_id', '$plan_name', '$validity', '$description', '$price')";

    if (mysqli_query($con, $insert_query)) {
        echo '<div class="alert alert-success" role="alert">
                Plan added successfully.
            </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . mysqli_error($con) . '
            </div>';
    }
}

// Retrieve operators for dynamic selection
$query_operators = "SELECT * FROM dth_operators";
$result_operators = mysqli_query($con, $query_operators);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTH Plan Insertion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>DTH Plan Insertion</h2>

        <!-- Plan Insertion Form -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="operator_id" class="form-label">Select Operator</label>
                <select class="form-control" id="operator_id" name="operator_id" required>
                    <?php while ($row_operator = mysqli_fetch_assoc($result_operators)) { ?>
                        <option value="<?php echo $row_operator['id']; ?>"><?php echo $row_operator['operator_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="plan_name" class="form-label">Plan Name</label>
                <input type="text" class="form-control" id="plan_name" name="plan_name" required>
            </div>

            <div class="mb-3">
                <label for="validity" class="form-label">Validity</label>
                <input type="text" class="form-control" id="validity" name="validity" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Plan</button>
        </form>
    </div>

    <!-- Bootstrap JS (Popper is required for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($con);
?>
