<?php
require 'config.php';
header("Content-Type: application/json");

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);

    try {

        if ($data) {

            $email = $data['email'];
            $username = $data['username'];
            $firstname = $data['firstname'];
            $middlename = $data['middlename'];
            $lastname = $data['lastname'];
            $password = $data['password'];

            if (!empty($email) || !empty($username) || !empty($firstname) || !empty($middlename) || !empty($lastname) || !empty($password)) {
                $stmt = $conn->prepare('INSERT INTO users (email, username, firstname, middlename, lastname, password) VALUES (:email, :username, :firstname, :middlename, :lastname, :password)');
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':middlename', $middlename);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':password', $password);

                if ($stmt->execute()) {
                    $response = [
                        "status" => "success",
                        "message" => "Data inserted successfully.",
                        "data" => $data,
                    ];
                } else {
                    $response = [
                        "status" => "failed",
                        "message" => "Data insertion failed.",
                    ];
                }
            } else {
                $response = [
                    "status" => "failed",
                    "message" => "Please fill in the blanks carefully.",
                ];
            }
        }
    } catch (Exception $e) {
        $response = [
            "status" => "error",
            "message" => $e->getMessage()
        ];
    }
} else {
    $response = [
        "status" => "error",
        "message" => "Invalid request method"
    ];
}

// Ensure JSON response is always returned
echo json_encode($response);
