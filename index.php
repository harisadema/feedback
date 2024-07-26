<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 px-4">
        <h1 class="text-3xl font-bold text-center mb-5">All Feedback</h1>
        <a href="/feedback/add_new.php" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mb-4 inline-block">New Customer</a>
        
        <?php
        include 'config.php';

        $sql = "SELECT * FROM feedbacks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="overflow-x-auto">';
            echo '<table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">';
            echo '<thead class="bg-gray-200">';
            echo '<tr>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">ID</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Customer Name</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Email</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Feedback</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Rating</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Date Submitted</th>';
            echo '<th class="px-4 py-2 border-b border-gray-300 text-left">Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody class="divide-y divide-gray-200">';

            while ($row = $result->fetch_assoc()) {
                echo '<tr class="hover:bg-gray-50">';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["id"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["customer_name"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["email"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["feedback"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["rating"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300">' . $row["date_submitted"] . '</td>';
                echo '<td class="px-4 py-2 border-b border-gray-300 flex space-x-2">';
                echo '<a href="/feedback/edit.php?id=' . $row["id"] . '" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-2 rounded-md">Edit</a>';
                echo '<a href="/feedback/delete.php?id=' . $row["id"] . '" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded-md">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="text-center text-gray-600 mt-4">No feedback available.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

