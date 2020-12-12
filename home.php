<?php
include "dbconnect.php";

session_start();

if ($_SESSION['user'] != NULL) {
    # code...
    $user = $_SESSION['user'];

    $sql = "SELECT * FROM users WHERE user_id='$user'";
    $query = mysqli_query($conn, $sql);

    $user_row = mysqli_fetch_array($query);

    $sql_1 = "SELECT * FROM posts ORDER BY post_id DESC";
    $res = mysqli_query($conn, $sql_1);

    $skill = '';

    if ($user_row['skills'] != NULL) {
        # code...
        $skill = $user_row['skills'];
    }
    $about = '';

    if ($user_row['about'] != NULL) {
        # code...
        $about = $user_row['about'];
    }
    $fb = '';

    if ($user_row['fb'] != NULL) {
        # code...
        $fb = $user_row['fb'];
    } else {
        $fb = 'https://www.facebook.com';
    }

    $twitter = '';

    if ($user_row['twitter'] != NULL) {
        # code...
        $twitter = $user_row['twitter'];
    } else {
        $twitter = 'https://www.twitter.com';
    }
    $linkedin = '';

    if ($user_row['linkedin'] != NULL) {
        # code...
        $linkedin = $user_row['linkedin'];
    } else {
        $linkedin = 'https://www.linkedin.com';
    }

    $insta = '';

    if ($user_row['insta'] != NULL) {
        # code...
        $insta = $user_row['insta'];
    } else {
        $insta = 'https://www.instagram.com';
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | rgubook</title>

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
        <link rel="stylesheet" href="assets/mdb_pro_min.css">
        <link rel="stylesheet" href="assets/jquery-confirm.min.css">


        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="js/jquery-confirm.min.js"></script>

        <link rel="stylesheet" href="assets/style.css">

        <style>
            * {
                font-family: "Roboto", Arial, Halvetica, sans-serif;
            }
            /*.btn {
                box-shadow: none !important;
            }*/
        </style>

    </head>

    <body class="skin-light">

        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top scrolling-navbar">
            <div class="container-fluid">
                <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Home</b> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home"></i> <span class="visibl"><b>Home</b></span></a>
                        </li>


                        <li class="nav-item">
                            <a href="find_friends.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Find Friends"><i class="fas fa-users"></i> <span class="visibl"><b>Find Friends</b></span></a>
                        </li>


                        <li class="nav-item">
                            <a data-touserid="<?php echo $user_row['user_id']; ?>" href="javascript:void(0)" class="nav-link text-white test notifications" data-toggle="popover-click" data-placement="bottom"><i class="fas fa-bell"></i> <span class="visibl"><b>Notifications</b></span><span class="badge badge-warning notification_count" data-touserid="<?php echo $user_row['user_id']; ?>">0</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="friend_requests.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Friend Requests"><i class="fas fa-users"></i> <span class="visibl"><b>Friend Requests</b></span></a>
                        </li>

                        <li class="nav-item">
                            <a href="messenger.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Messenger"><i class="fab fa-facebook-messenger"></i> <span class="visibl"><b>Messenger</b></span></a>
                        </li>

                        <li class="nav-item">
                            <a href="Discussions/" target="_blank" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Discussions"><i class="fab fa-discourse"></i> <span class="visibl"><b>Discussions</b></span></a>
                        </li>

                        <li class="nav-item">
                            <a href="profile.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="View Profile"><i class="fas fa-user"></i> <span class="visibl"><b><?php echo $user_row['user_id']; ?></b></span></a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link text-white test logout" data-placement="bottom" title="Click To Logout"><i class="fas fa-sign-out-alt"></i> <span class="visibl"><b>LogOut</b></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container">
                <!--Section: Block Content-->
                <section class="mt-2 mb-4">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-3">
                            <!-- Card -->
                            <div class="card profile-card sticky-top" style="top: 65px;">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <img class="card-img-top" src="uploads/<?php echo $user_row['cover_photo']; ?>" alt="Card image cap" height="150px">
                                    <a href="javascript:void(0)">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Card content -->

                                <div class="card-body card-body-cascade text-center">

                                    <!-- Title -->
                                    <h4 class="card-title"><strong><?php echo $user_row['user_id']; ?></strong></h4>
                                    <!-- Subtitle -->
                                    <h6 class="font-weight-bold indigo-text py-2"></h6>
                                    <!-- Text -->
                                    <p class="card-text"><?php echo $skill; ?></p>

                                    <p class="card-text">“<?php echo $user_row['quote']; ?>”</p>

                                    <p class="card-text"><?php echo $about; ?></p>


                                    <!-- Facebook -->
                                    <a href="<?php echo $fb; ?>" target="_blank" type="button" class="btn-floating btn-fb text-white"><i class="fab fa-facebook-f"></i></a>
                                    <!-- Twitter -->
                                    <a href="<?php echo $twitter; ?>" target="_blank" type="button" class="btn-floating btn-tw text-white" role="button"><i class="fab fa-twitter"></i></a>
                                    <!-- Google + -->
                                    <a href="<?php echo $linkedin; ?>" target="_blank" type="button" class="btn-floating btn-dribbble text-white" role="button"><i class="fab fa-linkedin-in"></i></a>

                                    <hr>
                                    <a href="update_profile.php" class="btn btn-default btn-sm">Update Profile</a>
                                </div>

                            </div>
                            <!-- Card -->
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-lg-6">
                            <div class="card user-card">

                                <div class="card-header">
                                    <a href="javascript:void(0)"><img class="rounded-circle mr-2" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" style="width: 35px;height: 35px;"><?php echo $user_row['user_id']; ?></a>

                                    <div class="modal fade" id="postPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center rgba-white-slight">
                                                    <h4 class="modal-title w-100 font-weight-bold">Post Photo</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="" action="post_image.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body mx-3 rgba-white-slight">
                                                        <div class="md-form mb-5">
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <input type="text" id="defaultForm-write" class="form-control validate" name="inputText" required>
                                                            <label data-error="wrong" data-success="right" for="defaultForm-write">Write Somthing</label>
                                                        </div>

                                                        <div class="md-form mb-4">
                                                            <i class="fas fa-file-upload prefix"></i>
                                                            <input type="file" id="defaultForm-upload" class="form-control validate" name="profile" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center rgba-white-slight">
                                                        <button type="submit" class="btn btn-outline-default btn-md" name="post">Post</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-dark-green btn-sm px-2 waves-effect" data-toggle="modal" data-target="#postPhotoModal" style="float: right;">Post Photo</button>
                                </div>

                                <!--Card content -->
                                <!-- <div class="card-body">
                                    <form class="md-form">
                                        <input type="text" id="form1" class="form-control">
                                        <label data-error="wrong" data-success="right" for="form1">Write Somthing Here</label>

                                        <button type="submit" class="btn btn-outline-blue btn-sm">Submit</button>
                                    </form>
                                </div> -->

                            </div>
                            <!-- Card -->
                            <?php while ($row = mysqli_fetch_assoc($res)) { ?>

                                <!-- Card -->
                                <div class="card media-card mt-2">

                                    <div class="card-header">
                                        <a href="javascript:void(0)" data-content='
                                <?php
                                $sub_sql = "SELECT * FROM users WHERE user_id = '" . $row['user_id'] . "'";
                                $sub_query = mysqli_query($conn, $sub_sql);
                                $post_id_user = mysqli_fetch_array($sub_query);
                                echo $post_id_user['user_id']
                                ?>'>
                                            <img class="rounded-circle mr-2" src="uploads/<?php echo $post_id_user['profile_photo']; ?>" style="width: 35px;height: 35px;"><?php echo $row['user_id']; ?></a>

                                    </div>

                                    <div class="view overlay">
                                        <img class="card-img-top" src="uploads/<?php echo $row['image_post']; ?>" alt="">
                                        <a id="" href="javascript:void(0)">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>





                                    <div class="card-body">
                                        <!--Text-->
                                        <p class="card-text"><strong><?php echo $row['text_post'] ?></strong></p>

                                    </div>

                                    <div class="input-group px-3">
                                        <input id="comment<?php echo $row['post_id']; ?>" type="text" class="form-control" placeholder="Comment here..." aria-label="Comment here..." aria-describedby="MaterialButton-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-md purple-gradient m-0 px-3" type="button" id="MaterialButton-addon2" onclick="commentUpdate(<?php echo $row['post_id']; ?>,'<?php echo $user_row['user_id']; ?>');"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>

                                    <!-- Comments -->
                                    <div class="comments" id="comments_of_<?php echo $row['post_id']; ?>">
                                        <p class="px-4"><strong>Comments</strong></p>
                                        <div data-topostid="<?php echo $row['post_id']; ?>" class="commentContainer" id="commentContainer_<?php echo $row['post_id']; ?>">
                                            <?php
                                            $p_id = $row['post_id'];
                                            $cmt_sql = "SELECT * FROM comments WHERE post_id = $p_id ORDER BY comment_id DESC LIMIT 6";
                                            $cmt_query = mysqli_query($conn, $cmt_sql);

                                            while ($cmt = mysqli_fetch_assoc($cmt_query)) { ?>

                                                <div class="px-3 m-2"><strong><?php echo $cmt['user_id']; ?> :</strong><span class="ml-2" style="background-color: rgba(0,0,0,0.1);padding: 5px;border-radius: 25px;"><?php echo $cmt['comment']; ?></span></div>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!-- Card footer -->
                                    <?php

                                    $sql_if_liked = "SELECT * FROM likes WHERE user_id='" . $user_row['user_id'] . "' and post_id='" . $row['post_id'] . "'";
                                    $query_if_liked = mysqli_query($conn, $sql_if_liked);

                                    $inc = mysqli_num_rows($query_if_liked);

                                    if ($inc == 0) {
                                    ?>
                                        <div class="card-footer rgba-white-slight mt-4">
                                            <a href="javascript:void(0)" id="like_<?php echo $row['post_id']; ?>" class="btn btn-outline-blue btn-sm px-2 waves-effect" onclick="likeUpdate(<?php echo $row['post_id']; ?>,'<?php echo $user_row['user_id']; ?>');"><i class="fas fa-thumbs-up"></i> Like <span class="likes_update" data-topostid="<?php echo $row['post_id']; ?>" id="like_loop_<?php echo $row['post_id'] ?>"><?php echo $row['likes'] ?></span></a>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="card-footer rgba-white-slight mt-4">
                                            <a href="javascript:void(0)" id="like_<?php echo $row['post_id']; ?>" class="btn blue-gradient btn-sm px-2 waves-effect" onclick="disLikeUpdate(<?php echo $row['post_id']; ?>,'<?php echo $user_row['user_id']; ?>');"><i class="fas fa-thumbs-up"></i> Like <span class="likes_update" data-topostid="<?php echo $row['post_id']; ?>" id="like_loop_<?php echo $row['post_id'] ?>"><?php echo $row['likes'] ?></span></a>

                                        </div>
                                    <?php }
                                    ?>

                                </div>

                            <?php }
                            ?>
                            <!-- Card -->
                        </div>
                        <!--Grid column-->

                        <!-- Grid column -->
                        <div class="col-lg-3">
                            <!-- Card -->
                            <div class="card friends-card sticky-top" style="top: 65px;">
                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h4 class="card-title sticky-top">Friends</h4>

                                    <div id="friends" class="frndContainer" style="height: 400px;overflow-y: auto;"></div>

                                </div>

                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!--Grid row-->
                </section>
                <!--Section: Block Content-->
            </div>
        </main>

        <!-- Card -->


        <script>
            $(document).on('click', '.logout', function() {
                $.confirm({
                    icon: 'fas fa-sign-out-alt',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'blue',
                    content: 'Are you sure to logout?',
                    title: 'Logout',
                    buttons: {
                        OK: {
                            btnClass: 'btn-success',
                            action: function() {
                                location.href = 'logout.php'
                            }
                        },
                        CANCEL: {
                            btnClass: 'btn-red'
                        }
                    }
                })
            })
            $('[data-toggle="popover-hover"]').popover({
                html: true,
                trigger: 'hover',
                placement: 'bottom',
            });
            $('[data-toggle="popover-click"]').popover({
                html: true,
                trigger: 'click',
                placement: 'bottom',
                title: '<a href="all_notifications.php">see all notifications</a>',
                content: function() {
                    var to_user_id = $(this).data('touserid');
                    var data = '';
                    $.ajax({
                        url: 'get_notifications.php',
                        type: 'post',
                        async: false,
                        data: 'to_user_id=' + to_user_id,
                        success: function(result) {
                            //console.log(result);
                            data = result;
                        }
                    });
                    //console.log(data);
                    if (data != '') {
                        return data;
                    } else {
                        return '<a href="javascript:void(0)" class="dropdown-item p-1 m-1 rounded">No Notifications</a>';
                    }

                }
            });


            $(document).ready(function() {
                fetch_friends();

                setInterval(function() {
                    get_notification_count();
                    update_last_activity();
                    fetch_friends();
                    update_like_history();
                    update_comments_history();

                }, 1000);

                function get_notification_count() {
                    $('.notification_count').load('notification_count.php');
                }

                function fetch_friends() {
                    $('#friends').load('friends.php');
                };

                function update_like_history() {
                    $('.likes_update').each(function() {
                        var to_post_id = $(this).data('topostid');
                        //console.log(to_post_id);
                        get_likes(to_post_id);
                    });
                };

                function get_likes(to_post_id) {
                    $.ajax({
                        url: 'get_likes.php',
                        type: 'post',
                        data: 'to_post_id=' + to_post_id,
                        success: function(data) {
                            $('#like_loop_' + to_post_id).html(data);
                        }
                    })
                };

                function update_last_activity() {
                    $.ajax({
                        url: 'update_last_activity.php',
                        success: function(data) {
                            //console.log(data);

                        }
                    })
                };

                function update_comments_history() {
                    $('.commentContainer').each(function() {
                        var to_post_id = $(this).data('topostid');
                        //console.log(to_post_id);
                        get_comments(to_post_id);

                    })
                };

                function get_comments(to_post_id) {
                    $.ajax({
                        url: 'get_comments.php',
                        type: 'post',
                        data: 'to_post_id=' + to_post_id,
                        success: function(data) {
                            $('#commentContainer_' + to_post_id).html(data);
                        }
                    })
                }
            })




            $(function() {
                toastr.warning('If Image is not uploaded. May be image is currupted or size is too large!!!', 'Notification');
            })
            // Tooltips Initialization
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })

            $(function() {
                $('[data-toggle="frndtooltip"]').tooltip()
            })


            function likeUpdate(post_id, user_id) {
                $.ajax({
                    url: 'like_update.php',
                    type: 'post',
                    data: 'type=like&id=' + post_id + '&user_id=' + user_id,
                    success: function(result) {
                        //console.log(result);
                        $('#like_loop_' + post_id).html(result);
                        $('#like_' + post_id).addClass('blue-gradient').removeClass('btn-outline-blue');
                        $('#like_' + post_id).removeAttr("onclick");
                        $('#like_' + post_id).attr("onclick", "disLikeUpdate(" + post_id + ",'" + user_id + "')");
                        toastr.success('You Liked the post!!!');
                    }
                });
            }

            function disLikeUpdate(post_id, user_id) {
                $.ajax({
                    url: 'like_update.php',
                    type: 'post',
                    data: 'type=dislike&id=' + post_id + '&user_id=' + user_id,
                    success: function(result) {
                        //console.log(result);
                        $('#like_loop_' + post_id).html(result);
                        $('#like_' + post_id).addClass('btn-outline-blue').removeClass('blue-gradient');
                        $('#like_' + post_id).removeAttr("onclick");
                        $('#like_' + post_id).attr("onclick", "likeUpdate(" + post_id + ",'" + user_id + "')");
                        toastr.warning('You DisLiked the post!!!');
                    }
                });
            }



            function commentUpdate(post_id, user_id) {
                var comment = $('#comment' + post_id).val();
                //console.log(comment);
                if (comment != '') {
                    $.ajax({
                        url: 'post_comment.php',
                        type: 'post',
                        data: 'type=comment&post_id=' + post_id + "&user_id=" + user_id + '&comment=' + comment,
                        success: function(data) {
                            //console.log(data);

                            $('#commentContainer_' + post_id).html(data);
                            toastr.success('Comment Posted!!!');
                            $('#comment' + post_id).attr("disabled", false).css("background-color", "#FFF");
                            $('#comment' + post_id).val("");
                        }
                    });
                } else {
                    $('#comment' + post_id).attr("disabled", false).css("background-color", "#ffe6e6");
                    toastr.warning('Enter Comment');
                }

            }
        </script>

    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>