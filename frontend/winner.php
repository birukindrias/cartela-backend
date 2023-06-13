<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>game</title>
    <link rel="stylesheet" href="./style.css" />
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <!-- <script defer src="io.js"></script> -->
    <!-- <script defer src="script.js"></script> -->
    <script defer src="winner.js"></script>


</head>

<body>
    <div class="game_container_winner">
        <div class="game_items">
            <img src="/assets/box.png" id='myImage_winner' class="rotate-image_winner" />
            <!-- <div class="winner">: </div> -->
            <div id="w_number">
                <h1>12</h1>
            </div>
        </div>
        <div class="w_name">
            <h2 class="w_name_number_">winner</h2>
        </div>
        <div class="w_p_list">
privous winner  
        </div>

    </div>

    <div class="room" hidden><?= $_GET['room'] ?></div>

    <div class="type" hidden>
        <?php echo $_GET['type']; ?>
    </div>
    <div class="win" hidden>
        <?php echo $_GET['game_winner']; ?>
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
    <script>
     
    </script>
</body>

</html>