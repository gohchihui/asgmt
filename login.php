<?php
include 'db.php';
session_start();

$login = true;
$dataFilled = true;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        header("Location: record-form.php");
        exit();
    } else {
        $login = false;
    }
    $stmt->close();
}else{
    $dataFilled = false;
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $username = $_POST["username"];
//         $password = $_POST["password"];

//         $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
//         $stmt->bind_param("s", $username);
//         $stmt->execute();
//         $stmt->bind_result($user_id, $hashed_password);
//         $stmt->fetch();

//         if (password_verify($password, $hashed_password)) {
//             $_SESSION['user_id'] = $user_id;
//             header("Location: record-form.php");
//             exit();
//         } else {
//             echo "Invalid username or password.";
//         }

//         $stmt->close();
// }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>User Login</title>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php include "navbar.php"; ?>
    </div>

    <div class="main">
        <div class="form">
            <!-- <h1>User Login</h1>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form> -->

            <h1 class="text-center mb-3">User Login</h1>
            <form method="post">
                <div class="form-floating my-3 w-100">
                    <input type="text" class="form-control" id="username" placeholder="Alice" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 w-100">
                    <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(!$dataFilled){
                        echo '<div class="alert alert-danger text-center w-100" role="alert">Please fill your username and password to login</div>';
                    }
                    if(!$login && $dataFilled){
                        echo '<div class="alert alert-danger text-center w-100" role="alert">Username or password wrong</div>';
                    }
                }
                ?>

                <button class="w-100 btn btn-lg btn-primary" type="submit" fdprocessedid="m5vmdnc">Login</button>
            </form>
        </div>
    </div>
</body>

</html>