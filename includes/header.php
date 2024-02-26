<header>
    <div class="logo">
        <a href="index.php">
            <img src="./img/logo.png" alt="Car Rental Logo">
        </a>
    </div>

    <!-- Navigation -->
    <nav>
        <ul>
            <?php
            // Check if user is loggedin or not
            if (!isset($_SESSION["user_id"])) {
            ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="available_cars.php">Available Cars</a></li>
                <li><a href="customer_registration.php">Register as Customer</a></li>
                <li><a href="agency_registration.php">Register as Agency</a></li>
                <li><a href="login.php">Login</a></li>
            <?php
            } else {
            ?>
                Hi, <?php echo $_SESSION["name"] ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="available_cars.php">Available Cars</a></li>
                <?php
                if ($_SESSION["user_type"] == "agency") {
                ?>
                    <li><a href="add_cars.php">Add New Cars</a></li>
                    <li><a href="view_booked_cars.php">View Booked Cars</a></li>
                <?php
                }
                ?>
                <li><a href="logout.php">Logout</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <div class="menu-icon"></div>
</header>

<!-- Sidebar for small screens -->
<div class="sidebar">
    <ul>
        <?php
        // Check if user is loggedin or not
        if (!isset($_SESSION["user_id"])) {
        ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="available_cars.php">Available Cars</a></li>
            <li><a href="customer_registration.php">Register as Customer</a></li>
            <li><a href="agency_registration.php">Register as Agency</a></li>
            <li><a href="login.php">Login</a></li>
        <?php
        } else {
        ?>
            Hi, <?php echo $_SESSION["name"] ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="available_cars.php">Available Cars</a></li>
            <?php
            if ($_SESSION["user_type"] == "agency") {
            ?>
                <li><a href="add_cars.php">Add New Cars</a></li>
                <li><a href="view_booked_cars.php">View Booked Cars</a></li>
            <?php
            }
            ?>
            <li><a href="logout.php">Logout</a></li>
        <?php
        }
        ?>
    </ul>
</div>

<div class="loading">
</div>