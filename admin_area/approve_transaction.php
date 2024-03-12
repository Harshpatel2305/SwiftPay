<!-- approve_transaction.php -->

<?php
include 'db_connection.php';
session_start();

// Check if the user is an admin (you might have a different method for this)
if (isset($_POST['approve'])) {
    $transaction_id = $_POST['id'];

    // Get transaction details
    $get_transaction_query = "SELECT * FROM recharge_transactions WHERE id = '$transaction_id'";
    $get_transaction_result = mysqli_query($con, $get_transaction_query);

    if ($transaction = mysqli_fetch_assoc($get_transaction_result)) {
        // Update sender's and receiver's balances
        $update_sender_query = "UPDATE users SET balance = balance - {$transaction['amount']} WHERE mobile_number = '{$transaction['mobile_number']}'";
        
        // Update transaction status to 'approved'
        $update_transaction_query = "UPDATE recharge_transactions SET approval_status = 'approved' WHERE id = '$transaction_id'";

        mysqli_query($con, $update_sender_query);
        //mysqli_query($con, $update_receiver_query);
        mysqli_query($con, $update_transaction_query);

        echo "Transaction approved successfully.";
        header("location: index.php?view_products");
        exit();
    } else {
        echo "Transaction not found.";
    }
} elseif (isset($_POST['reject'])) {
    $transaction_id = $_POST['id'];

    // Update transaction status to 'rejected'
    $update_transaction_query = "UPDATE recharge_transactions SET approval_status = 'rejected' WHERE id = '$transaction_id'";
    mysqli_query($con, $update_transaction_query);

    echo "Transaction rejected. The admin has not approved the transaction.";
    header("location: index.php?view_orders");
} else {
    echo "Invalid request.";
}


?>
