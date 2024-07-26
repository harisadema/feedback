<!--
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO feedbacks (customer_name, email, feedback, rating) VALUES ('$customer_name', '$email', '$feedback', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>-->
<?php
include 'config.php';

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = validate_input($_POST['customer_name']);
    $email = filter_var(validate_input($_POST['email']), FILTER_VALIDATE_EMAIL);
    $feedback = validate_input($_POST['feedback']);
    $rating = (int)$_POST['rating'];

    if ($email && $rating >= 1 && $rating <= 5) {
        $sql = "INSERT INTO feedbacks (customer_name, email, feedback, rating) VALUES ('$customer_name', '$email', '$feedback', '$rating')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid input";
    }

    $conn->close();
}
?>

