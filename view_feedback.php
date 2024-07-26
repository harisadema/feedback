<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl text-center mb-5">All Feedback</h1>
        <div class="bg-white p-6 rounded shadow-md">
            <?php include_once 'view_feedback.php'; ?>
        </div>
    </div>
</body>
</html>
<?php
include 'config.php';

$sql = "SELECT * FROM feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="min-w-full bg-white border-collapse border border-gray-200">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="px-4 py-2 border border-gray-200">ID</th>';
    echo '<th class="px-4 py-2 border border-gray-200">Customer Name</th>';
    echo '<th class="px-4 py-2 border border-gray-200">Email</th>';
    echo '<th class="px-4 py-2 border border-gray-200">Feedback</th>';
    echo '<th class="px-4 py-2 border border-gray-200">Rating</th>';
    echo '<th class="px-4 py-2 border border-gray-200">Date Submitted</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["id"] . '</td>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["customer_name"] . '</td>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["email"] . '</td>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["feedback"] . '</td>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["rating"] . '</td>';
        echo '<td class="px-4 py-2 border border-gray-200">' . $row["date_submitted"] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="text-center text-gray-600">No feedback available.</p>';
}

$conn->close();
?>


