<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Add New Customer</h2>
        <?php
        include "config.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
            $rating = mysqli_real_escape_string($conn, $_POST['rating']);
            $date_submitted = mysqli_real_escape_string($conn, $_POST['date_submitted']);

            $sql = "INSERT INTO feedbacks (customer_name, email, feedback, rating, date_submitted) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssis", $customer_name, $email, $feedback, $rating, $date_submitted);

            if ($stmt->execute()) {
                header("Location: index.php?msg=New record created successfully");
                exit();
            } else {
                echo "<div class='bg-red-100 text-red-700 p-4 mb-4 rounded-lg text-center'>
                        Error: " . $stmt->error . "
                      </div>";
            }
            $stmt->close();
        }
        $conn->close();
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-6">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Name" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Email" required>
            </div>
            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                <input type="text" id="feedback" name="feedback" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your feedback"required>
            </div>
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" id="rating" name="rating" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Rate" required>
            </div>
            <div>
                <label for="date_submitted" class="block text-sm font-medium text-gray-700">Date Submitted</label>
                <input type="date" id="date_submitted" name="date_submitted" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add User</button>
            </div>
        </form>
    </div>
</body>
</html>
