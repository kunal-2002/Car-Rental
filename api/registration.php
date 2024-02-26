<?php
require("../includes/database_connect.php");

$userType = $_POST["user_type"];
$username = $_POST["email"];
$password = $_POST["password"];
$password = sha1($password);
$name = $_POST["name"];
$phone = $_POST["phone"];

$sql = "SELECT * FROM users where username='$username'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
    $response = array("success" => false, "message" => "This email id is already registered with us!");
    echo json_encode($response);
    return;
}

$sql = "INSERT INTO users (username, password, user_type, name, phone) 
                  VALUES ('$username', '$password', '$userType', '$name', '$phone')";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success" => true, "message" => "Your account has been created successfully!");
echo json_encode($response);
header("Location: ../index.php");
mysqli_close($conn);
