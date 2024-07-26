<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM feedbacks WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Record deleted successfully");
    } else {
        echo "<div class='bg-red-100 text-red-700 p-4 mb-4 rounded-lg text-center'>
                Error: " . $stmt->error . "
              </div>";
    }
    $stmt->close();
} else {
    echo "<div class='bg-red-100 text-red-700 p-4 mb-4 rounded-lg text-center'>
            Error: No ID provided
          </div>";
}

$conn->close();
?>
