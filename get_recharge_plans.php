<?php
    include 'configure.php';

    if (isset($_POST['operator_id'])) {
        $operator_id = mysqli_real_escape_string($conn, $_POST['operator_id']);
        $query = "SELECT * FROM recharge_plans WHERE operator_id = $operator_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            
            $plans = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($plans);
        } else {
            // Handle error by returning a JSON response with an error message
            echo json_encode(['error' => 'Failed to fetch plans']);
        }
    } else {
        // Handle error by returning a JSON response with an error message
        echo json_encode(['error' => 'Operator ID not provided']);
    }

    mysqli_close($conn);
    ?>
