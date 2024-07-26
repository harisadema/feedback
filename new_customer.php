<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl text-center mb-5">Customer Feedback Form</h1>
        <form action="submit_feedback.php" method="POST" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700">Customer Name</label>
                <input type="text" name="customer_name" class="w-full border border-gray-300 p-2 rounded mt-1 "placeholder="Name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded mt-1"placeholder="Email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Feedback</label>
                <textarea name="feedback" class="w-full border border-gray-300 p-2 rounded mt-1"placeholder="Your feedback" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Rating (1-5)</label>
                <input type="number" name="rating" min="1" max="5" class="w-full border border-gray-300 p-2 rounded mt-1"placeholder="Rate" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            <button type="cancel" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
           
        </form>
    </div>
</body>
</html>