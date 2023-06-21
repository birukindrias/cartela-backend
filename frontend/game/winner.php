<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>game</title>
    <!-- <link rel="stylesheet" href="../style/s.css" /> -->
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <!-- <script defer src="io.js"></script> -->
    <!-- <script defer src="script.js"></script> -->
    <!-- <script defer src="winner.js"></script> -->
    <script defer src="../script/winner.js"></script>
    <!-- <script defer src="../script/script.js"></script> -->

    <link rel="stylesheet" href="../assets/index.css" />

</head>

<body>
    <div class="container">
        <div class="img-number-container">
            <!-- <img src="./fredrick-tendong-6ou8gWpS9ns-unsplash.jpg" alt="image" /> -->
            <img src="/assets/box.png" id='myImage_winner' />

            <h33 font-size="3.5rem !important">30</h33>
        </div>

        <div class="texts">
            <h36 font-size="3.5rem !important">the winner is</h36>
            <h2>previous winners</h2>
        </div>

        <div class="footer-text">
            <!-- <h1>win2</h1> -->
            <h1> <?php echo $_GET['pr_win']; ?></h1>
        </div>
    </div>
    <!-- <div class="w_name">
        <h2 class="w_name_number_">winner</h2>
    </div>
    <div class="w_p_list">
        privous winner
    </div> -->


    <div class="room" hidden><?= $_GET['room'] ?></div>

    <div class="type" hidden>
        <?php echo $_GET['type']; ?>
    </div>
    <div class="winner" hidden>
        <?php echo $_GET['win']; ?>
    </div>
    <div class="pr_winner" hidden>
        <?php echo $_GET['pr_win']; ?>
    </div>
    <div class="winner_now" hidden>
        <?php echo $_GET['winn_winner']; ?>
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
        let body = document.querySelector("h33");
        let randomNumber = randomNumberGenerator(1, 100);
        console.log(body);
        console.log(randomNumber);
        // Set the value of the h2 element to the random number
        body.innerHTML = randomNumber;
        const interval = setInterval(() => {
            // Generate a random number between 1 and 100
            const randomNumber = randomNumberGenerator(1, 100);

            // Set the value of the h2 element to the random number
            body.textContent = randomNumber;
        }, 1000);
    </script>
</body>

</html>