
<?php
include("includes/db_connection.php");

// Fetch all users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);

if ($result) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $users = [];
}

?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Customers

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <h3 class="panel-title"><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"></i> View Customers

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->


            <div class="panel-body"><!-- panel-body Starts -->

                <div class="table-responsive"><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped">
                        <!-- table table-bordered table-hover table-striped Starts -->

                        <thead><!-- thead Starts -->

                            <tr>

                                <th>sr.no</th>
                                <th>userName</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>bank</th>
                                <th>account Number</th>
                                <th>ifsc code</th>
                                <th>Balance</th>
                                <th>Action</th>


                            </tr>

                        </thead><!-- thead Ends -->



                        <tbody><!-- tbody Starts -->

                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $user['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['mobile_number']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['bank']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['account_number']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['ifsc_code']; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $user['balance']; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info"
                                            onclick="editUser('<?php echo $user['mobile_number']; ?>')">Edit</button>
                                        <button class="btn btn-danger"
                                            onclick="deleteUser('<?php echo $user['mobile_number']; ?>')">Delete</button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>


                        </tbody><!-- tbody Ends -->



                    </table><!-- table table-bordered table-hover table-striped Ends -->

                </div><!-- table-responsive Ends -->

            </div><!-- panel-body Ends -->


        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->
<script>
    function editUser(mobileNumber) {
        // Redirect to the edit page with the user's mobile number as a parameter
        window.location.href = 'edit_manufacturer.php?mobile_number=' + mobileNumber;
    }

    function deleteUser(mobileNumber) {
        // Redirect to the delete page with the user's mobile number as a parameter
        window.location.href = 'delete_customers.php?mobile_number=' + mobileNumber;
    }
</script>


<?php ?>