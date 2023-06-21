<!DOCTYPE html>
<html>

<head>
    <title>Rooms Grid</title>
    <style>
        /* CSS for the grid */
        body {
            background: black;

        }

        .grid-containerip {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            justify-items: center;
            align-items: center;
            text-align: center;
        }

        .room-number {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            width: 10rem;
            height: 10rem;
            background-color: #eaeaea;
            background: red;
            border-radius: 50%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .room-number:hover {
            color: yellow;
            background-color: #b3b3b3;
        }

        .room-number a {
            text-decoration: none;
            color: #333333;
            color: yellow;

        }

        .containerip {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .containerip label {
            display: block;
            margin-bottom: 10px;
        }

        .containerip input[type="text"],
        .containerip select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .containerip button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>

<body>
    <button id="logoutButton">Logout</button>

    <div class="containerip" id="loginForm">
        <h2>Login</h2>
        <form>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment">
                <option value="tellbirr">Tellbirr</option>
                <option value="chapa">Chapa</option>
            </select>

            <button class="loginin">Login</button>
        </form>
    </div>
    <div class="grid-containerip">
        <!-- Generating the grid dynamically from the rooms array -->
        <?php
        $rooms = [10, 20, 30, 40];
        foreach ($rooms as $room) {
        ?>
            <div class="room-number">
                <a href="game.php?room=<?php echo $room; ?>"><?php echo $room; ?></a>
                </div>
        <?php
        }
        ?>
    </div>
    <script>
        // Add event listener to the logout button
        document.getElementById("logoutButton").addEventListener("click", function() {
            // Remove the session storage item
            sessionStorage.removeItem("id");

            // Redirect or perform other actions after logout
            // window.location.href = "logout.html";
        });

        document.querySelector('.loginin').onclick = (e => {
            // Get the form values
            e.preventDefault();

            const phoneNumber = document.getElementById('phone').value;
            const paymentMethod = document.getElementById('payment').value;

            // Save the form data to session storage
            sessionStorage.setItem('id', phoneNumber);
            sessionStorage.setItem('paymentMethod', paymentMethod);

            // Optionally, you can perform any additional actions or validations here

            // Display a success message
            console.log('Form data saved to session storage!');
        })

        function login() {
            // if (sessionStorage.getItem('id')) {
            //     document.querySelector('.grid-containerip').disp
            // }

            // Check if sessionStorage has an item with the specified id
            if (sessionStorage.getItem('id')) {
                // Add the 'grid-containerip' class to the body element
                document.body.classList.add('grid-containerip');
            }
        }

        function checkSessionStorage() {
            if (sessionStorage.getItem('id')) {
                document.getElementById('loginForm').style.display = 'none';
                document.querySelector('.grid-containerip').style.display = 'grid';
                document.getElementById('logoutButton').style.display = 'grid';
                // document.body.classList.add('.grid-containerip');
                // document.body.classList.getElementById('logoutButton');
            } else {
                document.getElementById('loginForm').style.display = 'block';
                document.querySelector('.grid-containerip').style.display = 'none';
                document.getElementById('logoutButton').style.display = 'none';
            }
        }
        // Call the function initially to check the session storage on page load
        checkSessionStorage();

        // Check the session storage every 1 second (1000 milliseconds)
        setInterval(checkSessionStorage, 1000);
        // socket.on('array', ({ array }) => {
        // });
        socket.on('message', ({
            user,
            message
        }) => {
            const messagesDiv = document.getElementById('messages');
            const newMessage = document.createElement('div');
            newMessage.textContent = `[${user}]:${message}`;
            messagesDiv.appendChild(newMessage);
        });
    </script>
</body>

</html>