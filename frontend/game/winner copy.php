<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>game</title>
    <link rel="stylesheet" href="../style/s.css" />
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <!-- <script defer src="io.js"></script> -->
    <!-- <script defer src="script.js"></script> -->
    <!-- <script defer src="winner.js"></script> -->
    <script defer src="../script/winner.js"></script>
    <!-- <script defer src="../script/script.js"></script> -->


</head>

<body>
    <div class="game_container_winner">
        <div class="game_items">
            <img src="/assets/box.png" id='myImage_winner'  />
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
    <div class="winner" hidden>
        <?php echo $_GET['win']; ?>
    </div>
    <div class="pr_winner" hidden>
        <?php echo $_GET['pr_win']; ?>
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
      let body = document.querySelector("#w_number h1");
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