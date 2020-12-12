<?php
    include "dbconnect.php";
    session_start();
    $post_id = $_POST['to_post_id'];
    $sql = "SELECT * FROM posts WHERE post_id='$post_id'";
    $query = mysqli_query($conn, $sql);
    $post_id_row = mysqli_fetch_array($query);

    echo $post_id_row['likes'];
?>