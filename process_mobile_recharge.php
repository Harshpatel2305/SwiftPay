<?php
include 'configure.php';
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $mobileNumber = mysqli_real_escape_string($conn, $_SESSION['mobile_number']);
    $operatorId = mysqli_real_escape_string($conn, $_POST['operator']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $validity = mysqli_real_escape_string($conn, $_POST['validity']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $userId = null; // Initialize the user ID to null

    // Example: Fetch user ID based on mobile number
    $queryUserId = "SELECT user_id, balance FROM users WHERE mobile_number = '$mobileNumber'";
    $resultUserId = mysqli_query($conn, $queryUserId);

    if ($resultUserId) {
        // Check if any row is returned
        if (mysqli_num_rows($resultUserId) > 0) {
            $rowUserId = mysqli_fetch_assoc($resultUserId);
            $userId = $rowUserId['user_id'];
            $userBalance = $rowUserId['balance'];

            // Check if user has sufficient balance
            if ($userBalance < $amount) {
                echo "Insufficient balance. Transaction failed.";
                exit();
            }
        } else {
            echo "User not found. Please check and try again.";
            exit(); // Exit the script if the user is not found
        }
    } else {
        echo "Error fetching user ID: " . mysqli_error($conn);
        exit(); // Exit the script on error
    }

    // Example: Fetch the dynamic plan ID based on the selected operator
    $queryPlanId = "SELECT id FROM recharge_plans WHERE operator_id = '$operatorId'";
    $resultPlanId = mysqli_query($conn, $queryPlanId);

    if ($resultPlanId && mysqli_num_rows($resultPlanId) > 0) {
        $rowPlanId = mysqli_fetch_assoc($resultPlanId);
        $planId = $rowPlanId['id'];

        // Example: Insert data into the recharge_transactions table with "PENDING" status
        $insertTransactionQuery = "INSERT INTO recharge_transactions (user_id, mobile_number, operator_id, plan_id, amount, validity, description, approval_status, transaction_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 'PENDING', NOW())";

        $stmtInsertTransaction = mysqli_prepare($conn, $insertTransactionQuery);

        if ($stmtInsertTransaction) {
            // Bind parameters and execute the insert query
            mysqli_stmt_bind_param($stmtInsertTransaction, "isidiss", $userId, $mobileNumber, $operatorId, $planId, $amount, $validity, $description);
            $resultInsertTransaction = mysqli_stmt_execute($stmtInsertTransaction);

            if ($resultInsertTransaction) {
                echo "Transaction request submitted successfully! Waiting for admin approval.";
            } else {
                echo "Error inserting transaction data: " . mysqli_stmt_error($stmtInsertTransaction);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmtInsertTransaction);
        } else {
            echo "Error preparing insert transaction statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching dynamic plan ID: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
