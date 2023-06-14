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
    <div class="total_user">
</div>
    <div class="game_container">
        <!-- <img src="./assets/box.png" id='myImage' class="rotate-image rt" alt="Rotated Image"> -->
        <div class="game_items">

            <!-- <div class="winner">: </div> -->

            <div id="grid_listing"></div>


        </div>
    </div>
    <div class="room" hidden><?= $_GET['room'] ?></div>

    <div class="type" hidden>
        <?php echo $_GET['type']; ?>
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