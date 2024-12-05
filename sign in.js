// Mock user database
const users = [
    {
      email: "user1@example.com",
      password: btoa("password123") // Encrypted password
    },
    {
      email: "user2@example.com",
      password: btoa("securepass")
    }
  ];

  // Toggle password visibility
  function togglePassword() {
    const passwordField = document.getElementById("password");
    const toggleIcon = document.querySelector(".toggle-password");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleIcon.textContent = "👁";
    } else {
      passwordField.type = "password";
      toggleIcon.textContent = "🙈";
    }
  }

  // Login Form Validation
  document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Check password length
    if (password.length < 6) {
      alert("Password must be at least 6 characters long.");
      return;
    }

    // Check if user exists
    let user = users.find((user) => user.email === email);

    if (user) {
      // Validate password
      if (user.password === btoa(password)) {
        alert("Login successful! Welcome, " + email);
        e.target.reset(); // Reset the form after successful login
      } else {
        alert("Invalid password.");
      }
    } else {
      // Automatically register new user
      users.push({
        email: email,
        password: btoa(password)
      });
      alert("New user registered and logged in! Welcome, " + email);
      e.target.reset(); // Reset the form after successful login
    }
  });

  // Forgot Password
  function showForgotPassword() {
    const email = prompt("Enter your registered email:");
    const user = users.find((user) => user.email === email);

    if (user) {
      alert("Your password is: " + atob(user.password));
    } else {
      alert("Email not registered.");
    }
  }

  // Change Password
  function showChangePassword() {
    const email = prompt("Enter your registered email:");
    const user = users.find((user) => user.email === email);

    if (user) {
      const oldPassword = prompt("Enter your old password:");
      if (btoa(oldPassword) === user.password) {
        const newPassword = prompt("Enter your new password:");
        if (newPassword.length < 6) {
          alert("Password must be at least 6 characters long.");
        } else {
          user.password = btoa(newPassword); // Update password
          alert("Password changed successfully!");
        }
      } else {
        alert("Old password is incorrect.");
      }
    } else {
      alert("Email not registered.");
    }
  }