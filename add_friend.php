<?php

    include "dbconnect.php";
    session_start();

    $from_user = $_POST['from_user'];
    $to_user = $_POST['to_user'];
    $notification = "friend request from ".$from_user;
    $isviewed = 0;

    $SQL = "SELECT * FROM notifications WHERE from_user = '$from_user' and to_user='$to_user'";
    $qwerty = mysqli_query($conn, $SQL);

    $count_rows = mysqli_num_rows($qwerty);
    $output = '';

    if ($count_rows == 0) {
        $query = mysqli_query($conn, "INSERT INTO notifications (from_user, to_user, notification,isviewed) VALUES('$from_user','$to_user','$notification',$isviewed)");
        $output = $output.'Friend request has been sent to '.$to_user;
    }
    else{
        $output = $output.'Wait for response';
    }

    echo $output;
?>