<?php
session_start();
if (isset($_SESSION['user'])) {
    # code...
    header('location:home.php');
} else {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | rgubook</title>

        <!-- Font Awesome -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/mdb_pro_min.css">
        <link rel="stylesheet" href="assets/jquery-confirm.min.css">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
        <script src="js/jquery-confirm.min.js"></script>

        <style>
            * {
                font-family: 'Roboto', arial;
            }
        </style>
    </head>

    <body class="skin-light">


        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">

            <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Login</b> </a>


        </nav>
        <!-- Default form login -->
        <div class="card" style="margin: 50px auto;width: 450px;">
            <form class="text-center border border-light p-5" action="login.php" method="post">

                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input type="text" id="defaultLoginFormId" class="form-control mb-4" name="id_no" placeholder="ID No" required />

                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="password" placeholder="Password" required />

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="login">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    Please Contact Admin
                </p>
            </form>
            <!-- Default form login -->
        </div>
    </body>

    </html>

<?php
}

if (isset($_POST['login'])) {

    include "dbconnect.php";

    $user = mysqli_real_escape_string($conn, $_POST['id_no']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE user_id = '$user' AND passcode = '$pass'";
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($res);


    $count = mysqli_num_rows($res);

    if ($count == 1) {

        $sub_sql = "INSERT INTO login_details(user_id) VALUES('$user')";
        $sub_query = mysqli_query($conn, $sub_sql);
        $_SESSION['user_id'] = $user;
        # code...
        $_SESSION['user'] = strtoupper($user);

        echo "<script>
                $.alert({
                    icon: 'far fa-check-circle',
                    title: 'Login',
                    content: 'Successfully LoggedIn!!!',
                    theme: 'modern',
                    type: 'blue',
                    buttons: {
                        OK: {
                            btnClass: 'btn-success',
                            action: function(){
                                location.href = 'home.php'
                            }
                        }
                    }
                })
                </script>";
        // header('location: home.php');
        #echo "<script>window.location='home.php';</script>";
    } else {
        echo "<script>
                $.alert({
                    icon: 'far fa-sad-tear',
                    title: 'Login',
                    content: 'Invalid Details',
                    theme: 'modern',
                    type: 'red'
                })
                </script>";
    }
}

?>