<?php
session_start();
require "includes/database_connect.php";

// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Cars | Car Rental</title>
    <?php include "./includes/head_links.php"; ?>
    <link href="./css/add_cars.css" rel="stylesheet" />
</head>

<body>
    <?php include "./includes/header.php"; ?>

    <!-- Content -->
    <div class="content">
        <h1>Add New Cars</h1>
        <form id="add-cars-form" class="form" method="post" action="api/add_cars.php">
            <label for="model">Vehicle Model:</label>
            <input type="text" name="model" required>

            <label for="number">Vehicle Number:</label>
            <input type="text" name="number" required>

            <label for="seating_capacity">Seating Capacity:</label>
            <input type="number" name="seating_capacity" required>

            <label for="rent_per_day">Rent per Day:</label>
            <input type="number" name="rent_per_day" required>

            <input type="hidden" name="agency_id" value="<?php echo $_SESSION['user_id']; ?>">

            <button type="submit">Add Car</button>
        </form>
    </div>

    <script type="text/javascript" src="./js/add_cars.js"></script>
    <?php include "./includes/footer.php"; ?>
</body>

</html>