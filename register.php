<?php
include 'db.php';
session_start();

$passwordMatch = true;
$dataFilled = true;

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST["username"];
//     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

//     $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
//     $stmt->bind_param("ss", $username, $password);

//     if ($stmt->execute()) {
//         $_SESSION['user_id'] = $stmt->insert_id;
//         header("Location: record-form.php");
//         exit();
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// }

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
    if ($_POST['password'] == $_POST['confirmpassword']){
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            header("Location: record-form.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }else{
        $passwordMatch = false;
    }
}else {
        $dataFilled = false;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>User Registration</title>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php include "navbar.php"; ?>
    </div>

    <!-- <div class="container">
        <h1>User Registration</h1>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div> -->

    <div class="main">
        <div class="form">
            <h1 class="text-center mb-3">User Registration</h1>
            <form method="post">
                <div class="form-floating my-3 w-100">
                    <input type="text" class="form-control" id="username" placeholder="Alice" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 w-100">
                    <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3 w-100">
                    <input type="password" class="form-control" id="ConfirmPassword" placeholder="Comfirm Password"
                        name="confirmpassword">
                    <label for="floatingPassword">Confirm Password</label>
                </div>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(!$passwordMatch){
                            echo '<div class="alert alert-danger text-center w-100" role="alert">Password does not match</div>';
                        }
                        if(!$dataFilled){
                            echo '<div class="alert alert-danger text-center w-100" role="alert">Have data did not fill</div>';
                        }
                    }
                ?>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>