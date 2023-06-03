<!DOCTYPE html>
<html>

<head>
    <title>Login and Signup Page</title>
    <style>
        /* CSS for the form */
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        /* CSS for the form inputs */
        .form-container input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* CSS for the form submit button */
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        /* CSS for the error message */
        .error-message {
            color: #f00;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <input type="text" placeholder="Username" id="login-username">
        <input type="password" placeholder="Password" id="login-password">
        <button onclick="login()">Login</button>
    </div>

    <div class="form-container">
        <h2>Signup</h2>
        <input type="text" placeholder="Username" id="signup-username">
        <input type="password" placeholder="Password" id="signup-password">
        <input type="password" placeholder="Confirm Password" id="signup-confirm-password">
        <input type="text" placeholder="Phone Number" id="signup-phone">
        <button onclick="signup()">Signup</button>
    </div>

    <script>
        function login() {
            const username = document.getElementById("login-username").value;
            const password = document.getElementById("login-password").value;

            // Perform login validation here

            // Dummy code for demo
            if (username === "admin" && password === "password") {
                alert("Login successful");
            } else {
                alert("Invalid username or password");
            }
        }

        function signup() {
            const username = document.getElementById("signup-username").value;
            const password = document.getElementById("signup-password").value;
            const confirmPassword = document.getElementById("signup-confirm-password").value;
            const phoneNumber = document.getElementById("signup-phone").value;

            // Perform signup validation here

            // Dummy code for demo
            if (password !== confirmPassword) {
                showError("Passwords do not match");
            } else if (!validatePhoneNumber(phoneNumber)) {
                showError("Invalid phone number");
            } else {
                alert("Signup successful");
            }
        }

        function showError(message) {
            const errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message");
            errorMessage.textContent = message;

            document.body.appendChild(errorMessage);

            setTimeout(() => {
                errorMessage.remove();
            }, 3000);
        }

        function validatePhoneNumber(phoneNumber) {
            // Dummy phone number validation
            const regex = /^\d{10}$/;
            return regex.test(phoneNumber);
        }
    </script>
</body>

</html>