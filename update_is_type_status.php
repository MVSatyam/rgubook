<?php
	
	include 'dbconnect.php';

	session_start();

	$is_type = $_POST['type_status'];
	$user = $_SESSION['user'];

	$sql_type_status = "UPDATE login_details SET is_type='$is_type' WHERE login_detail_id='$user'";
	$query_type_status = mysqli_query($conn, $sql_type_status);
?>