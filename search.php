<?php

    include "dbconnect.php";
    session_start();

        $arr = array();

        $sql = "SELECT user_id from users where user_id!='".$_SESSION['user']."'";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            # code...
            $arr[] =  $row['user_id'];
        }
        
        echo json_encode($arr);
?>