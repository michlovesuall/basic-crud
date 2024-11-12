<?php

require("delete.php");
require("read.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <title>Dashboard | Basic CRUD Operations</title>
</head>

<body>
  <div
    class="container vh-100 d-flex justify-content-center align-items-center flex-column">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">User No.</th>
          <th scope="col">Username</th>
          <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($users) && count($users) > 0): ?>
          <?php foreach ($users as $user): ?>
            <tr>
              <th scope="row"><?= htmlspecialchars($user['id']); ?></th>
              <td><?= htmlspecialchars($user['username']); ?></td>
              <td><?= htmlspecialchars($user['firstname']); ?></td>
              <td><?= htmlspecialchars($user['middlename']); ?></td>
              <td><?= htmlspecialchars($user['lastname']); ?></td>
              <td><?= htmlspecialchars($user['email']); ?></td>
              <td>
                <a href="update.php?id=<?= htmlspecialchars($user['id']); ?>" class="btn btn-primary">Update</a>
                <a href="delete.php?id=<?= htmlspecialchars($user['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center">No users found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>