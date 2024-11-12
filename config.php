<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=basic-crud", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully!";
} catch (PDOException $e) {
    // Return error response
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $e->getMessage()]);
    exit(); // Stop further execution if connection fails
}
