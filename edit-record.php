<!-- edit-record.php -->
<?php
include 'db.php';
session_start();

// Check if the user is logged in; redirect to login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Read - Fetch existing records
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM diabetes_records WHERE user_id=$user_id");
$records = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Diabetes Record</title>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php include "navbar_login.php"; ?>
    </div>

    <!-- Page content-->

    <div class="container">
        <h1>Edit Diabetes Record</h1>

        <form action="edit-record-process.php" method="post">
            <label for="record_id">Select Record:</label>
            <select name="record_id" id="record_id" required>
                <?php foreach ($records as $record): ?>
                <option value="<?php echo $record['id']; ?>">
                    <?php echo "{$record['entry_date']} - Glucose Level: {$record['glucose_level']}"; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="edit">Edit Record</button>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>