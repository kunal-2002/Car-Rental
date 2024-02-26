<?php
session_start();
require("../includes/database_connect.php");


$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if ($result) {
    $availableCars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $response = [
        'success' => true,
        'cars' => $availableCars,
        'userType' => isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'guest',
    ];

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to fetch available cars']);
}

mysqli_close($conn);
