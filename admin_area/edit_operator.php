<?php
include 'db_connection.php';

    if (isset($_GET['id'])) {
        $operator_id = mysqli_real_escape_string($con, $_GET['id']);

        $query_operator = "SELECT * FROM dth_operators WHERE id = '$operator_id'";
        $result_operator = mysqli_query($con, $query_operator);

        if ($row = mysqli_fetch_assoc($result_operator)) {
            // Operator found, you can use the data for editing
            $operator_name = $row['operator_name'];

            // Handle the form submission for updating the operator
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $new_operator_name = mysqli_real_escape_string($con, $_POST['new_operator_name']);

                $update_query = "UPDATE dth_operators SET operator_name = '$new_operator_name' WHERE id = '$operator_id'";
                if (mysqli_query($con, $update_query)) {
                    echo '<div class="alert alert-success" role="alert">
                            Operator updated successfully.
                        </div>';
                    $operator_name = $new_operator_name; // Update the displayed name
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                            Error: ' . mysqli_error($con) . '
                        </div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Operator not found.
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Operator ID not provided.
            </div>';
    }

?>
<!-- Your HTML Form for Editing -->
<form method="post" action="">
    <div class="mb-3">
        <label for="new_operator_name" class="form-label">New Operator Name</label>
        <input type="text" class="form-control" id="new_operator_name" name="new_operator_name" value="<?php echo $operator_name; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Operator</button>
</form>
