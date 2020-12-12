<?php
    include "dbconnect.php";
    session_start();
    $user_id = $_SESSION['user'];

    $sql = "SELECT * FROM notifications WHERE to_user='$user_id' and isviewed=0";
    $query = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($query);
    echo $count;
?>