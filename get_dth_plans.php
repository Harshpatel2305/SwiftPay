<?php
include 'configure.php';

if (isset($_POST['operator_id'])) {
    $operator_id = mysqli_real_escape_string($conn, $_POST['operator_id']);
    $query = "SELECT * FROM dth_plans WHERE operator_id = $operator_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $plans = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($plans);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}

mysqli_close($conn);
?>
