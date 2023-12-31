<?php
include 'db.php';
session_start();

// Check if the user is logged in; redirect to login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Fetch records from the database for the logged-in user
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT entry_date, glucose_level FROM diabetes_records WHERE user_id = $user_id ORDER BY entry_date");

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    // Format date as 'YYYY-MM-DD'
    $formattedDate = DateTime::createFromFormat('Y-m-d', $row['entry_date'])->format('Y-m-d');
    
    $labels[] = $formattedDate;
    $data[] = $row['glucose_level'];

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes Records Chart</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php include "navbar.php"; ?>
    </div>

    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

    <script>
    new Chart("myChart", {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Glucose Level',
                data: <?php echo json_encode($data); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'MMM D'
                        }
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            }
        }
    });

    if (typeof Chart !== 'undefined') {
        // Your Chart.js code here
    } else {
        console.error('Chart.js is not defined. Make sure it is properly loaded.');
    }
    </script>


</body>

</html>