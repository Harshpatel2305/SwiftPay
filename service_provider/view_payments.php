<?php

include("db_connection.php");
//session_start();

// Define the number of records per page
$recordsPerPage = 10;

// Calculate the total number of pages
$totalRecordsQuery = "SELECT COUNT(*) as total FROM transactions";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Fetch transactions for the current page
$all_transactions_query = "SELECT * FROM transactions LIMIT $offset, $recordsPerPage";
$all_transactions_result = mysqli_query($con, $all_transactions_query);

if (!isset($_SESSION['admin_username'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <style>
        .pending {
            color: yellow;
        }

        .approved {
            color: green;
        }

        .rejected {
            color: red;
        }
    </style>
    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Payments

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> View Payments

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table border="1" class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Transaction ID</th>
                                <th>Sender Mobile Number</th>
                                <th>Receiver Mobile Number</th>
                                <th>Amount</th>
                                <th>date and time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($all_transactions_result)) { ?>
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
                                    <td>
                                        <?php echo $row['amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['transaction_date']; ?>
                                    </td>
                                    <td class="<?php echo strtolower($row['status']); ?>">
                                        <?php echo strtoupper($row['status']) ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] === 'pending') { ?>
                                            <form method="post" action="admin_process_transaction.php">
                                                <input type="hidden" name="transaction_id"
                                                    value="<?php echo $row['transaction_id']; ?>">
                                                <input type="submit" name="approve" value="Approve" class="btn btn-success">
                                                <input type="submit" name="reject" class="btn btn-danger" value="Reject">
                                            </form>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>

                        <div class="pagination">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="index.php?view_payments&page=<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>


                        <!-- table table-hover table-bordered table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->


<?php } ?>