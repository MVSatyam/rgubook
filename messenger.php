<?php

include "dbconnect.php";
session_start();
$user_id = $_SESSION['user'];

if ($user_id != NULL) {
    # code...
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $query = mysqli_query($conn, $sql);

    $user_row = mysqli_fetch_array($query);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messenger</title>

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
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
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
        <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>

        <!-- <link rel="stylesheet" href="assets/style.css"> -->
        <style>
            .friends-card {
                height: 100%;
                width: 25%;

            }

            #chatContainer {
                height: 100%;
                width: 75%;

            }

            .frndContainer {
                height: 90%;
                overflow-y: auto;
            }

            @media only screen and (max-width: 1245px) {
              .visibl {
                display: none;
              }
            }

            @media only screen and (max-width: 575px) {
              .visibl {
                display: inline-block;
              }
            }
            .list-group {
                white-space: nowrap;
            }
        </style>
    </head>

    <body class="skin-light">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top scrolling-navbar">

            <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Messenger</b> </a>
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
                        <a data-touserid="<?php echo $_SESSION['user']; ?>" href="javascript:void(0)" class="nav-link text-white test" data-toggle="popover-click" data-placement="bottom"><i class="fas fa-bell"></i> <span class="visibl"><b>Notifications</b></span><span class="badge badge-warning notification_count">0</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="friend_requests.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Friend Requests"><i class="fas fa-users"></i> <span class="visibl"><b>Friend Requests</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Messenger"><i class="fab fa-facebook-messenger"></i> <span class="visibl"><b>Messenger</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="Discussions/" target="_blank" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Discussions"><i class="fab fa-discourse"></i> <span class="visibl"><b>Discussions</b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="View Profile"><i class="fas fa-user"></i> <span class="visibl"><b><?php echo $user_row['user_id']; ?></b></span></a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Click To Logout"><i class="fas fa-sign-out-alt"></i> <span class="visibl"><b>LogOut</b></span></a>
                    </li>
                </ul>
            </div>

        </nav>

        <div class="card friends-card border rounded-0" style="position: fixed;">
            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title sticky-top">Friends</h4>

                <div id="friends" class="frndContainer"></div>

            </div>

        </div>
        <div id="chatContainer" class="card border rounded-0" style="position: fixed;margin-left: 25%;height: 92%;">

            <h1>Click on someone to start chat</h1>

        </div>
    </body>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

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
            fetch_friends();

            setInterval(function() {
                get_notification_count();
                update_last_activity();
                fetch_friends();
                update_chat_history();
            }, 1000);

            function get_notification_count() {
                $('.notification_count').load('notification_count.php');
            }

            function fetch_friends() {
                $('#friends').load('friends.php');
            }

            function update_last_activity() {
                $.ajax({
                    url: 'update_last_activity.php',
                    success: function(data) {
                        //console.log(data);

                    }
                })
            }
        });


        function fetch_chat_history(to_user_id) {
            $.ajax({
                url: 'chat_history.php',
                type: 'post',
                data: 'to_user_id=' + to_user_id,
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                    var objDiv = $(".chat_history");
                    var h = objDiv.get(0).scrollHeight;
                    objDiv.animate({
                        scrollTop: h
                    });
                }
            });
        };

        function make_chat_container(to_user_id, from_user_id) {
            var chat_container = '<div class="card-body">';
            chat_container += '<h4 class="card-title sticky-top to_user">' + to_user_id + '</h4>';
            chat_container += '<div class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '" style="overflow-y: auto;height: 95%;">';
            chat_container += fetch_chat_history(to_user_id);
            chat_container += '</div></div>';
            chat_container += '<div class="card-footer bg-white m-0" style="width: 100%;"><input id="chat_msg_' + to_user_id + '" type="text" class="form-control chat_msg_class" placeholder="Type message here..." style="border: none;"><div class="input-group-append"><button class="btn btn-md purple-gradient mt-2 px-2 pt-2 pb-2 rounded send_chat" type="button" id="' + to_user_id + '"><i class="fas fa-paper-plane"></i> Send</button></div></div></div>';
            $('#chatContainer').html(chat_container);
        };

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('username');
            $('#user_' + to_user_id).addClass('active rounded');
            make_chat_container(to_user_id, to_user_name);
            $('#chat_msg_' + to_user_id).emojioneArea({
                pickerPosition: "top",
                toneStyle: "bullet"
            });
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $.trim($('#chat_msg_' + to_user_id).val());
            if (chat_message != '') {
                $.ajax({
                    url: "insert_chat.php",
                    method: "POST",
                    data: 'to_user_id=' + to_user_id + '&chat_message=' + chat_message,
                    success: function(data) {
                        var element = $('#chat_msg_' + to_user_id).emojioneArea();
                        element[0].emojioneArea.setText('');
                        $('#chat_msg_' + to_user_id).val('');
                        $('#chat_history_' + to_user_id).html(data);

                        var objDiv = $(".chat_history");
                        var h = objDiv.get(0).scrollHeight;
                        objDiv.animate({
                            scrollTop: h
                        });
                    }
                })
            } else {
                alert('Type something');
            }
        });

        function update_chat_history() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                //console.log(to_user_id);
                fetch_chat_history(to_user_id);
            });
        };
    </script>

    </html>
<?php
} else {
    header('location:login.php');
}
?>