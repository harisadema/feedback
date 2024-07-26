<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Customer</h2>
        <?php
        include "config.php";

        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);

            $sql = "SELECT * FROM feedbacks WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $feedback = $result->fetch_assoc();

            if (!$feedback) {
                echo "<div class='bg-red-100 text-red-700 p-4 mb-4 rounded-lg text-center'>
                        Error: Feedback not found
                      </div>";
                exit();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $feedback_text = mysqli_real_escape_string($conn, $_POST['feedback']);
            $rating = mysqli_real_escape_string($conn, $_POST['rating']);
            $date_submitted = mysqli_real_escape_string($conn, $_POST['date_submitted']);

            $sql = "UPDATE feedbacks SET customer_name=?, email=?, feedback=?, rating=?, date_submitted=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $customer_name, $email, $feedback_text, $rating, $date_submitted, $id);

            if ($stmt->execute()) {
                header("Location: index.php?msg=Record updated successfully");
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $feedback['id']; ?>">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($feedback['customer_name']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($feedback['email']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                <input type="text" id="feedback" name="feedback" value="<?php echo htmlspecialchars($feedback['feedback']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" id="rating" name="rating" value="<?php echo htmlspecialchars($feedback['rating']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="date_submitted" class="block text-sm font-medium text-gray-700">Date Submitted</label>
                <input type="date" id="date_submitted" name="date_submitted" value="<?php echo htmlspecialchars($feedback['date_submitted']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Customer</button>
            </div>
        </form>
    </div>
</body>
</html>



