<!-- record-form.php -->
<?php
include 'db.php';
session_start();

// Check if the user is logged in; redirect to login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// CRUD operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create or Update
    if (isset($_POST["create-update"])) {
        $record_id = $_POST["record_id"];
        $glucose_level = $_POST["glucose_level"];
        $entry_date = $_POST["entry_date"];
        $notes = $_POST["notes"];

        if (empty($record_id)) {
            // Create
            $stmt = $conn->prepare("INSERT INTO diabetes_records (user_id, glucose_level, entry_date, notes) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $_SESSION['user_id'], $glucose_level, $entry_date, $notes);
        } else {
            // Update
            $stmt = $conn->prepare("UPDATE diabetes_records SET glucose_level=?, entry_date=?, notes=? WHERE id=? AND user_id=?");
            $stmt->bind_param("sssii", $glucose_level, $entry_date, $notes, $record_id, $_SESSION['user_id']);
        }

        if ($stmt->execute()) {
            echo "Diabetes record saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Delete
    if (isset($_POST["delete"])) {
        $record_id = $_POST["record_id"];
        $stmt = $conn->prepare("DELETE FROM diabetes_records WHERE id=? AND user_id=?");
        $stmt->bind_param("ii", $record_id, $_SESSION['user_id']);

        if ($stmt->execute()) {
            echo "Diabetes record deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
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
    <title>Diabetes Record Form</title>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php include "navbar.php"; ?>
    </div>

    <!-- Page content-->

    <div class="container">
        <h1>Diabetes Record Form</h1>

        <!-- Form for Creating and Updating Records -->
        <form action="record-form.php" method="post">
            <input type="hidden" name="record_id" id="record_id">
            <label for="glucose_level">Glucose Level:</label>
            <input type="number" step="0.1" id="glucose_level" name="glucose_level" required>

            <label for="entry_date">Entry Date:</label>
            <input type="date" id="entry_date" name="entry_date" required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" rows="4" cols="50"></textarea>

            <button type="submit" name="create-update">Save Record</button>
        </form>

        <!-- Display Existing Records -->
        <h2>Existing Records</h2>
        <ul>
            <?php foreach ($records as $record): ?>
            <li>
                <?php echo "{$record['entry_date']} - Glucose Level: {$record['glucose_level']}"; ?>
                <a href="edit-record.php?record_id=<?php echo $record['id']; ?>">Edit</a>
                <form style="display:inline-block;" action="record-form.php" method="post">
                    <input type="hidden" name="record_id" value="<?php echo $record['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>

            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html>

<?php
$conn->close();
?>