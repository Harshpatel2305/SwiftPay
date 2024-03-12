<?php
session_start();
include 'functions/header.php';
if (!isset($_SESSION['mobile_number'])) {
    echo '<Script>window.location.href="login.php";</script>';
    exit; // Stop further execution
} ?>
<section class="heading" style="background-color:#00baf2;">
    <h1>add balance</h1>
    <p> <a href="home.php">home</a> >> add balance </p>
</section>
<?php
include("configure.php");
//session_start();

if (isset($_POST['add_balance'])) {
    // Get user's mobile number from session
    $user_mobile = $_SESSION['mobile_number'];

    // Get the amount to be added from the form
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // Validate input
    if (!is_numeric($amount) || $amount <= 0) {
        echo "<Script>alert('Invalid amount. Please enter a valid amount.');</script>";
        exit();
    }

    // Update the user's balance
    $update_balance_query = "UPDATE users SET balance = balance + $amount WHERE mobile_number = '$user_mobile'";
    mysqli_query($conn, $update_balance_query);

    // Display a message indicating that the balance has been added
    echo "<script>alert('Balance added successfully. Amount: $amount');</script>";

    // Redirect to the home page or any other page as needed
    // header("Location: home.php");
    // exit();
}
?>
<section class="about">
    <?php
    include 'configure.php';
    //session_start();
    
    $user_mobile = $_SESSION['mobile_number'];

    // Fetch user's balance and username from the database
    $query = "SELECT username, balance FROM users WHERE mobile_number = '$user_mobile'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $user_balance = $row['balance'];
        $username = $row['username'];
    } else {
        // Handle the case where the user is not found
        echo "User not found. Please log in again.";
        exit();
    }

    // Fetch user's approved transaction history
    $transaction_history_query = "SELECT * FROM transactions WHERE (sender_mobile_number = '$user_mobile' OR receiver_mobile_number = '$user_mobile') AND status = 'approved'";
    $transaction_history_result = mysqli_query($conn, $transaction_history_query);
    ?>

    <h1 class="title">Hello,Mr.
        <?php echo $username; ?>
    </h1>
    <h1 class="title">Your current wallet balance is: <span>&#8377;
            <?php echo $user_balance; ?>
        </span>
    </h1>


    <section class="register-form">

        <!-- Add Balance Form -->
        <form method="post" action="add-balance.php">
            <h3>add balance</h3>
            <div class="inputBox">
                <span class="fas fa-inr"></span>
                <input type="text" name="amount" required placeholder="enter amount">
            </div>
            <input type="submit" name="add_balance" class="btn" value="Add Balance">
            <a href="home.php" class="btn">Go back to Home Page</a>
        </form>

    </section>
</section>
<?php include 'functions/footer.php'; ?>