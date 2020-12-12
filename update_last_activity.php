<?php

    include "dbconnect.php";
    session_start();

    $sql = "UPDATE login_details SET last_activity = now() WHERE user_id = '".$_SESSION["user_id"]."'";
    $query = mysqli_query($conn, $sql);    

    echo $_SESSION["user_id"];    
?>