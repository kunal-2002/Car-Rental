<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <?php
        include "./includes/head_links.php";
    ?>
    <link href="./css/index.css" rel="stylesheet" />
</head>

<body>
    <?php
        include "./includes/header.php";
    ?>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to Car Rental</h1>
        <p>Explore our available cars and book your ride today!</p>
    </div>

    <!-- Footer -->
    <?php
        include "./includes/footer.php";
    ?>
</body>

</html>