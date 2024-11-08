<?php
require 'config.php';
header('Content-type: application/json');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];
    $username = $data['username'];
    $firstname = $data['firstname'];
    $middlename = $data['middlename'];
    $lastname = $data['lastname'];
    $password = $data['password'];

    if (!empty($email) && !empty($username) && !empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($password)) {

        $stmt = $conn->prepare('INSERT INTO users (email, username, firstname, middlename, lastname, password) VALUES (:email, :username, :firstname, :middlename, :lastname, :password)');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Data inserted successfully!']);
        } else {
            echo json_encode(['message' => 'Failed to insert data.']);
        }
    } else {
        echo json_encode(['message' => 'Please fill in all fields.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}
