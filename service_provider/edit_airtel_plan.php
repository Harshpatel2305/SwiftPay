
<?php
include 'db_connection.php';
//include 'includes/sidebar.php';

// Check if the form is submitted for updating a plan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form fields are set
    if (isset($_POST['plan_id']) && isset($_POST['data']) && isset($_POST['validity']) && isset($_POST['description']) && isset($_POST['price'])) {
        $plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);
        $data = mysqli_real_escape_string($con, $_POST['data']);
        $validity = mysqli_real_escape_string($con, $_POST['validity']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = mysqli_real_escape_string($con, $_POST['price']);

        // Update the plan
        $update_query = "UPDATE airtel_plans SET data = '$data', validity = '$validity', description = '$description', price = '$price' WHERE plan_id = '$plan_id'";
        if (mysqli_query($con, $update_query)) {
            echo '<div class="alert alert-success" role="alert">
                    Plan updated successfully.
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Error: ' . mysqli_error($con) . '
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                All fields are required.
            </div>';
    }
}

// Retrieve plan details based on the plan ID
if (isset($_GET['plan_id'])) {
    $plan_id = mysqli_real_escape_string($con, $_GET['plan_id']);
    $query_plan = "SELECT * FROM airtel_plans WHERE plan_id = '$plan_id'";
    $result_plan = mysqli_query($con, $query_plan);

    if ($row_plan = mysqli_fetch_assoc($result_plan)) {
        // Plan found, use the data for editing
        $data = $row_plan['data'];
        $validity = $row_plan['validity'];
        $description = $row_plan['description'];
        $price = $row_plan['price'];
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Plan not found.
            </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plan</title>
    <!-- Bootstrap CSS --><link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

    <div class="container mt-5">
        <h2>Edit Plan</h2>

        <!-- Edit Plan Form -->
        <form method="post" action="">
            <input type="hidden" name="plan_id" value="<?php echo $plan_id; ?>">
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="text" class="form-control" id="data" name="data" value="<?php echo $data; ?>" required>
            </div>
            <div class="mb-3">
                <label for="validity" class="form-label">Validity</label>
                <input type="text" class="form-control" id="validity" name="validity" value="<?php echo $validity; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $description; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Plan</button>
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
