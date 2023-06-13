<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="./style.css" /> -->

    <title>Login</title>
    <style>
        /* CSS for the form */
        * {
            /* color: #fff; */
            margin: 0;
            box-sizing: border-box;
            padding: 0;
        }

        .main {
            width: 382px !important;
        }

        body {
            /* background-color: #000; */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            /* background: black url('http://localhost:8084/assets/bigbg.jpg'); */

        }

        .form-container {
            width: 88%;
            /* max-width: 100%; */
            margin: 0 auto;
            padding: 20px;
            background: black url('http://localhost:8084/assets/bigbg.jpg');
            border: 1px solid #fff;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 50px;
        }

        /* CSS for the form inputs */
        .form-container input {
            width: 88%;
            margin-bottom: 10px;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 5px;
            font-weight: bold;
        }

        /* CSS for the form submit button */
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #ff0;
            border: none;
            color: #000;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .aid {
            color: yellow;
            padding: 1px;
            font-weight: bold;
            background-color: black;
        }

        /* CSS for the error message */
        .error-message {
            color: #f00;
            margin-bottom: 10px;
        }

        h2 {
            color: yellow;
        }

        /* Media queries for responsive design */
        /* @media only screen and (min-width: 382px) {
            .form-container {
                width: 300px;
            }

            .form-container input {
                width: 92%;
            }
        }

        @media only screen and (min-width: 1200px) {
            .form-container {
                width: 500px;
            }
        } */
    </style>
</head>

<body>
    <div class="main">
        <div class="bo"></div>
        <div class="form-container" id="login-form">
            <h2>Login</h2>
            <input required type="text" placeholder="Username" id="login-username">
            <input required type="password" placeholder="Password" id="login-password">
            <button onclick="login()">Login</button>
            <a href="#" class="aid" id="dont-have-account">Don't have an account?</a>

        </div>

        <div class="form-container" id="signup-form" style="display: none;">
            <h2>Signup</h2>
            <input required type="text" placeholder="Username" id="signup-username">
            <input required type="password" placeholder="Password" id="signup-password">
            <input required type="password" placeholder="Confirm Password" id="signup-confirm-password">
            <input required type="text" placeholder="Phone Number" id="signup-phone">
            <button onclick="signup()">Signup</button>
            <a href="#" class="aid" id="already-have-account">Already have an account?</a>

        </div>

        <div class="type" hidden>
            <?php echo $_GET['type'] ?? 'user'
            ?> </div>
        <div class="profile">
            <?php if ($_GET['type'] ?? 'user' != 'user') {
                header('location: /listgames.php?&type=' . $_GET['type'] ?? 'user');

                return;
            }
            ?>
        </div>
    </div>
    <script>
        // JavaScript code
        function showSignupForm() {
            var loginForm = document.getElementById("login-form");
            var signupForm = document.getElementById("signup-form");

            loginForm.style.display = "none";
            signupForm.style.display = "block";
        }

        function showLoginForm() {
            var loginForm = document.getElementById("login-form");
            var signupForm = document.getElementById("signup-form");

            loginForm.style.display = "block";
            signupForm.style.display = "none";
        }

        var dontHaveAccountLink = document.getElementById("dont-have-account");
        dontHaveAccountLink.addEventListener("click", showSignupForm);

        var alreadyHaveAccountLink = document.getElementById("already-have-account");
        alreadyHaveAccountLink.addEventListener("click", showLoginForm);



        function signup() {
            const username = document.getElementById("signup-username").value;
            const password = document.getElementById("signup-password").value;
            const confirmPassword = document.getElementById("signup-confirm-password").value;
            const phoneNumber = document.getElementById("signup-phone").value;

            // Perform signup validation here

            // Dummy code for demo
            if (password !== confirmPassword) {
                showError("Passwords do not match");
            } else {
                signiup();
            }
        }

        function signiup() {
            // document.querySelector('.loginin').onclick = (e => {
            // Get the form values
            // e.preventDefault();
            sessionStorage.setItem('id', '5')
            location.href = '/listgames.php?type=user'
            return
            const signupUrl = 'http://localhost:8084/api/register'; // Replace with your actual API endpoint

            const signupData = {
                'type': 'user',
                'username': document.getElementById("signup-username").value,
                'password': document.getElementById("signup-password").value,
                'phoneNumber': document.getElementById("signup-phone").value,


            };


            fetch(signupUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(signupData)
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the API
                    console.log(data.id);
                    sessionStorage.setItem('id', data.id)



                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch request
                    console.error('Error:', error);
                });
            var dontHaveAccountLink = document.getElementById("dont-have-account");
            dontHaveAccountLink.addEventListener("click", showSignupForm);

            var alreadyHaveAccountLink = document.getElementById("already-have-account");
            alreadyHaveAccountLink.addEventListener("click", showLoginForm);
        }

        function checkSessionStorage() {

            if (!sessionStorage.getItem('id')) {
                // Add the 'grid-containerip' class to the body element
                document.body.classList.add('grid-containerip');
            } else {
                location.href = '/listgames.php?type=user'
            }
        }

        setInterval(checkSessionStorage, 1000);
        // socket.on('array', ({ array }) => {
        // });
        function login() {
            const username = document.getElementById("login-username").value;
            const password = document.getElementById("login-password").value;

            // Perform signup validation here

            // Dummy code for demo

            logini();
        }

        function logini() {
            // document.querySelector('.loginin').onclick = (e => {
            // Get the form values
            // e.preventDefault();
            const signupUrl = 'http://localhost:8084/api/login'; // Replace with your actual API endpoint

            const signupData = {
                'type': 'user',

                'username': document.getElementById("login-username").value,
                'password': document.getElementById("login-password").value,


            };


            fetch(signupUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(signupData)
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the API
                    console.log(data);
                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch request
                    console.error('Error:', error);
                });
            var dontHaveAccountLink = document.getElementById("dont-have-account");
            dontHaveAccountLink.addEventListener("click", showSignupForm);

            var alreadyHaveAccountLink = document.getElementById("already-have-account");
            alreadyHaveAccountLink.addEventListener("click", showLoginForm);
        }

        function showError(message) {
            const errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message");
            errorMessage.textContent = message;

            // document.body.appendChild(errorMessage);
            document.querySelector('.bo').append(errorMessage)
            setTimeout(() => {
                errorMessage.remove();
            }, 3000);
        }

        // function checkSessionStorage() {
        //     if (sessionStorage.getItem('id')) {
        //         document.getElementById('loginForm').style.display = 'none';
        //         document.querySelector('.grid-containerip').style.display = 'grid';
        //         document.getElementById('logoutButton').style.display = 'grid';
        //         // document.body.classList.add('.grid-containerip');
        //         // document.body.classList.getElementById('logoutButton');
        //     } else {
        //         document.getElementById('loginForm').style.display = 'block';
        //         document.querySelector('.grid-containerip').style.display = 'none';
        //         document.getElementById('logoutButton').style.display = 'none';
        //     }
        // }
        // function validatePhoneNumber(phoneNumber) {
        //     // Dummy phone number validation
        //     const regex = /^\d{10}$/;
        //     return regex.test(phoneNumber);
        // }
        // JavaScript code remains the same as before

        // JavaScript code remains the same as before
    </script>
</body>

</html>