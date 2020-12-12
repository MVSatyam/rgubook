<?php
    include 'dbconnect.php';
    session_start();

    $notif_id = $_GET['notification_id'];
    $fr_from_user = $_GET['fr_from_user'];
    $to_user = $_GET['to_user'];
    
    $sql = "UPDATE notifications
            SET
                isviewed = '1',
                seentime = now()
            WHERE
                notification_id=$notif_id and from_user = '$fr_from_user'";
    $query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>

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
    

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    

    <style>
        * {
            font-family: 'Roboto', arial;
        }

        .friend-request-card {
            width: 500px;
            margin: 75px auto;
        }

        .test:hover {
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .active {
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.1);
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
            overflow-y : auto;
            height: 150px;  
        }
        .notification-hover:hover {
            background-color: #33b5e5;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">

        <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Home</b> </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="home.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home"></i> <span class="visibl"><b>Home</b></span></a>
                </li>
                <li class="nav-item line">
                    <span class="text-white nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a data-touserid="<?php echo $_SESSION['user'];?>" href="javascript:void(0)" class="nav-link text-white test notifications" data-toggle="popover-click" data-placement="bottom"><i class="fas fa-bell"></i> <span class="visibl"><b>Notifications</b></span><span class="badge badge-warning notification_count" data-touserid="<?php echo $user_row['user_id'];?>">0</span></a>
                </li>
                <li class="nav-item line">
                    <span class="text-white nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a href="friend_requests.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Friend Requests"><i class="fas fa-users"></i> <span class="visibl"><b>Friend Requests</b></span></a>
                </li>
                <li class="nav-item line">
                    <span class="text-white nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a href="messenger.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Messenger"><i class="fab fa-facebook-messenger"></i> <span class="visibl"><b>Messenger</b></span></a>
                </li>
                <li class="nav-item line">
                    <span class="text-white nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="View Profile"><i class="fas fa-user"></i> <span class="visibl"><b><?php echo $_SESSION['user'];?></b></span></a>
                </li>
                <li class="nav-item line">
                    <span class="text-white nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Click To Logout"><i class="fas fa-sign-out-alt"></i> <span class="visibl"><b>LogOut</b></span></a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="card friend-request-card">
        <div class="card-body">
            <div>Friend request from <strong><?php echo $fr_from_user;?></strong></div>
            <div>
                <span><button class="btn btn-outline-default btn-sm p-1 waves-effect">Confirm</button></span>
                <span><button class="btn btn-outline-danger btn-sm p-1 waves-effect">Delete request</button></span>
            </div>
        </div>
    </div>
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
            content: function(){ 
                var to_user_id = $(this).data('touserid');
                var data = '';
                $.ajax({
                    url: 'get_notifications.php',
                    type: 'post',
                    async: false,
                    data: 'to_user_id='+to_user_id,
                    success: function(result){
                        //console.log(result);
                        data = result;
                    }
                });
                //console.log(data);
                if(data != ''){
                    return data;
                }
                else{
                    return '<a href="javascript:void(0)" class="dropdown-item p-1 m-1 rounded">No Notifications</a>';
                }
                
            }
        });

        $(document).ready(function(){
            setInterval(function() {
                get_notification_count();        
            }, 1000);
            function get_notification_count() {
                $('.notification_count').load('notification_count.php');
            }

            
        })


</script>
</html>