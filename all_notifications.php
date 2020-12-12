<?php

include "dbconnect.php";
session_start();

if ($_SESSION['user'] != NULL) {
    # code...
    $user_id = $_SESSION['user'];

    $sql = "SELECT * FROM notifications where to_user='$user_id' and isviewed=0";
    $query = mysqli_query($conn, $sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notifications</title>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="assets/mdb_pro_min.css">


        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <link rel="stylesheet" href="assets/style.css">
    </head>

    <body class="skin-light">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top scrolling-navbar">

            <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Notifications</b> </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home"></i> <span class="visibl"><b>Home</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="find_friends.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Find Friends"><i class="fas fa-users"></i> <span class="visibl"><b>Find Friends</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a data-touserid="<?php echo $_SESSION['user']; ?>" href="javascript:void(0)" class="nav-link text-white test notifications" data-toggle="popover-click" data-placement="bottom"><i class="fas fa-bell"></i> <span class="visibl"><b>Notifications</b></span><span class="badge badge-warning notification_count" data-touserid="<?php echo $user_row['user_id']; ?>">0</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="friend_requests.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Friend Requests"><i class="fas fa-users"></i> <span class="visibl"><b>Friend Requests</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="messenger.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Messenger"><i class="fab fa-facebook-messenger"></i> <span class="visibl"><b>Messenger</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="Discussions/" target="_blank" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Discussions"><i class="fab fa-discourse"></i> <span class="visibl"><b>Discussions</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="View Profile"><i class="fas fa-user"></i> <span class="visibl"><b><?php echo $_SESSION['user']; ?></b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Click To Logout"><i class="fas fa-sign-out-alt"></i> <span class="visibl"><b>LogOut</b></span></a>
                    </li>
                </ul>
            </div>

        </nav>

        <main>
            <div class="container">
                <section class="mt-4 mb-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <?php
                            $count_rows = mysqli_num_rows($query);
                            if ($count_rows >= 1) {
                                while ($notification_row = mysqli_fetch_assoc($query)) {
                            ?>
                                    <a class="card friend-request-card" style="color: black;" href="javascript:void(0)">
                                        <div class="card-body">
                                            <div>Friend request from <strong><?php echo $notification_row['from_user']; ?></strong></div>
                                        </div>
                                    </a>
                            <?php }
                            } else {
                                echo '<div class="card friend-request-card text-center" style="margin: 50px auto;padding: 20px;"><strong>No Notifications</strong></div>';
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </main>

    </body>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('[data-toggle="popover-click"]').popover({
            html: true,
            trigger: 'click',
            placement: 'bottom',
            title: '<a href="all_notifications.php">see all notifications</a>',
            content: function() {
                var to_user_id = $(this).data('touserid');
                var data = '';
                $.ajax({
                    url: 'get_notifications.php',
                    type: 'post',
                    async: false,
                    data: 'to_user_id=' + to_user_id,
                    success: function(result) {
                        //console.log(result);
                        data = result;
                    }
                });
                //console.log(data);
                if (data != '') {
                    return data;
                } else {
                    return '<a href="javascript:void(0)" class="dropdown-item p-1 m-1 rounded">No Notifications</a>';
                }

            }
        });

        $(document).ready(function() {
            setInterval(function() {
                get_notification_count();
            }, 1000);

            function get_notification_count() {
                $('.notification_count').load('notification_count.php');
            }


        })
    </script>

    </html>
<?php
} else {
    header('location: login.php');
}
?>