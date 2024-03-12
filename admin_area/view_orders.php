<?php
include 'db_connection.php';

// Define the number of records per page
$recordsPerPage = 10;

// Calculate the total number of pages
$totalRecordsQuery = "SELECT COUNT(*) as total FROM recharge_transactions";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve pending transactions for the current page
$query_pending = "SELECT * FROM recharge_transactions LIMIT $offset, $recordsPerPage";
$result_pending = mysqli_query($con, $query_pending);
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

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View recharge transactions
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View recharge transactions
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Mobile Number</th>
                                    <th>Operator ID</th>
                                    <th>Amount</th>
                                    <th>Validity</th>
                                    <th>Description</th>
                                    <th>Transaction Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($row = mysqli_fetch_assoc($result_pending)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['user_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['mobile_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper($row['operator_id']) ?>
                                        </td>
                                        <td>
                                            <?php echo $row['amount']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['validity']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['description']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['transaction_time']; ?>
                                        </td>
                                        <td class="<?php echo strtolower($row['approval_status']) ?>">
                                            <?php echo strtoupper($row['approval_status']) ?>
                                        </td>
                                        <td>
                                            <?php if ($row['approval_status'] === 'PENDING') { ?>
                                                <form method="post" action="approve_transaction.php">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="submit" name="approve" value="Approve" class="btn btn-success">
                                                    <input type="submit" name="reject" class="btn btn-danger" value="Reject">
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                        </table>



                        </tbody>
                        </table>

                        <!-- Pagination links -->
                        <div class="pagination">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="index.php?view_orders&page=<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>