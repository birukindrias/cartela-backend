<!-- -->
<!-- <div class="grid place-content-center">welcome to the small www php mvc framework</div> -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="./style.css">
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <script defer src="/io.js"></script>
    <!-- <script defer src="/script.js"></script> -->
</head>

<body>
    <div class="gridi-containerip">
        <!-- Generating the grid dynamically from the rooms array -->
        <?php
        $rooms = [10, 20, 30, 40];
        foreach ($rooms as $room) {
        ?>
            <div class="room-number">
                <a href="game.php?room=<?php echo $room; ?>&type=<?=$_GET['type']??'user'?>"><?php echo $room; ?>ETB</a>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="type" hidden>
        <?php echo $_GET['type'] ?? 'user'; ?></div>
    <div class="full-">
        <?php if ($_GET['type'] ?? 'user' != 'user') {
            return;
        }
        include_once './i.php'; ?></div>

    asdfsad

    <script>
    </script>
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