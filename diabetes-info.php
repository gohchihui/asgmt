
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Diabetes Information</title>
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

<div class="container">
    <h1>Diabetes Information and Guidelines</h1>

    <h2>Introduction to Diabetes</h2>
    <p>
        Diabetes is a chronic medical condition that occurs when the body cannot properly regulate blood sugar (glucose).
        There are different types of diabetes, including Type 1, Type 2, and gestational diabetes.
    </p>

    <h2>Managing Diabetes</h2>
    <p>
        Effective management of diabetes involves maintaining healthy lifestyle habits, monitoring blood sugar levels,
        taking medications as prescribed, and making dietary and exercise choices that support overall well-being.
    </p>

    <h2>Guidelines for Diabetes Care</h2>
    <ul>
        <li>Follow a balanced and nutritious diet.</li>
        <li>Engage in regular physical activity.</li>
        <li>Monitor blood sugar levels regularly.</li>
        <li>Take medications as prescribed by healthcare professionals.</li>
        <li>Maintain a healthy weight.</li>
        <li>Manage stress through relaxation techniques.</li>
        <li>Regularly visit healthcare providers for check-ups.</li>
    </ul>

    <h2>Additional Resources</h2>
    <p>
        For more detailed information about diabetes management and care, please refer to reputable sources such as the
        American Diabetes Association (ADA) and consult with your healthcare team for personalized guidance.
    </p>
</div>

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

</body>
</html>
