<?php 
session_start();
include 'functions/header.php';
if (!isset($_SESSION['mobile_number'])) {
    echo '<Script>window.location.href="login.php";</script>';
    exit; // Stop further execution
}
?>
<section class="heading" style="background-color:#00baf2;">
    <h1>profile</h1>
    <p> <a href="home.php">home</a> >> profile </p>
</section>
<?php

// Include your database connection file
include 'configure.php';

// Assume $mobile_number contains the mobile number of the logged-in user
$mobile_number = $_SESSION['mobile_number']; // Assuming mobile number is stored in session

// Query to retrieve user data based on mobile number
$query = "SELECT * FROM users WHERE mobile_number = '$mobile_number'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch user data
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $mobile_number = $row['mobile_number'];
    $bank = $row['bank'];
    $account_number = $row['account_number'];
    $IFSC_code=$row['ifsc_code'];
    $balance=$row['balance'];
    // Add more variables for other user profile information if needed
} else {
    echo "Error: Unable to fetch user data.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.5rem;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
        .background-home {
            width: -webkit-fill-available;
            height: 150px;
        }
        .test{
            margin-bottom: 4rem;
        }
    </style>
</head>
<body>

<div class="container">
<img class="background-home" src="https://pwebassets.paytm.com/commonwebassets/commonweb/images/about-us/monuments.svg" alt="">
    <h1 class="title test">PROFILE</h1>
    <table>
        <tr>
            <th>Username</th>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td><?php echo $mobile_number; ?></td>
        </tr>
        <tr>
            <th>Bank</th>
            <td><?php echo $bank; ?></td>
        </tr>
        <tr>
            <th>Bank Account Number</th>
            <td><?php echo $account_number; ?></td>
        </tr>
        <tr>
            <th>IFSC code</th>
            <td><?php echo $IFSC_code; ?></td>
        </tr>
        <tr>
            <th>Wallet balance</th>
            <td><?php echo $balance; ?> &nbsp; <a class="btn" href="add-balance.php">add balance</a></td>
        </tr>
        
        <!-- Add more rows for other user profile information if needed -->
    </table>
</div>

</body>
</html>
<?php include 'functions/footer.php';?>
