<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental | Login</title>
    <?php
    include "./includes/head_links.php";
    ?>
    <link href="./css/registration.css" rel="stylesheet" />
</head>

<body>
    <?php
    include "./includes/header.php";
    ?>
    <!-- Content -->
    <div class="content">
        <h1>Login</h1>
        <form id="login-form" class="form" role="form" method="post" action="api/login.php">
            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <span>Don't have an account?
            <a href="customer_registration.php">Register as Customer</a>
            or
            <a href="agency_registration.php">Register as Agency</a>
        </span>
    </div>

    <!-- Footer -->
    <?php
    include "./includes/footer.php";
    ?>
</body>

</html>