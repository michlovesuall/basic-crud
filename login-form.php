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
  <title>Sign In | Basic CRUD Operations</title>
</head>

<body>
  <div
    class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card w-25">
      <form class="card-body">
        <h1 class="text-center">Login</h1>
        <div class="container d-flex flex-column">
          <div class="mb-3">
            <label for="email-add" class="form-label">Enter email address:</label>
            <input
              type="email"
              class="form-control"
              id="email-add"
              aria-describedby="emailHelp" />
            <p class="email-error text-danger ms-2 mb-0">Error</p>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Enter password:</label>
            <input type="password" class="form-control" id="password" />
            <p class="email-error text-danger ms-2 mb-0">Error</p>
          </div>
          <div class="mb-3 form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="show-password" />
            <label class="form-check-label" for="show-password">Show Password</label>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
      <a class="mb-3 text-center" href="signup-form.php">Create an account? Sign Up</a>
    </div>
  </div>
  <script src="login.js"></script>
</body>

</html>