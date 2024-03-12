<?php
include 'configure.php';

$query = "SELECT * FROM recharge_operators";
$result = mysqli_query($conn, $query);

if ($result) {
    $operators = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($operators);
} else {
    // Handle error by returning a JSON response with an error message
    echo json_encode(['error' => 'Failed to fetch operators']);
}

mysqli_close($conn);
?>
