<?php
session_start();
include("db_connection.php");

// Check if the form is submitted for updating a plan
if (isset($_POST['update_plan'])) {
    // Retrieve form data
    $plan_id = $_POST['plan_id'];
    $plan_name = $_POST['plan_name'];
    $validity = $_POST['validity'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // Add other form fields as needed

    // Prepare SQL query to update the plan
    $update_query = "UPDATE recharge_plans SET plan_name=?, validity=?, description=?, price=? WHERE id=?";

    // Prepare the statement
    $stmt = $con->prepare($update_query);

    // Bind parameters
    $stmt->bind_param("ssssi", $plan_name, $validity, $description, $price, $plan_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">
                Plan updated successfully.
            </div>';
            echo '<Script>window.location.href="index.php?test_3"</script>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error updating plan: ' . $stmt->error . '
            </div>';
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$con->close();
?>
