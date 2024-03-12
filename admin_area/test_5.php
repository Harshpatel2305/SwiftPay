
<?php
include 'db_connection.php';

// Check if the form is submitted for deleting a plan
if (isset($_POST['delete_plan'])) {
    $plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);

    // Delete the plan
    $delete_query = "DELETE FROM vi_plans WHERE plan_id = '$plan_id'";
    if (mysqli_query($con, $delete_query)) {
        echo '<div class="alert alert-success" role="alert">
                Plan deleted successfully.
            </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . mysqli_error($con) . '
            </div>';
    }
}

$recordsPerPage = 10;

// Calculate the total number of pages
$totalRecordsQuery = "SELECT COUNT(*) as total FROM vi_plans";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve plans with operator details for display
$query_plans = "SELECT plan_id,data,validity,description,price from vi_plans
                LIMIT $offset, $recordsPerPage";

$result_plans = mysqli_query($con, $query_plans);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile recharge Plans Display</title>
    <!-- Bootstrap CSS -->
</head>

<body>

    <div class="container mt-5">
        <h2>vi Plans Display</h2>

        <!-- Display Plans Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Plan ID</th>
                    <th>data</th>
                    <th>Validity</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row_plan = mysqli_fetch_assoc($result_plans)) { ?>
    <tr>
        <td>
            <?php echo $row_plan['plan_id']; ?>
        </td>
        <td>
            <?php echo $row_plan['data']; ?>
        </td>
        <td>
            <?php echo $row_plan['validity']; ?>
        </td>
        <td>
            <?php echo $row_plan['description']; ?>
        </td>
        <td>
            <?php echo $row_plan['price']; ?>
        </td>
        <td>
            <!-- Action buttons for editing and deleting -->
            <form method="post" action="">
            <a href="edit_airtel_plan.php?plan_id=<?php echo $row_plan['plan_id']; ?>" class="btn btn-primary">Edit</a>
           
                <input type="hidden" name="plan_id" value="<?php echo $row_plan['plan_id']; ?>">
                <button type="submit" name="delete_plan" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
<?php } ?>

            </tbody>
        </table>
        
    <div class="pagination">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                                <a class="page-link" href="dth_plans_display.php?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
    </div>

    <!-- Bootstrap JS (Popper is required for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($con);
?>