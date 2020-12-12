<?php
    include "dbconnect.php";
    session_start();

    $post_id = $_POST['to_post_id'];
    $sql = "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY comment_id DESC LIMIT 6";
    $query = mysqli_query($conn, $sql);

    $output = '';
    
    while($post_id_row = mysqli_fetch_assoc($query)){
        $output = $output.'<div class="px-2 m-2">'.'<strong class="ml-2">'.$post_id_row['user_id'].' :</strong>'.'<span class="ml-2" style="background-color: rgba(0,0,0,0.1);padding: 5px;border-radius: 25px;">'.$post_id_row['comment'].'</span>'.'</div>';
    }
    echo $output;
?>