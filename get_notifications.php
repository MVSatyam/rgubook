<?php
    include "dbconnect.php";
    session_start();

    $to_user_id = $_POST['to_user_id'];
    $sql = "SELECT * FROM notifications WHERE to_user='$to_user_id' and isviewed=0";
    $notif_query = mysqli_query($conn, $sql);

    $output = '';

    while($notification_row = mysqli_fetch_assoc($notif_query)){
        $output = $output.'<a href="javascript:void(0)" class="dropdown-item p-1 m-1 rounded notification-hover" style="">
                                <div class="notification">
                                    <span class="notification-icon text-white rounded cyan"><i class="fas fa-check"></i></span>
                                    <span class="notification-text">
                                        <b>'.$notification_row['notification'].'</b>
                                    </span><br>
                                    <span style="float: right;"><small>'.$notification_row['timestamp'].'</small></span>
                                </div> 
                            </a>';
    }
    echo $output;
?>