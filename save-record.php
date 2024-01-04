<!-- save-record.php -->
<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $record_id = $_POST["record_id"];
    $glucose_level = $_POST["glucose_level"];
    $entry_date = $_POST["entry_date"];
    $notes = $_POST["notes"];

    if (empty($record_id)) {
        // Create new record
        $stmt = $conn->prepare("INSERT INTO diabetes_records (user_id, glucose_level, entry_date, notes) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $glucose_level, $entry_date, $notes);
    } else {
        // Update existing record
        $stmt = $conn->prepare("UPDATE diabetes_records SET glucose_level=?, entry_date=?, notes=? WHERE id=? AND user_id=?");
        $stmt->bind_param("sssii", $glucose_level, $entry_date, $notes, $record_id, $user_id);
    }

    if ($stmt->execute()) {
        header("Location: record-form.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>