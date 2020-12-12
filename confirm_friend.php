<?php

    include "dbconnect.php";
    session_start();

    $to_user = $_POST['to_user_id'];
    $from_user = $_SESSION['user'];

    $sql = "SELECT * FROM notifications where from_user='$from_user' and to_user='$to_user'";
    $query = mysqli_query($conn, $sql);

    $count_rows = mysqli_num_rows($query);

    if ($count_rows == 0) {
        # code...
        $notificatin = "friend request from ".$from_user;
        $inst_req_sql = "INSERT INTO notifications(from_user, to_user, isviewed, notification) VALUES('$from_user', '$to_user', 0, '$notificatin')";
        $inst_req_query = mysqli_query($conn, $inst_req_sql);
    }
?>