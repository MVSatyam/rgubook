<?php
    include "dbconnect.php";

    $type=$_POST['type'];
    $id=$_POST['id'];
    $user_id=$_POST['user_id'];

    #echo $id;
    #echo $user_id;

    $likes_sql = "SELECT * FROM likes WHERE post_id=$id and user_id='$user_id'";
    $likes_query = mysqli_query($conn, $likes_sql);

    
    

    $count = mysqli_num_rows($likes_query);
    #echo $count;

    if($type=='like'){
        $sql="update posts set likes=likes+1 where post_id=$id";
        $sql_1 = "INSERT INTO likes(post_id, user_id) VALUES($id, '$user_id')";
    
        $res=mysqli_query($conn,$sql);
        $query=mysqli_query($conn,$sql_1);

        $posts_sql = "SELECT * FROM posts where post_id = $id";
        $posts_query = mysqli_query($conn, $posts_sql);
        $posts_array = mysqli_fetch_array($posts_query);
            
        echo $posts_array['likes'];
    }
    else{
        $sql_dislike = "update posts set likes = likes-1 WHERE post_id=$id";
        $query_dislike = mysqli_query($conn, $sql_dislike);

        $sql_dislike_1 = "DELETE FROM likes WHERE post_id=$id and user_id='$user_id'";
        $query_dislike_1 = mysqli_query($conn, $sql_dislike_1);

        $posts_sql_after_dislike = "SELECT * FROM posts where post_id = $id";
        $posts_query_after_dislike = mysqli_query($conn, $posts_sql_after_dislike);
        $posts_array_after_dislike = mysqli_fetch_array($posts_query_after_dislike);

        echo $posts_array_after_dislike['likes'];
    }
?>