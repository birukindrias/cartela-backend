<!-- -->
<!-- <div class="grid place-content-center">welcome to the small www php mvc framework</div> -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="../style/10.css">
    <script defer src="../script/io.js"></script>

    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <!-- <script defer src="/script.js"></script> -->

    <style lang="css">
        .card-container {
            background: url("http://localhost:8086/assets/box.jpg");

        }
    </style>

</head>

<body>
    <div class="top_container">
        <section class="container">
            <div class="card-container">
                <h1> <a href="game.php?room=<?php echo '10'; ?>&type=<?= $_GET['type'] ?? 'user' ?>"><?php echo '10'; ?>ETB</a>
                </h1>
            </div>
            <div class="card-container">
                <h1> <a href="game.php?room=<?php echo '20'; ?>&type=<?= $_GET['type'] ?? 'user' ?>"><?php echo '20'; ?>ETB</a>
            </div>
            <div class="card-container">
                <h1> <a href="game.php?room=<?php echo '30'; ?>&type=<?= $_GET['type'] ?? 'user' ?>"><?php echo '30'; ?>ETB</a>
            </div>
            <div class="card-container">
                <h1>100</h1>
            </div>

        </section>
        <div class="bottom_container">

            <div class="type" hidden>
                <?php echo $_GET['type'] ?? 'user'; ?></div>
            <div class="profile">
                <?php if ($_GET['type'] != 'user') {
                    return;
                }
                include_once '../i.php'; ?>
            </div>
        </div>
    </div>


</body>

</html>