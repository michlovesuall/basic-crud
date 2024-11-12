<?php
require("config.php");

if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $id = $_GET['id'];

    try {
        // Prepare and execute the SELECT statement to fetch the user data
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if (!$user) {
            echo "User not found.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No ID specified.";
    exit();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    try {
        // Prepare the UPDATE statement
        $stmt = $conn->prepare("UPDATE users SET username = :username, firstname = :firstname, middlename = :middlename, lastname = :lastname, email = :email WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to dashboard after updating
            header("Location: dashboard.php?status=updated");
            exit();
        } else {
            echo "Error: Could not update the user.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Update User</title>
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card">
            <h2 class="text-center mt-3">Update User</h2>
            <form class="card-body" action="update.php?id=<?= htmlspecialchars($id); ?>" method="post">
                <div class="container d-flex gap-2">
                    <div>
                        <label class="form-label" for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']); ?>" required><br>
                    </div>
                    <div>
                        <label class="form-label" for="firstname">First Name:</label>
                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?= htmlspecialchars($user['firstname']); ?>" required><br>
                    </div>



                </div>
                <div class="container d-flex justify-content-between">
                    <div>
                        <label class="form-label" for="middlename">Middle Name:</label>
                        <input class="form-control" type="text" name="middlename" id="middlename" value="<?= htmlspecialchars($user['middlename']); ?>"><br>
                    </div>
                    <div>
                        <label class="form-label" for="lastname">Last Name:</label>
                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?= htmlspecialchars($user['lastname']); ?>" required><br>
                    </div>
                </div>
                <div class="container">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']); ?>" required><br>
                </div>
                <button class="btn btn-primary w-100" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>