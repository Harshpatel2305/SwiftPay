<?php
include("configure.php");
session_start();
if (!isset($_SESSION['mobile_number'])) {
    echo '<Script>window.location.href="login.php";</script>';
    exit; // Stop further execution
}

if (isset($_POST['transfer'])) {
    // Get sender's mobile number from session
    $sender_mobile = $_SESSION['mobile_number'];

    // Get receiver's mobile number and amount from the form
    $receiver_mobile = mysqli_real_escape_string($conn, $_POST['receiver_mobile']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // Validate input
    if (!is_numeric($amount) || $amount <= 0) {
        echo '<script>alert("Please enter a valid amount")</script>';
        echo '<script>window.location.href = "http://localhost/SwiftPay/pay-money.php";</script>';
        exit();
    }

    // Check if the receiver exists
    $query = "SELECT * FROM users WHERE mobile_number = '$receiver_mobile'";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo '<script>alert("Receiver not found.Please enter a valid amount")</script>';
        echo '<script>window.location.href = "http://localhost/SwiftPay/pay-money.php";</script>';

        exit();
    }

    // Check if the sender and receiver are the same
    if ($sender_mobile === $receiver_mobile) {
        echo '<script>alert("you cant transfer money to yourself")</script>';
        // Redirect to a new page
        echo '<script>window.location.href = "http://localhost/SwiftPay/pay-money.php";</script>';


        exit();
    }

    // Check if the sender has sufficient balance
    $check_balance_query = "SELECT balance FROM users WHERE mobile_number = '$sender_mobile'";
    $balance_result = mysqli_query($conn, $check_balance_query);

    if ($balance_row = mysqli_fetch_assoc($balance_result)) {
        $current_balance = $balance_row['balance'];

        if ($amount > $current_balance) {
            echo '<script>alert("Insufficient balance. Transaction failed.")</script>';
            echo '<script>window.location.href = "http://localhost/SwiftPay/pay-money.php";</script>';

            exit();
        }
    } else {
        echo "Sender not found. Please log in again.";
        exit();
    }

    // Perform the transaction with 'pending' status
    $insert_transaction_query = "INSERT INTO transactions (sender_mobile_number, receiver_mobile_number, amount, status) VALUES ('$sender_mobile', '$receiver_mobile', '$amount', 'pending')";
    mysqli_query($conn, $insert_transaction_query);

    // Display a message indicating that the transaction is pending approval
    // Display a message indicating that the transaction is pending approval
    echo '<script>alert("Transaction pending approval. Amount: $' . $amount . '")</script>';

    //echo "Updated Balance: " . $current_balance;

    // Redirect to a page indicating pending approval (optional)
    // header("Location: pending_approval.php");
    // exit();
    header("Location:home.php ");
    exit;
}

//include("db_connection.php");
//session_start();

// Check if the user is logged in

//echo 'hello,' . $_SESSION['user_mobile'];

// Get user's mobile number from session
$user_mobile = $_SESSION['mobile_number'];


// Fetch user's balance from the database
$query = "SELECT balance FROM users WHERE mobile_number = '$user_mobile'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $user_balance = $row['balance'];
} else {
    // Handle the case where the user is not found
    echo "User not found. Please log in again.";
    exit();
}

// Fetch user's approved transaction history
$transaction_history_query = "SELECT * FROM transactions WHERE (sender_mobile_number = '$user_mobile' OR receiver_mobile_number = '$user_mobile') AND status = 'approved'";
$transaction_history_result = mysqli_query($conn, $transaction_history_query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay-money</title>

    <!-- font awesome cdn link  -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">-->
    <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style_2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.scss">


    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
    <style>
        .login-form form .inputBox span,
        .register-form form .inputBox span {
            color: #666;
            margin-left: 1rem;
            font-size: 3rem;
        }

        .icons a:hover {
            color: #00baf2 !important;
        }

        .table-container {
            width: 80%;
            margin: 0 auto;
            margin-bottom: 7rem;
            margin-top: 5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-size: 1.5rem;
        }

        th {
            color: #666;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;

        }

        th {
            background-color: #00baf2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .negative-amount {
            color: crimson;
        }

        .positive-amount {
            color: green;
        }

        .download-image {
            height: 50px;
            width: auto;
        }

        .login-form form input[type=submit]:hover,
        .register-form form input[type=submit]:hover {
            background: #333 !important;
        }

        @media (max-width: 450px) {
            html {
                font-size: 50%;
            }

            .home .slide .content h3 {
                font-size: 4rem;
            }

            .shopping-cart .box-container .box {
                flex-flow: column;
            }

            .table-container {
                width: 20%;
                margin-left: inherit;
                display: contents
            }

            table {
                width: 100%;
                font-size: 0.9rem;
            }
        }
        .btn:hover{
            color:white !important;
        }
    </style>

</head>

<body>

    <!-- header section starts  -->

    <?php include 'functions/header.php'; ?>
    <!-- header section ends -->

    <!-- header section  -->

    <section class="heading" style="background-color:#00baf2;">
        <h1>Pay money</h1>
        <p> <a href="home.html">home</a> >> Pay money </p>
    </section>

    <!-- header section -->

    <!-- about section starts  -->

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

        <h1 class="title">Hello,
            <?php echo $username; ?>
        </h1>
        <h1 class="title">Your wallet balance is: <span>&#8377;
                <?php echo $user_balance; ?>
            </span>
        </h1>
        <section class="register-form">
            <form action="pay-money.php" method="post" >
                <h3>money payment</h3>
                <div id="mobile_error" class="error-message"></div>
                <div class="inputBox">
                    <span class="fas fa-mobile"></span>
                    <input type="text" name="receiver_mobile" id="receiver_mobile"
                        placeholder="mobile number of receiver" required>
                    <!-- Display error message here -->
                </div>
                <div id="amount_error" class="error-message"></div> <!-- Display error message here -->
                <div class="inputBox">
                    <span class="fas fa-inr"><!--&#8377;--></span>
                    <input type="number" name="amount" id="amount" placeholder="Enter amount" required>

                </div>

                <input type="submit" value="PROCEED" name="transfer" id="submitBtn" class="btn"
                    style="background-color:white; color:black;" disabled>
            </form>

        </section>

        <script>
            document.getElementById("receiver_mobile").addEventListener("keyup", function () {
                validateMobileNumber();
            });

            document.getElementById("amount").addEventListener("keyup", function () {
                validateAmount();
            });

            function validateMobileNumber() {
                var receiverMobile = document.getElementById("receiver_mobile").value;
                var mobileRegex = /^(?:(?:(?:\+|0{0,2})91(\s*[-]\s*)?|[0]?)?[6-9]\d{9})$/;

                if (!mobileRegex.test(receiverMobile)) {
                    document.getElementById("mobile_error").innerHTML = "Please enter a valid 10-digit Indian mobile number.";
                    document.getElementById("mobile_error").style.color = "red";
                    document.getElementById("submitBtn").disabled = true;
                    document.getElementById("submitBtn").style.backgroundColor = "red"; // Change button background color
                } else {
                    document.getElementById("mobile_error").innerHTML = "";
                    document.getElementById("submitBtn").disabled = false;
                    document.getElementById("submitBtn").style.backgroundColor = "#00baf2"; // Change button background color
                }
            }

            function validateAmount() {
                var amount = document.getElementById("amount").value;

                if (amount <= 0) {
                    document.getElementById("amount_error").innerHTML = "Invalid amount. Please enter a positive number.";
                    document.getElementById("amount_error").style.color = "red";
                    document.getElementById("submitBtn").disabled = true;
                    document.getElementById("submitBtn").style.backgroundColor = "red"; // Change button background color
                } else {
                    document.getElementById("amount_error").innerHTML = "";
                    document.getElementById("submitBtn").disabled = false;
                    document.getElementById("submitBtn").style.backgroundColor = "#00baf2"; // Change button background color
                }
            }

            function validateForm() {
                validateMobileNumber();
                validateAmount();

                return false; // Return false to prevent form submission since we handle it via JavaScript
            }
        </script>





    </section>
    <?php
    // Check if the user is logged in
    
    // Get user's mobile number from session
    /*$user_mobile = $_SESSION['user_mobile'];

    // Fetch user's balance from the database
    $query = "SELECT balance FROM users WHERE mobile_number = '$user_mobile'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $user_balance = $row['balance'];
    } else {
        // Handle the case where the user is not found
        echo "User not found. Please log in again.";
        exit();
    }

    // Fetch user's approved transaction history
    $transaction_history_query = "SELECT * FROM transactions WHERE (sender_mobile_number = '$user_mobile' OR receiver_mobile_number = '$user_mobile') AND status = 'approved'";
    $transaction_history_result = mysqli_query($conn, $transaction_history_query);*/
    ?>

    <!-- about section ends -->
    <h1 class="title">Your Transaction history</h1>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>Transaction ID</th>
                <th>Sender Mobile Number</th>
                <th>Receiver Mobile Number</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($transaction_history_result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['transaction_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['sender_mobile_number']; ?>
                    </td>
                    <td>
                        <?php echo $row['receiver_mobile_number']; ?>
                    </td>
                    <td
                        class="<?php echo ($row['sender_mobile_number'] == $user_mobile) ? 'negative-amount' : 'positive-amount'; ?>">

                        <?php echo ($row['sender_mobile_number'] == $user_mobile) ? '-' : '+'; ?><span>&#8377</span>
                        <?php echo $row['amount']; ?>
                    </td>
                    <td>
                        <?php echo $row['transaction_date']; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>









    <!-- footer section starts  -->

    <?php include 'functions/footer.php'; ?>
    <!-- footer section ends -->

</body>

</html>