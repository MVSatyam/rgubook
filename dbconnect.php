<?php

    $conn = mysqli_connect("localhost","root","mvsatyam@n150628","rgubook");
    date_default_timezone_set('Asia/Kolkata');
    if ($conn) {
        # Connected
    }
    else {
        echo "Not Connected";
    }

    function fetch_user_last_activity($user_id, $conn){
        $sql = "SELECT * FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($query)){
            return $row['last_activity'];
        }
    }

    function fetch_user_chat_history($from_user, $to_user,$connect) {
        $sql = "
            SELECT * FROM chat_messages 
            WHERE (from_user = '".$from_user."' AND to_user = '".$to_user."') OR (from_user = '".$to_user."' AND to_user = '".$from_user."') ORDER BY timestamp ASC";
        $query = mysqli_query($connect, $sql);
        $output = '';
        while ($row = mysqli_fetch_assoc($query)) {
            
            if ($row['from_user'] == $from_user) {
                # code...
                $output = $output.'<div align="right"><div class="card blue-gradient m-2 p-2 text-white" style="width: 300px;"><div align="left"><strong>'.$row['chat_msg'].'</strong></div><span align="right"><small>'.$row['timestamp'].'</small></span></div></div>';
            }
            else{
                $output = $output.'<div align="left"><div class="card peach-gradient m-2 p-2 text-white" style="width: 300px;"><div align="left"><strong>'.$row['chat_msg'].'</strong></div><span align="right"><small>'.$row['timestamp'].'</small></span></div></div>';
            }
        }

        $sql_seen = "UPDATE chat_messages set status = 1 WHERE from_user = '$to_user' and to_user='$from_user' and status = 0";
        $query_seen = mysqli_query($connect, $sql_seen);

        return $output;
    }

    function count_unseen_msgs($from_user, $to_user, $connect)
    {
        # code...

        $sql_unseen = "SELECT * FROM chat_messages WHERE from_user='$from_user' and to_user='$to_user' and status=0";
        $query_unseen = mysqli_query($connect, $sql_unseen);

        $output_unseen = '';
        $count_unseen = mysqli_num_rows($query_unseen);

        if ($count_unseen > 0) {
            # code...
            $output_unseen = '<span style="float: right;" class="badge badge-default">'.$count_unseen.'</span>';
        }
        return $output_unseen;
    }

?>