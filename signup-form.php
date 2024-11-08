<?
require "config.php";
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
  <title>Sign Up | Basic CRUD Operations</title>
</head>

<body>
  <div
    class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card">
      <form id="signup-form" class="card-body">
        <div style="display: none;" class="alert alert-danger" role="alert">
          Account creation failed! Please double check your inputs.
        </div>
        <h1 class="text-center">Sign Up</h1>
        <div class="container d-flex flex-column">
          <div class="mb-3 row">
            <div class="col">
              <label for="email-add" class="form-label">Enter Email address:</label>
              <input
                autocomplete="email"
                name="email"
                placeholder="johndoe@gmail.com"
                type="email"
                class="form-control"
                id="email-add"
                aria-describedby="emailHelp" />
              <p id="email-error" class="text-danger ms-2 mb-0"></p>
            </div>
            <div class="col">
              <label for="username" class="form-label">Enter username:</label>
              <input
                autocomplete="username"
                name="username"
                placeholder="johndoe_m4p4gmaH4L"
                type="text"
                class="form-control"
                id="username"
                aria-describedby="emailHelp" />
              <p class="username-error text-danger ms-2 mb-0"></p>
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label for="firstname" class="form-label">Enter firstname:</label>
              <input
                name="firstname"
                placeholder="John"
                type="text"
                class="form-control"
                id="firstname"
                aria-describedby="emailHelp" />
              <p class="fname-error text-danger ms-2 mb-0"></p>
            </div>
            <div class="col">
              <label for="middlename" class="form-label">Enter middlename:</label>
              <input
                name="middlename"
                placeholder="Beckert"
                type="text"
                class="form-control"
                id="middlename"
                aria-describedby="emailHelp" />
              <p class="mname-error text-danger ms-2 mb-0"></p>
            </div>
            <div class="col">
              <label for="lastname" class="form-label">Enter lastname:</label>
              <input
                name="lastname"
                placeholder="Doe"
                type="text"
                class="form-control"
                id="lastname"
                aria-describedby="emailHelp" />
              <p class="lname-error text-danger ms-2 mb-0"></p>
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label for="password" class="form-label">Enter Password:</label>
              <input name="password" type="password" class="form-control" id="password" />
              <p class="password-error text-danger ms-2 mb-0"></p>
            </div>
            <div class="col">
              <label for="confirm-password" class="form-label">Confirm Password:</label>
              <input
                name="confirm-password"
                type="password"
                class="form-control"
                id="confirm-password" />
              <p class="confirm-password-error text-danger ms-2 mb-0"></p>
            </div>
          </div>
          <div class="mb-3 form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="password-checkbox" />
            <label class="form-check-label" for="password-checkbox">Show Password</label>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
      </form>
      <a class="mb-3 text-center" href="login-form.php">Already have an account? Sign In</a>
    </div>
  </div>
  <script src="signup.js"></script>
</body>

</html>