document.addEventListener("DOMContentLoaded", function () {
  const emailField = document.querySelector("#email-add");
  const unameField = document.querySelector("#username");
  const fnameField = document.querySelector("#firstname");
  const mnameField = document.querySelector("#middlename");
  const lnameField = document.querySelector("#lastname");

  const passwordField = document.querySelector("#password");
  const confirmPasswordField = document.querySelector("#confirm-password");

  const passwordCheckbox = document.querySelector("#password-checkbox");

  const signupFailedAlert = document.querySelector("div.alert.alert-danger");

  passwordCheckbox.addEventListener("click", function () {
    passwordField.type = this.checked ? "text" : "password";
    confirmPasswordField.type = this.checked ? "text" : "password";
  });

  const signupForm = document.querySelector("form.card-body");

  signupForm.addEventListener("submit", async function (event) {
    event.preventDefault(); // Add parentheses to prevent form submission

    const emailResults = emailFieldValidation(emailField);
    const fnameResults = charFieldValidation(fnameField);
    const mnameResults = charFieldValidation(mnameField);
    const lnameResults = charFieldValidation(lnameField);
    const unameResults = charFieldValidation(unameField);
    const passResults = passwordChecking(passwordField, confirmPasswordField);

    // Example condition to check if all validations passed
    if (
      emailResults &&
      fnameResults &&
      mnameResults &&
      lnameResults &&
      unameResults &&
      passResults
    ) {
      signupFailedAlert.style.display = "none";

      const formData = new FormData(this);

      // Insert Data here using fetch API
      try {
        const response = await fetch("insert.php", {
          method: "POST",
          headers: {
            "Content-type": "application/json",
          },
          body: JSON.stringify(formData),
        });

        const result = await response.json();
        console.log(result);
      } catch (error) {}
    } else {
      console.error("Error: ", error);
      signupFailedAlert.style.display = "block";
    }
  });

  // Email Validation
  function emailFieldValidation(field) {
    const value = field.value;
    const errorElement = document.getElementById("email-error");

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!value) {
      errorElement.textContent = "Field is empty.";
      return false;
    } else {
      if (!emailPattern.test(value)) {
        // Test the value, not "email"
        errorElement.textContent = "Please enter a valid email address.";
        return false;
      } else {
        errorElement.textContent = ""; // Clear the error message
        return true;
      }
    }
  }

  // Character Field Validation (example)
  function charFieldValidation(field) {
    const fieldValue = field.value;
    if (!fieldValue) {
      field.nextElementSibling.textContent = "Field is empty.";
      return false;
    } else {
      field.nextElementSibling.textContent = "";
      return true;
    }
  }

  function passwordChecking(password, confirmPassword) {
    const passwordValue = password.value;
    const confirmPasswordValue = confirmPassword.value;

    if (!passwordValue) {
      password.nextElementSibling.textContent = "Password field is empty!";
    } else {
      if (!confirmPasswordValue || confirmPasswordValue !== passwordValue) {
        confirmPassword.nextElementSibling.textContent =
          "Password doesn't match!";
        return false;
      } else {
        if (passwordValue === confirmPasswordValue) {
          confirmPassword.nextElementSibling.textContent = "";
          password.nextElementSibling.textContent = "";
          return true;
        }
      }
    }
  }
});
