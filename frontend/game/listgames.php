<!-- -->
<!-- <div class="grid place-content-center">welcome to the small www php mvc framework</div> -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="../assets/index.css">
    <script defer src="../script/io.js"></script>

    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <!-- <script defer src="/script.js"></script> -->


</head>

<body>
    <div class="main-container">

        <div class="container">
            <?php
            $rooms = [10, 20, 30, 40];
            foreach ($rooms as $room) {
            ?>
                <div class="card-container">
                    <h1><a href="game.php?room=<?php echo $room; ?>&type=<?= $_GET['type'] ?? 'user' ?>"><?php echo $room; ?>ETB</a>
                    </h1>
                </div>
            <?php
            }
            ?>
        
        </div>

        <div class="profile-reset">
            <a href="#" class="pr-link">Reset</a>
            <a href="#" class="pr-link">Profile</a>
        </div>
    </div>

</body>

</html>