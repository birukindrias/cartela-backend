<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>game</title>
    <link rel="stylesheet" href="./style.css" />
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <script defer src="io.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <img src="http://localhost:8084/assets/box.jpg" id='myImage' class="rotate-image" alt="Rotated Image">

    <div class="container">
        <!-- <div class="winner">: </div> -->

        <div id="grid"></div>

    </div>
    <div class="room" hidden><?= $_GET['room'] ?></div>

    <div class="type" hidden>
        <?php echo $_GET['type']; ?>
    </div>
    <div class="profile">
        <?php if ($_GET['type'] != 'user') {
            return;
        }
        include_once './i.php'; ?>
    </div>

    <!-- <div id="app">
        <input type="text" id="room" placeholder="Enter room">
        <button onclick="joinRoom()">Join Room</button>
        <div id="messages"></div>
        <input type="text" id="message" placeholder="Enter message">
        <button onclick="sendMessage()">Send Message</button>
    </div> -->
    <!-- <div id="grid"></div> -->
    <!-- <script src="/socket.io/socket.io.js"></script> -->
    <!-- <script src="script.js"></script> -->
</body>

</html>