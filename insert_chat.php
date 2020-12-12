<?php

    include "dbconnect.php";
    session_start();

    $from_user_id = $_SESSION['user'];
    $to_user_id = $_POST['to_user_id'];
    $chat_msg = $_POST['chat_message'];

    $sql = "INSERT INTO chat_messages(from_user, to_user, chat_msg) VALUES('$from_user_id','$to_user_id','$chat_msg')";
    $query = mysqli_query($conn, $sql);

    echo fetch_user_chat_history($_SESSION['user_id'], $to_user_id, $conn);
?>