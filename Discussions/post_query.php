<?php

include "../dbconnect.php";

session_start();

if (isset($_POST['query']) and isset($_POST['parent_id'])) {
    

    $query_or_reply = $_POST['query'];
    $parent_id = intval($_POST['parent_id']);
    $sender = $_SESSION['user'];

    $sql = "INSERT INTO discussions(parent_query_id, query_or_reply, sender) VALUES ($parent_id, '$query_or_reply', '$sender')";
    $query = mysqli_query($conn, $sql);

    $output = "";
    
    $sql_for_all_queries = "SELECT * FROM discussions ORDER BY query_id DESC";
    $query_for_all_queries = mysqli_query($conn, $sql_for_all_queries);

    $count_rows = mysqli_num_rows($query_for_all_queries);
    if ($count_rows > 0) {
        while ($query_row = mysqli_fetch_assoc($query_for_all_queries)) {
            # code...
            if ($query_row['parent_query_id'] == 0) {
                $output = $output.'<div class="d-flex ml-5 mt-3">
                                        <div class="card-title text-white">
                                            '.$query_row['sender'].'
                                            <!--<img class="z-depth-1 rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" style="width: 50px;height: 50px;">-->
                                        </div>
                                        <div class="card ml-3 p-3 bg-dark text-white" style="border-left: 5px solid #4285f4;">
                                            <div>'.$query_row['query_or_reply'].'</div>
                                            <div align="right"><button class="btn btn-outline-danger btn-sm waves-effect p-1 replyOpen" data-parentid='.$query_row['query_id'].'><i class="fas fa-reply"></i> Reply</button></div>
                                            <div class="reply_to_'.$query_row['query_id'].'" style="display: none;">
                                                <textarea class="form-control  bg-dark text-white" id="Reply_'.$query_row['query_id'].'" placeholder="Type Reply..."></textarea>
                                                <button class="btn btn-primary btn-sm waves-effect px-3 mt-2" id="sendReply" data-parentid='.$query_row['query_id'].'>Submit</button>
                                            </div>
                                        </div>
                                    </div>';
            }
            else{
                $sub_sql = 'SELECT * FROM discussions WHERE query_id="'.$query_row['parent_query_id'].'"';
                $sub_query = mysqli_query($conn, $sub_sql);
                $sub_row = mysqli_fetch_array($sub_query);
                $output = $output.'<div class="ml-5 mt-3 d-flex">
                                        <div class="card-title text-white">
                                            '.$query_row['sender'].'
                                            <!--<img class="z-depth-1 rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" style="width: 50px;height: 50px;">-->
                                        </div>
                                        <div class="card ml-3 p-3 bg-dark text-white" style="border-left: 5px solid #dc3545;">
                                            <div class="ml-3 p-3 rounded" style="border-left: 5px solid #4285f4;">
                                                <div class="card-title">
                                                    '.$sub_row['sender'].'
                                                </div>
                                                <div class="card-text">
                                                    '.$sub_row['query_or_reply'].'
                                                </div>
                                            </div>
                                            <div class="ml-3 p-2">
                                                '.$query_row['query_or_reply'].'
                                                <div align="right"><button class="btn btn-outline-danger btn-sm waves-effect p-1 replyOpen" data-parentid='.$query_row['query_id'].'><i class="fas fa-reply"></i> Reply</button></div>
                                                <div class="reply_to_'.$query_row['query_id'].'" style="display: none;">
                                                    <textarea class="form-control bg-dark text-white" id="Reply_'.$query_row['query_id'].'" placeholder="Type Reply..."></textarea>
                                                    <button class="btn btn-primary btn-sm waves-effect px-3 mt-2" id="sendReply" data-parentid='.$query_row['query_id'].'>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
            }
        }
    }
    echo $output;
}
else{
    header('location: index.php');
}
?>