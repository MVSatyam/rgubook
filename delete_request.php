<?php

    include "dbconnect.php";
    session_start();

    $notif_id = $_POST['notif_id'];
    $from_user = $_POST['from_user'];
    $to_user = $_SESSION['user'];

    $sql = "DELETE FROM notifications WHERE notification_id = $notif_id and from_user='$from_user' and to_user='$to_user'";
    $query = mysqli_query($conn, $sql);

    $output = '';

    $sub_sql = "SELECT * FROM notifications WHERE to_user='$to_user' and isboth_friends=0";
    $sub_query = mysqli_query($conn, $sub_sql);

    $count = mysqli_num_rows($sub_query);
    if ($count >= 1) {
        while($fr_row = mysqli_fetch_assoc($sub_query)){
            $output = $output.'<div class="card friend-request-card" style="color: black;">
                                    <div class="card-body">
                                        <div>Friend request from <strong>'.$fr_row['from_user'].'</strong></div>
                                        <div>
                                            <span><button data-notifid="'.$fr_row['notification_id'].'" data-fromuser="'.$fr_row['from_user'].'" class="btn btn-outline-default btn-sm p-1 waves-effect confirm">Confirm</button></span>
                                            <span><button data-notifid="'.$fr_row['notification_id'].'" data-fromuser="'.$fr_row['from_user'].'" class="btn btn-outline-danger btn-sm p-1 waves-effect ">Delete request</button></span>
                                        </div>
                                    </div>
                                </div>';
        }
    }
    else{
        $output = $output.'<div class="card friend-request-card text-center" style="margin: 50px auto;padding: 20px;"><strong>No Friend Requests</strong></div>';
    }


    echo $output;
?>