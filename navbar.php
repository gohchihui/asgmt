<!-- navbar -->
<img src="img/logo.jpg" width="50px" height="46px">

<?php
    //no login can see
    if (!isset($_SESSION['user_id'])) {
        echo '<a href="login.php">Login</a>
            <a href="register.php">Register</a>';
        }
?>

<a href="diabetes-info.php">Information</a>
<a href="guideness.php">Guidelines</a>

<?php
    //after login can see
    if (isset($_SESSION['user_id'])) {
        echo '<a href="record-form.php">Record form</a>
            <a href="edit-record.php">Edit record</a>
            <a href="diagram.php">Record Diagram</a>
            <a href="logout.php">Logout</a>';
    }
?>

<a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">
    <i class="fa fa-bars"></i>
</a>

<!-- script -->
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