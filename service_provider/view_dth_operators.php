<?php
include 'db_connection.php';
$recordsPerPage = 10;

// Calculate the total number of pages
$totalRecordsQuery = "SELECT COUNT(*) as total FROM dth_operators";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve pending transactions for the current page
$query_pending = "SELECT * FROM dth_operators LIMIT $offset, $recordsPerPage";
$result_pending = mysqli_query($con, $query_pending);



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>


    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Products Categories

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> View Products Categories

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Operator ID</th>
                                    <th>Operator name</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($row = mysqli_fetch_assoc($result_pending)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['operator_name']; ?>
                                        </td>
                                        
                                    </tr>
                                <?php }?>

                        </table>



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