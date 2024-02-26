<?php
session_start();
require "includes/database_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars | Car Rental</title>
    <?php include "./includes/head_links.php"; ?>
    <link href="./css/available_cars.css" rel="stylesheet" />
</head>

<body>
    <?php include "./includes/header.php"; ?>

    <!-- Content -->
    <div class="content">
        <form id="book-car-form" class="form" role="form" method="post" action="api/get_available_cars.php">
            <h1>Available Cars to Rent</h1>
            <table>
                <tr>
                    <th>Car Model</th>
                    <th>Vehicle Number</th>
                    <th>Seating Capacity</th>
                    <th>Rent Per Day</th>
                    <th>Action</th>
                </tr>
                <tbody id="available-cars-list"></tbody>
            </table>

            <?php
            if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'customer') {
                echo '<button class="btn" onclick="showAddBookingForm()">Book Now</button>';
            }
            ?>

            <div id="booking-form" style="display: none;">
                <h2>Book Now</h2>
                <label for="booking-date">Booking Date:</label>
                <input type="date" id="booking-date" name="booking-date" required>

                <label for="rental-days">Rental Days:</label>
                <select id="rental-days" name="rental-days" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <!-- <button type="submit" id="book-now-button" class="btn" disabled onclick="submitBookingForm()">Submit</button> -->
            </div>
        </form>
    </div>

    <?php include "./includes/footer.php"; ?>
    <script type="text/javascript" src="./js/available_cars.js"></script>
</body>

</html>