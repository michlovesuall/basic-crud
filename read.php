<?php

try {
    // Prepare an SQL statement to select user data
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();

    // Fetch all results as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle any errors that occur
    echo "Error: " . $e->getMessage();
}
