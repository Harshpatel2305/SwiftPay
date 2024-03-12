<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<?php
include("includes/db_connection.php");
// Check if the mobile_number parameter is set in the URL
if (isset($_GET['mobile_number'])) {
    $mobileNumber = mysqli_real_escape_string($con, $_GET['mobile_number']);

    // Fetch user details based on mobile number
    $query = "SELECT * FROM users WHERE mobile_number = '$mobileNumber'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Mobile number parameter missing.";
    exit();
}

// Handle form submission for updating user information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = mysqli_real_escape_string($con, $_POST['username']);
    $newEmail = mysqli_real_escape_string($con, $_POST['balance']);

    // Perform the update query
    $updateQuery = "UPDATE users SET username = '$newName', balance = '$newEmail' WHERE mobile_number = '$mobileNumber'";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information.";
    }
}
?>
<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <h3 class="panel-title"><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"> </i> Edit Manufacturer

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body"><!-- panel-body Starts -->

                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <!-- form-horizontal Starts -->

                    <div class="form-group"><!-- form-group Starts -->

                        <label class="col-md-3 control-label"> Product Title </label>

                        <div class="col-md-6">

                            <input type="text" name="username" class="form-control" required
                                value="<?php echo $user['username']; ?>">

                        </div>

                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->

                        <label class="col-md-3 control-label"> Product Title </label>

                        <div class="col-md-6">

                            <input type="text" name="balance" class="form-control" required
                                value="<?php echo $user['balance']; ?>">

                        </div>

                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->

                        <label class="col-md-3 control-label"> </label>

                        <div class="col-md-6">

                            <input type="submit" name="update" class="form-control btn btn-primary"
                                value=" Update Manufacturer ">

                        </div>

                    </div><!-- form-group Ends -->

                </form><!-- form-horizontal Ends -->
            