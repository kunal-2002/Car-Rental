<?php
session_start();
require("../includes/database_connect.php");

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'agency') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST["model"];
    $number = $_POST["number"];
    $seating = $_POST["seating_capacity"];
    $rent = $_POST["rent_per_day"];
    $agency_id = $_POST["agency_id"];


    $sql = "INSERT INTO cars (agency_id, model, vehicle_number, seating_capacity, rent_per_day) 
            VALUES ('$agency_id','$model','$number','$seating', '$rent')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../add_cars.php?error=1");
        exit();
    }
} else {
    header("Location: ../add_cars.php?error=1");
    exit();
}
