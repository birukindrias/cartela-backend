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
    <div class="top_container">
        <div class="game_listing">
            <!-- Generating the grid dynamically from the rooms array -->
            <?php
            $rooms = [10, 20, 30, 40];
            foreach ($rooms as $room) {
            ?>
                <div class="room-number">
                    <a href="game.php?room=<?php echo $room; ?>&type=<?= $_GET['type'] ?? 'user' ?>"><?php echo $room; ?>ETB</a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="ads">
            <div class="ad">

            </div>
        </div>
    </div>
    <div class="bottom_container">

        <div class="type" hidden>
            <?php echo $_GET['type'] ?? 'user'; ?></div>
        <div class="profile">
            <?php if ($_GET['type'] != 'user') {
                return;
            }
            include_once './i.php'; ?>
        </div>
    </div>

</body>

</html>