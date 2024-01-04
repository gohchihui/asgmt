<!-- edit-record-process.php -->
<?php
include 'db.php';
session_start();

// Check if the user is logged in; redirect to login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $record_id = $_POST["record_id"];

    // Fetch the selected record
    $stmt = $conn->prepare("SELECT * FROM diabetes_records WHERE id=? AND user_id=?");
    $stmt->bind_param("ii", $record_id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $selectedRecord = $result->fetch_assoc();
    $stmt->close();
}
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
    <div class="container">
        <h1>Edit Diabetes Record</h1>

        <form action="record-form.php" method="post">
            <input type="hidden" name="record_id" value="<?php echo $selectedRecord['id']; ?>">

            <label for="glucose_level">Glucose Level:</label>
            <input type="number" step="0.1" id="glucose_level" name="glucose_level"
                value="<?php echo $selectedRecord['glucose_level']; ?>" required>

            <label for="entry_date">Entry Date:</label>
            <input type="date" id="entry_date" name="entry_date" value="<?php echo $selectedRecord['entry_date']; ?>"
                required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" rows="4" cols="50"><?php echo $selectedRecord['notes']; ?></textarea>

            <button type="submit" name="create-update">Save Record</button>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>