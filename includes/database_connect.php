<?php

$servername = "127.0.0.1";
$username = "id21910865_root";
$password = "";
$database = "id21910865_car_rental";

$conn = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}
