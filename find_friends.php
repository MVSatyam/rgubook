<?php
include "dbconnect.php";
session_start();

if ($_SESSION['user'] != NULL) {
    $user_id = $_SESSION['user'];

    $sql_for_frnds = "SELECT * FROM notifications where from_user = '$user_id' and isboth_friends=1";
    $query_for_frnds = mysqli_query($conn, $sql_for_frnds);

    $sql_for_resp = "SELECT * FROM notifications where from_user = '$user_id' and isboth_friends=0";
    $query_for_resp = mysqli_query($conn, $sql_for_resp);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Friends</title>

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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <style>
            * {
                font-family: 'Roboto', arial;
            }


            @media only screen and (max-width: 1070px) {
                .visibl {
                    display: none;
                }
            }

            @media only screen and (max-width: 575px) {
                span.visibl {
                    display: inline;
                }

                .line {
                    display: none;
                }
            }

            .popover-body {
                overflow-y: auto;
                height: 150px;
            }

            .notification-hover:hover {
                background-color: #33b5e5;
                color: #FFFFFF;
            }
        </style>
    </head>

    <body class="skin-light">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top scrolling-navbar">

            <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Find-Friends</b> </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home"></i> <span class="visibl"><b>Home</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Find Friends"><i class="fas fa-users"></i> <span class="visibl"><b>Find Friends</b></span></a>
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
                    <div class="row justify-content-md-center">
                        <div class="col-lg-7">
                            <div class="card search_friend p-3">
                                <div class="md-form input-group mb-3">
                                    <input type="text" class="form-control search" placeholder="Search Friend" length="7" id="searchID">
                                    <div class="input-group-append">
                                        <button class="btn btn-md btn-secondary m-0 px-3" type="button" id="searchFriend">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="find_friends_container ">
                                <?php
                                $already_frnd = '';
                                $waiting_resp = '';

                                $count_frnds = mysqli_num_rows($query_for_frnds);
                                $count_resp = mysqli_num_rows($query_for_resp);

                                if ($count_frnds == 0) {
                                    $already_frnd = $already_frnd . '<div class="card border border-light m-2 p-2">
                                                    <div class="p-1">
                                                        No Friends till yet
                                                    </div>
                                                </div>';
                                } else {
                                    while ($all_users = mysqli_fetch_assoc($query_for_frnds)) {
                                        $already_frnd = $already_frnd . '<div class="card border border-light m-2 p-2">
                                                        <div class="p-1">
                                                            <strong>' . $all_users['to_user'] . '</strong>
                                                            <button data-fromuser="' . $user_id . '" data-touser=' . $all_users['to_user'] . ' class="btn btn-default btn-sm friend_unfriend" style="float: right;">Friends</button>
                                                        </div>
                                                    </div>';
                                    }
                                }

                                if ($count_resp == 0) {
                                    $waiting_resp = $waiting_resp . '<div class="card border border-light m-2 p-2">
                                                    <div class="p-1">
                                                        You have not sent any request till yet
                                                    </div>
                                                </div>';
                                } else {
                                    while ($all_users = mysqli_fetch_assoc($query_for_resp)) {
                                        $waiting_resp = $waiting_resp . '<div class="card border border-light m-2 p-2">
                                                            <div class="p-1">
                                                                <span>You have sent friend request to <strong>' . $all_users['to_user'] . '</strong></span>
                                                            </div>
                                                            <div>
                                                                <button class="btn btn-outline-default btn-sm waves-effect">waiting fro response ...</button>
                                                            </div>
                                                        </div>';
                                    }
                                }
                                ?>

                                <div class="card already_friends mt-2 p-3">
                                    <div class="card-title">
                                        <h2>Your friends</h2>
                                    </div>
                                    <div class="frnd"><?php echo $already_frnd; ?></div>
                                </div>

                                <div class="card waiting_for_friend_resp mt-2 p-3">
                                    <div class="card-title">
                                        <h2>Friend requests sent from you</h2>
                                    </div>
                                    <?php echo $waiting_resp; ?>
                                </div>
                            </div>
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
        });

        $(document).on('click', '.add_friend', function() {
            var to_user_id = $(this).data('touser');
            var from_user = $(this).data('fromuser');
            $.ajax({
                url: 'add_friend.php',
                type: 'post',
                data: 'to_user=' + to_user_id + '&from_user=' + from_user,
                success: function(result) {
                    toastr.success(result);
                }
            })
        });

        $(function() {
            $(".search").autocomplete({
                source: 'search.php'
            });
        });

        $(document).on('click', '#searchFriend', function() {
            var id = $('.search').val();
            $.ajax({
                url: 'search_friend.php',
                type: 'post',
                data: 'to_user_id=' + id,
                success: function(result) {
                    $('.find_friends_container').html(result);
                }
            })
        });

        $(document).on('mouseover', '.friend_unfriend', function() {
            // body...
            $(this).text('Unfriend');
            $(this).addClass('btn-danger');
            $(this).removeClass('btn-default');
        });

        $(document).on('mouseleave', '.friend_unfriend', function() {
            // body...
            $(this).text('Friends');
            $(this).addClass('btn-default');
            $(this).removeClass('btn-danger');
        });

        $(document).on('click', '.friend_unfriend', function() {
            var from_user = $(this).data('fromuser');
            var to_user = $(this).data('touser');
            $.ajax({
                url: 'unfriend.php',
                type: 'post',
                data: 'from_user=' + from_user + '&to_user=' + to_user,
                success: function(result) {
                    //console.log(result);
                    $('.frnd').html(result);
                }
            })
        })
    </script>

    </html>
<?php } else {
    header('location: login.php');
} ?>