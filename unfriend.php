<?php
	
	include 'dbconnect.php';
	session_start();

	$from_user = $_POST['from_user'];
	$to_user = $_POST['to_user'];

	$sql = "DELETE FROM notifications WHERE from_user='$from_user' and to_user='$to_user'";
	$query = mysqli_query($conn, $sql);

	$sub_sql = "SELECT * FROM notifications WHERE from_user='".$_SESSION['user']."' and isboth_friends=1";
	$sub_query = mysqli_query($conn, $sub_sql);

	$count = mysqli_num_rows($sub_query);

	$output = '';

	if ($count == 0) {
		$output = $output.'<div class="card border border-light m-2 p-2">
            					<div class="p-1">
            						No Friends
            					</div>
            				</div>';
	}
	else{
		while ($all_users = mysqli_fetch_assoc($sub_query)) {	
			$output = $output.'<div class="card border border-light m-2 p-2">
	                                <div class="p-1">
	                                    <strong>'.$all_users['to_user'].'</strong>
	                                    <button data-fromuser="'.$user_id.'" data-touser='.$all_users['to_user'].' class="btn btn-default btn-sm friend_unfriend" style="float: right;">Friends</button>
	                                </div>
	                            </div>';
        }
	}

	echo $output;
?>