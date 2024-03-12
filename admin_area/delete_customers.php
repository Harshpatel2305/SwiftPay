<?php
// Include database connection
include("includes/db_connection.php");

// Check if mobile number parameter is set
if(isset($_GET['mobile_number'])) {
    // Sanitize input to prevent SQL injection
    $mobileNumber = mysqli_real_escape_string($con, $_GET['mobile_number']);
    
    // Construct query to delete user based on mobile number
    $query = "DELETE FROM users WHERE mobile_number = '$mobileNumber'";
    
    // Execute query
    $result = mysqli_query($con, $query);
    
    // Check if query executed successfully
    if($result) {
        // Redirect back to the view page after deletion
        header("Location: view_customers.php");
        exit; // Ensure script stops execution after redirection
    } else {
        // If query failed to execute, display error message
        echo "Error deleting user: " . mysqli_error($con);
    }
} else {
    // If mobile number parameter is not provided, display error message
    echo "Mobile number parameter is missing.";
}
?>
