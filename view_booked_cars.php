<?php
session_start();
require "includes/database_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Cars | Car Rental</title>
    <?php include "./includes/head_links.php"; ?>
    <link href="./css/available_cars.css" rel="stylesheet" />
</head>

<body>
    <?php include "./includes/header.php"; ?>

    <!-- Content -->
    <div class="content">
        <h1>Booked Cars</h1>
        <table>
            <tr>
                <th>Car ID</th>
                <th>Customer ID</th>
                <th>Start Date</th>
                <th>Days Rented</th>
            </tr>
            <tbody id="available-cars-list"></tbody>
        </table>
    </div>

    <?php include "./includes/footer.php"; ?>
    <script type="text/javascript" src="./js/view_booked_cars.js"></script>
</body>

</html>