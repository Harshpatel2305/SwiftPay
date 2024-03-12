
<?php
include 'db_connection.php';

// Check if the form is submitted for deleting a plan
if (isset($_POST['delete_plan'])) {
    $plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);

    // Delete the plan
    $delete_query = "DELETE FROM dth_plans WHERE id = '$plan_id'";
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
$totalRecordsQuery = "SELECT COUNT(*) as total FROM dth_plans";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

// Get the current page or set it to the first page if not provided
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve plans with operator details for display
$query_plans = "SELECT dth_plans.id, dth_plans.operator_id, dth_plans.plan_name, 
                dth_plans.validity, dth_plans.description, dth_plans.price, 
                dth_operators.operator_name
                FROM dth_plans
                INNER JOIN dth_operators ON dth_plans.operator_id = dth_operators.id
                LIMIT $offset, $recordsPerPage";

$result_plans = mysqli_query($con, $query_plans);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTH Plans Display</title>
    <!-- Bootstrap CSS -->
</head>

<body>

    <div class="container mt-5">
        <h2>DTH Plans Display</h2>

        <!-- Display Plans Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Plan ID</th>
                    <th>Operator ID</th>
                    <th>Operator Name</th>
                    <th>Plan Name</th>
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
                            <?php echo $row_plan['id']; ?>
                        </td>
                        <td>
                            <?php echo $row_plan['operator_id']; ?>
                        </td>
                        <td>
                            <?php echo $row_plan['operator_name']; ?>
                        </td>
                        <td>
                            <?php echo $row_plan['plan_name']; ?>
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
                            <form method="get" action="edit_dth_plans.php">
                                <input type="hidden" name="plan_id" value="<?php echo $row_plan['id']; ?>">
                                <button type="submit" name="edit_plan" class="btn btn-primary">Edit</button>
                                <!-- You can include other form elements or buttons as needed -->

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