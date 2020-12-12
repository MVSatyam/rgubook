<?php

    include "dbconnect.php";

    $type = $_POST['type'];
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];

    if ($type == 'comment') {
        # code...
        $sql = "INSERT INTO comments(post_id, user_id, comment) VALUES ($post_id, '$user_id', '$comment')";
        $query = mysqli_query($conn, $sql);

        $output = '';
        #echo $query;
        #echo $comment;
        if($query){
            $cmt_sql = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY comment_id DESC LIMIT 6";
            $cmt_query = mysqli_query($conn, $cmt_sql);
            
            while ($row=mysqli_fetch_assoc($cmt_query)) {
                $output = $output.'<div class="px-2 m-2">'.'<strong class="ml-2">'.$row['user_id'].' :</strong>'.'<span class="ml-2" style="background-color: rgba(0,0,0,0.1);padding: 5px;border-radius: 25px;">'.$row['comment'].'</span>'.'</div>';
            }
        }
        echo $output;
    }
    else{
        echo "Not";
    }

?>