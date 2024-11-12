<?php
require("config.php");
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $userId = $_GET['id'];

    try {
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to dashboard after deletion
            header("Location: dashboard.php?status=deleted");
            exit();
        } else {
            echo "Error: Could not delete the user.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No ID specified.";
}
