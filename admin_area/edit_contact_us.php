<?php
include 'db_connection.php';
$recordsPerPage = 10;

// Calculate the total number of pages
$totalRecordsQuery = "SELECT COUNT(*) as total FROM recharge_operators";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve pending transactions for the current page
$query_pending = "SELECT * FROM recharge_operators LIMIT $offset, $recordsPerPage";
$result_pending = mysqli_query($con, $query_pending);



if (!isset($_SESSION['admin_username'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>


    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View DTH Operators

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> View DTH Operators

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Operator ID</th>
                                    <th>Operator name</th>
                                    <th>Action</th> <!-- New column for Edit and Delete buttons -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($row = mysqli_fetch_assoc($result_pending)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['operator_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['operator_name']; ?>
                                        </td>
                                        <td>
                                            <a href="edit_recharge_operator.php?operator_id=<?php echo $row['operator_id']; ?>"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="delete_recharge_operator.php?operator_id=<?php echo $row['operator_id']; ?>"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                        <!-- Pagination links -->
                        <div class="pagination">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="index.php?view_dth_operators&page=<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->



<?php } ?>