<?php

    include "dbconnect.php";
    session_start();

    $to_user = strtoupper($_POST['to_user_id']);
    $from_user = $_SESSION['user'];

    $check_user_presence_sql = "SELECT * FROM users WHERE user_id = '$to_user'";
    $check_user_presence_query = mysqli_query($conn, $check_user_presence_sql);
    $no_of_rows = mysqli_num_rows($check_user_presence_query);

    $output = '';
    if ($no_of_rows != 0) {    
        if ($to_user != $from_user) {
            $sql = "SELECT * FROM notifications where from_user='$from_user' and to_user='$to_user'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);

            $count_rows = mysqli_num_rows($query);

            if ($count_rows == 0) {
                $output = $output.'<div class="card add-friend-card mt-2">
                                        <div class="card-body">
                                            <strong>'.$to_user.'</strong>
                                            <button style="float: right;" data-touser="'.$to_user.'" data-fromuser="'.$from_user.'" class="btn btn-outline-default btn-sm p-1 waves-effect add_friend">Add Friend</button>
                                        </div>
                                    </div>';
            }
            else {
                if ($row['isboth_friends'] == 1) {
                    $output = $output.'<div class="card already_friends p-3 mt-2">
                                            <div class="p-1">
                                                <strong>'.$to_user.'</strong>
                                                    <button data-fromuser="'.$from_user.'" data-touser='.$to_user.' class="btn btn-default btn-sm" style="float: right;">Friends</button>
                                            </div>
                                        </div>';
                }
                else{
                    $output = $output.'<div class="card waiting_for_friend_resp mt-2">
                                            <div class="card-body">
                                                <div>
                                                    <span>You have sent friend request to <strong>'.$to_user.'</strong></span>
                                                </div>
                                                <div>
                                                    <button class="btn btn-outline-default btn-sm waves-effect p-1">waiting for response ...</button>
                                                </div>
                                            </div>
                                        </div>';
                }
            }
        }
        else{
            $output = '<div style="width: 600px;margin: 20px auto;" class="card"><div class="card-body">Do not Enter Your Id Number</div></div>';
        }
    }else{
        $output = '<div class="card" style="width: 600px;margin: 20px auto;"><div class="card-body">There is No Such Id Number</div></div>';
    }
    echo $output;
?>