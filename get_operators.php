<?php
include 'configure.php';

$query = "SELECT * FROM dth_operators";
$result = mysqli_query($conn, $query);

if ($result) {
    $operators = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($operators);
} else {
    echo json_encode([]);
}

mysqli_close($conn);
?>
