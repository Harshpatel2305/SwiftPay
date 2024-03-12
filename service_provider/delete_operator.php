<?php
include 'db_connection.php';

    if (isset($_GET['id'])) {
        $operator_id = mysqli_real_escape_string($con, $_GET['id']);

        // Perform the delete operation
        $delete_query = "DELETE FROM dth_operators WHERE id = '$operator_id'";
        if (mysqli_query($con, $delete_query)) {
            echo '<div class="alert alert-success" role="alert">
                    Operator deleted successfully.
                </div>';
                header('location: index.php?view_manufacturers');
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Error: ' . mysqli_error($con) . '
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Operator ID not provided.
            </div>';
    }

?>
