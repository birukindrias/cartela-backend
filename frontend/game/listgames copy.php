<!-- -->
<!-- <div class="grid place-content-center">welcome to the small www php mvc framework</div> -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="../style/style.css">
    <script defer src="../script/io.js"></script>

    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
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
            include_once '../i.php'; ?>
        </div>
    </div>

</body>

</html>



<?php

namespace App\App\Http\Controllers;

use App\App\models\Admins;
use App\App\models\Mnger;
use App\App\models\Users;
use App\config\App;
use App\config\Controller;

class AuthController extends Controller
{

    public function index()
    {

        return $this->render('home', 'home');
    }
    public function save_winner()
    {
        $data = json_decode(file_get_contents('php://input'), true);
//         $win = $request->input('win');
//   $room = $request->input('room');

  // This line is causing the error
//   $header = $request->header('Content-Type');
var_dump ($data);
        // header('Content-Type: application/json');
        echo json_encode($data);
        $all =$data['win'];
        var_dump ($all);
        var_dump ($data['room']);
        $sq = "INSERT INTO game (game) VALUES ($all)";
        $stmt = App::$app->database->pdo->prepare($sq);
            $stmt->execute();

        echo json_encode([$data]);
    }
    public function registerapi()
    {
          $users =
                        new Users();

          
          $uselll=
          $users->get()
           $delimiter = "|";
           $results = explode($delimiter, $string);
          
           $string = "34|20|user|25";
           $delimiter = "|";
           $results = explode($delimiter, $string);
           
           $user_array = [];
           
           foreach ($results as $item) {
           if ($item == "user") {
           $user_array[] = $item;
           } else {
           $user_array[] = "admin";
           }
           }
           
           echo "The user array is: " . implode(", ", $user_array) . "\n";
           
           
           
           foreach ($results as $item) {
           echo $item . "\n";
           }
           
           
        if (App::$app->request->is_post()) {
            $data = json_decode(file_get_contents('php://input'), true);
                        //    unset ($data['paymentmethod']) ;
                        //    var_dump cu/
                        // var_dump ($data );
                        // var_dump ($data['password'] );
                        // var_dump ($data['p/honeNumber'] );
                        $users->loadData ($data);
                             if ( $users->save()) {

                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
                            'success' => true,
                            'message' => 'Registration successful',
                            'redirect' => '/home'
                        ];

                    // header('Content-Type: application/json');
                    // echo json_encode($response);
                    } else {
                        $errors = '$users->getErrors()';
                        $response = [
                            'success' => false,
                            'message' => 'Registration failed',
                            'errors' => $errors
                        ];
                    }  // unsez   

                    header('Content-Type: application/json');
                    echo json_encode($response);
            switch ($data['type']) {
                case 'users':
                    $users =
                        new Users();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
                            'success' => true,
                            'message' => 'Registration successful',
                            'redirect' => '/home'
                        ];
                    } else {
                        $errors = '$users->getErrors()';
                        $response = [
                            'success' => false,
                            'message' => 'Registration failed',
                            'errors' => $errors
                        ];
                    }

                    header('Content-Type: application/json');
                    echo json_encode($response);
                    return;
                    break;

                case 'admin':
                    $users =
                        new Admins();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
                            'success' => true,
                            'message' => 'Registration successful',
                            'redirect' => '/home'
                        ];
                    } else {
                        $errors = '$users->getErrors()';
                        $response = [
                            'success' => false,
                            'message' => 'Registration failed',
                            'errors' => $errors
                        ];
                    }

                    header('Content-Type: application/json');
                    echo json_encode($response);
                    return;
                    break;

                case 'mngr':
                    $users =
                        new Mnger();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
                            'success' => true,
                            'message' => 'Registration successful',
                            'redirect' => '/home'
                        ];
                    } else {
                        $errors = '$users->getErrors()';
                        $response = [
                            'success' => false,
                            'message' => 'Registration failed',
                            'errors' => $errors
                        ];
                    }

                    header('Content-Type: application/json');
                    echo json_encode($response);
                    return;
                    break;

                default:
                    # code...
                    break;
            }
        }

        // return $this->render('pages/Auth/register', 'mvc | Register');
    }

    public function register()
    {


        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            // $data['balance'] = 0;
            $users->loadData($data);
            var_dump('da');

            if ($users->validate() && $users->save()) {
                $id =  $users->get(['phonenumber' => $data['phonenumber'], 'password' => $data['password']])[0]['uid'];
                App::$app->session->setItem('id', $id);
                App::$app->session->setFlash('success', 'Thanks for registering');
                return   App::$app->response->redirect('/home');
            }
        }
        return  $this->render('pages/Auth/register', 'mvc | Register');
    }
    public function login()
    {
        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            $id =  $users->get(['email' => $data['email'], 'password' => $data['password']])[0]['id'];
            if ($id) {
                App::$app->session->setItem('id', $id);
                $users->uploadFile();
                return App::$app->response->redirect('/home');
            } else {
                echo 'email or password is wrong!';
            }
        }
        return  $this->render('pages/Auth/login', 'mvc | Login');
    }
    public function logOut()
    {
        session_unset();
        return
            App::$app->response->redirect('/login');
    }
}