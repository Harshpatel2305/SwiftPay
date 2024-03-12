<?php
include("db_connection.php");
session_start();

// Check if the user is logged in and is an admin
/*if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}*/

if (isset($_POST['approve'])) {
    $transaction_id = $_POST['transaction_id'];

    // Get transaction details
    $get_transaction_query = "SELECT * FROM transactions WHERE transaction_id = '$transaction_id'";
    $get_transaction_result = mysqli_query($con, $get_transaction_query);

    if ($transaction = mysqli_fetch_assoc($get_transaction_result)) {
        // Update sender's and receiver's balances
        $update_sender_query = "UPDATE users SET balance = balance - {$transaction['amount']} WHERE mobile_number = '{$transaction['sender_mobile_number']}'";
        $update_receiver_query = "UPDATE users SET balance = balance + {$transaction['amount']} WHERE mobile_number = '{$transaction['receiver_mobile_number']}'";

        // Update transaction status to 'approved'
        $update_transaction_query = "UPDATE transactions SET status = 'approved' WHERE transaction_id = '$transaction_id'";

        mysqli_query($con, $update_sender_query);
        mysqli_query($con, $update_receiver_query);
        mysqli_query($con, $update_transaction_query);

        echo "Transaction approved successfully.";
        header("location: index.php?view_payments");
        exit();
    } else {
        echo "Transaction not found.";
    }
} elseif (isset($_POST['reject'])) {
    $transaction_id = $_POST['transaction_id'];

    // Update transaction status to 'rejected'
    $update_transaction_query = "UPDATE transactions SET status = 'rejected' WHERE transaction_id = '$transaction_id'";
    mysqli_query($con, $update_transaction_query);

    echo "Transaction rejected. The admin has not approved the transaction.";
} else {
    echo "Invalid request.";
}
?>
