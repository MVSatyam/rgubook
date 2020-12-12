<?php

    include '../dbconnect.php';

    session_start();
    if ($_SESSION['user'] != NULL) {
    

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
                                                '.$query_row['sender'].':
                                                <!--<img class="z-depth-1 rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" style="width: 50px;height: 50px;">-->
                                            </div>
                                            <div class="card ml-3 p-3 bg-dark text-white" style="border-left: 5px solid #4285f4;">
                                                <div>'.$query_row['query_or_reply'].'</div>
                                                <div align="right"><button class="btn btn-outline-danger btn-sm waves-effect p-1 replyOpen" data-parentid='.$query_row['query_id'].'><i class="fas fa-reply"></i> Reply</button></div>
                                                <div class="reply_to_'.$query_row['query_id'].'" style="display: none;">
                                                    <textarea class="form-control bg-dark text-white" id="Reply_'.$query_row['query_id'].'" placeholder="Type Reply..."></textarea>
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
                                                '.$query_row['sender'].':
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
                                                    <div align="right"><button class="btn btn-outline-danger btn-sm waves-effect p-1 mt-2 mb-2 replyOpen" data-parentid='.$query_row['query_id'].'><i class="fas fa-reply"></i> Reply</button></div>
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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussions</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/mdb_pro_min.css">
    

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
    * {
        font-family: 'Roboto', arial;
    }

    .querycontainer {
        width: 80%;
        margin: 10px auto;
    }

    .discussioncontainer{
        width: 80%;
        margin: 0px auto;

    }
    
    </style>
    
</head>
<body class="skin-light bg-dark">
    <nav class="navbar navbar-expand-sm navbar-light bg-dark scrolling-navbar">
        <h1 class="card-title text-white">Discussion Forum</h1>
    </nav>
    <div class="form-group p-3 querycontainer bg-dark text-white">
        <div><textarea class="form-control bg-dark text-white" id="query" placeholder="Ask Query..."></textarea></div>
        <div><button class="btn btn-primary btn-sm waves-effect px-3 mt-2" id="sendQuery" data-parentid="0">Submit</button></div>
    </div>

    <hr class="mb-5">
    
    <div class="discussioncontainer p-3">
        <?php echo $output;?>
    </div>

    <script>

    $(document).ready(function () {
        /*setInterval(() => {
            get_discussion_forum();
        }, 1000);
        function get_discussion_forum() {
            $.ajax({
                url: 'get_discussion_forum.php',
                success: function(result){
                    $('.discussioncontainer').html(result);
                }
            })
        }*/
    })


    $(document).on('click', '#sendQuery', function(){
        var query = $('#query').val();
        var parent_id = $(this).data('parentid');
        if (query != '') {
            $.ajax({
                url: 'post_query.php',
                method: 'post',
                data: 'query='+query+'&parent_id='+parent_id,
                success: function(result){
                    //console.log(result);
                    $('#query').val('');
                    $('.discussioncontainer').html(result);
                }
            })
        }
        else{
            toastr.warning('Please Enter Query');
        }
    })

    $(document).on('click','#sendReply', function () {
        var parent_id = $(this).data('parentid');
        var reply = $('#Reply_'+parent_id).val();
        if (reply != '') {
            $.ajax({
                url: 'post_query.php',
                method: 'post',
                data: 'query='+reply+'&parent_id='+parent_id,
                success: function(result){
                    //console.log(result);
                    $('#query').val('');
                    $('.discussioncontainer').html(result);
                }
            })
        }
        else{
            toastr.warning('Please Enter Reply');
        }
    })

    $(document).on('click', '.replyOpen', function() {
        var parent_id = $(this).data('parentid');
        $('.reply_to_'+parent_id).show();
        $(this).addClass('replyClose').removeClass('replyOpen');
    })

    $(document).on('click', '.replyClose', function() {
        var parent_id = $(this).data('parentid');
        $('.reply_to_'+parent_id).hide();
        $(this).addClass('replyOpen').removeClass('replyClose');
    })
    </script>
</body>
</html>
<?php
    }
    else{
        header('location: ../login.php');
    }
?>