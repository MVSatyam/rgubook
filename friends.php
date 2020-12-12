<?php

    session_start();

    include "dbconnect.php";

    $output = '<div class="list-group list-group-flush">';

    $frnd_sql = "SELECT * FROM users WHERE user_id != '".$_SESSION['user']."'";
    $frnd_query = mysqli_query($conn, $frnd_sql);

    while ($frnd_row = mysqli_fetch_assoc($frnd_query)) {
        # code...
        $status = '';
        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '-10 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $user_last_activity = fetch_user_last_activity($frnd_row['user_id'], $conn);

        if ($user_last_activity > $current_timestamp) {
            # code...
            $status = '<span class="badge badge-default ml-5 status" style="color: white;padding: 5px;">online</span>';
        }
        else{
            $status = '<span class="badge badge-danger ml-5 status" style="color: white;padding: 5px;">ofline</span>';
        }
        $output = $output.'<div data-touserid="'.$frnd_row['user_id'].'" data-username="'.$_SESSION['user'].'" id="user_'.$frnd_row['user_id'].'" href="javascript:void(0)" class="list-group-item start_chat" data-toggle="frndtooltip" data-placement="bottom" title="'.$frnd_row['user_id'].'" style="cursor: pointer;">
                                '.'
                                <div>
                                    <span class="mb-0"><img class="rounded-circle mr-2" src="uploads/'.$frnd_row['profile_photo'].'" style="width: 35px;height: 35px;">'.$frnd_row['user_id'].'
                                    </span>
                                    <!--<span style="float: right;">
                                        typing...
                                    </span>-->
                                </div>
                                <div>
                                    <span>'.$status.'</span>
                                    '.count_unseen_msgs($frnd_row["user_id"], $_SESSION["user"], $conn).'
                                </div>
                            </div>';
    }


    echo $output.'</div>';

?>