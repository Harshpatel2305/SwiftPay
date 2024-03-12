<?php
session_start();
include("db_connection.php");

// Check if the plan_id is provided in the URL parameters
if(isset($_GET['plan_id'])) {
    $plan_id = $_GET['plan_id'];

    // Fetch plan details from the database using the provided plan_id
    $query = "SELECT * FROM recharge_plans WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $plan_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the plan exists
    if($result->num_rows > 0) {
        // Fetch the plan details
        $row = $result->fetch_assoc();
        $plan_name = $row['plan_name'];
        $validity = $row['validity'];
        $description = $row['description'];
        $price = $row['price'];
        // You can fetch other fields as needed

        // Now, populate the form fields with the fetched data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plan</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>

    <h2>Edit Plan</h2>

    <form method="post" action="update_plan.php">
        <input type="hidden" name="plan_id" value="<?php echo $plan_id; ?>">
        <label for="plan_name">Plan Name:</label>
        <input type="text" id="plan_name" name="plan_name" value="<?php echo $plan_name; ?>"><br>

        <label for="validity">Validity:</label>
        <input type="text" id="validity" name="validity" value="<?php echo $validity; ?>"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $description; ?></textarea><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>

        <!-- Add other form fields as needed -->

        <button type="submit" name="update_plan">Update Plan</button>
    </form>

</body>
</html>
<?php
    } else {
        // If the plan with the provided plan_id does not exist
        echo "Error: Plan not found.";
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();

} else {
    // If plan_id is not provided in the URL parameters
    echo "Error: Plan ID not provided.";
}
?>
