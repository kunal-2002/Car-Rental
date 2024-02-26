<?php
session_start();
require("../includes/database_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $carId = $_POST["selectedCar"];
    $customerId = $_SESSION["user_id"];
    $startDate = date("Y-m-d", strtotime($_POST["booking-date"]));
    $daysRented = (int)$_POST["rental-days"];;

    
    $sql = "INSERT INTO bookings (car_id, customer_id, start_date, days_rented) 
                    VALUES ('$carId', '$customerId', '$startDate', '$daysRented')";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo json_encode(['success' => true, 'message' => 'Booking successful']);
        header("Location: ../index.php");
        mysqli_close($conn);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert booking details']);
    }

    mysqli_close($conn);
    exit();
}


$sql = "SELECT * FROM cars";
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
