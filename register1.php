<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Registration</title>
</head>
<body>
    <div class="navbar" id="myNavbar">
        <img src="img/logo.jpg" width="50">
        <?php
   
   if (!isset($_SESSION['user_id'])) {
    echo '<a href="login1.php">Login</a>
          <a href="register1.php">Register</a>';
}
        ?>
        <a href="diabetes-info.php">Information</a>
        <a href="guideness.php">Guidelines</a>
        <a href="logout.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Your page content goes here -->

    <script>
        function toggleNavbar() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
    <div class="container">
        <h1>User Registration</h1>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
