<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration | Car Rental</title>
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
        <h1>Customer Registration</h1>
        <form id="signup-form" class="form" role="form" method="post" action="api/registration.php">
        
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" maxlength="10" minlength="10" required>

            <label for="password">Password:</label>
            <input type="password" name="password" minlength="6" required>

            <input type="hidden" name="user_type" value="customer">

            <button type="submit">Register</button>
        </form>
        <span>Already have an account?
            <a href="login.php">Login</a>
        </span>
    </div>
    <!-- Footer -->
    <?php
        include "./includes/footer.php";
    ?>
</body>
</html>
