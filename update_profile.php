<?php
include 'dbconnect.php';

session_start();
if ($_SESSION['user'] != NULL) {
	$user = $_SESSION['user'];

	$sql = "SELECT * FROM users WHERE user_id='$user'";
	$query = mysqli_query($conn, $sql);

	$user_row = mysqli_fetch_array($query);
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Update Profile</title>

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

		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>

	<body class="skin-light">
		<header>
			<nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top scrolling-navbar">

				<a href="#" class="navbar-brand"><i class="fab fa-facebook fa-2x"></i><b>RGUBOOK | Update Profile</b> </a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarMenu">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="home.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home"></i> <span class="visibl"><b>Home</b></span></a>
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
							<a href="logout.php" class="nav-link text-white test" data-toggle="tooltip" data-placement="bottom" title="Click To Logout"><i class="fas fa-sign-out-alt"></i> <span class="visibl"><b>LogOut</b></span></a>
						</li>
					</ul>
				</div>

			</nav>

			<div class="jumbotron color-grey-light mt-70">
				<div class="d-flex align-items-center h-100">
					<div class="container text-center py-5">
						<h3 class="mb-0">Profile Update</h3>
					</div>
				</div>
			</div>

		</header>

		<!--Main layout-->
		<main>
			<div class="container">

				<!--Grid row-->
				<div class="row d-flex justify-content-center">

					<!--Grid column-->
					<div class="col-md-6">

						<!--Section: Content-->
						<section class="mb-5">

							<form action="update_profile.php" method="post" enctype="multipart/form-data">

								<div class="md-form md-outline">
									<input type="text" id="userid" class="form-control" placeholder="<?php echo $user_row['user_id']; ?>" disabled>
									<label for="defaultForm-userid" class="disabled"></label>

								</div>
								
								<div class="md-form md-outline">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="profilePhoto" name="main_profile" accept="image/*" required>
											<label class="custom-file-label" for="profilePhoto">upload profile</label>
										</div>
									</div>

								</div>

								<div class="md-form md-outline">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="coverPhoto" name="cover_profile" accept="image/*" required>
											<label class="custom-file-label" for="coverPhoto">upload cover profile</label>
										</div>
									</div>

								</div>

								<div class="md-form md-outline">
									<textarea id="skills" class="md-textarea form-control" rows="2" name="skills"></textarea>
									<label for="skils">Skills</label>
								</div>

								<div class="md-form md-outline">
									<textarea id="about" class="md-textarea form-control" rows="2" name="about"></textarea>
									<label for="about">About</label>
								</div>

								<div class="md-form md-outline">
									<textarea id="skils" class="md-textarea form-control" rows="1" name="quote"></textarea>
									<label for="quote">Quote</label>
								</div>

								<div class="md-form md-outline">
									<input type="text" id="defaultForm-fb-profile" class="form-control" name="fb">
									<label data-error="wrong" data-success="right" for="defaultForm-fb-profile">fb profile</label>
								</div>

								<div class="md-form md-outline">
									<input type="text" id="defaultForm-twitter-profile" class="form-control" name="twitter">
									<label data-error="wrong" data-success="right" for="defaultForm-twitter-profile">twitter profile</label>
								</div>

								<div class="md-form md-outline">
									<input type="text" id="defaultForm-linkedin-profile" class="form-control" name="linkedin">
									<label data-error="wrong" data-success="right" for="defaultForm-linkedin-profile">linkedin profile</label>
								</div>

								<div class="md-form md-outline">
									<input type="text" id="defaultForm-insta-profile" class="form-control" name="insta">
									<label data-error="wrong" data-success="right" for="defaultForm-insta-profile">insta profile</label>
								</div>

								<div class="text-center pb-2">
									<button type="submit" name="update" class="btn btn-primary mb-4 update">Update</button>
								</div>

							</form>


						</section>
						<!--Section: Content-->

					</div>
					<!--Grid column-->

				</div>
				<!--Grid row-->

			</div>
		</main>
		<!--Main layout-->
	</body>

	</html>
<?php
} else {
	header('location: login.php');
}
if (isset($_POST['update'])) {
	$user = $_SESSION['user'];

	$sql = "SELECT * FROM users WHERE user_id='$user'";
	$query = mysqli_query($conn, $sql);

	$user_row = mysqli_fetch_array($query);


	$user_id = $_SESSION['user'];
	$profile = $_FILES['main_profile']['name'];
	$cover = $_FILES['cover_profile']['name'];
	$skills = $_POST['skills'];
	$about = $_POST['about'];
	$quote = $_POST['quote'];
	$fb = $_POST['fb'];
	$twitter = $_POST['twitter'];
	$linkedin = $_POST['linkedin'];
	$insta = $_POST['insta'];

	if ($profile == '') {
		$profile = 'default_profile.png';
	}
	if ($cover == '') {
		$cover = 'default_cover.png';
	}
	if ($skills == '') {
		$skills = $user_row['skills'];
	}
	if ($about == '') {
		$about = $user_row['about'];
	}
	if ($quote == '') {
		$quote = 'Think Different';
	}
	if ($fb == '') {
		$fb = $user_row['fb'];
	}
	if ($twitter == '') {
		$twitter = $user_row['twitter'];
	}
	if ($linkedin == '') {
		$linkedin = $user_row['linkedin'];
	}
	if ($insta == '') {
		$insta = $user_row['insta'];
	}

	@$temp_profile = $_FILES['main_profile']['tmp_name'];
	@$temp_cover = $_FILES['cover_profile']['tmp_name'];

	$file_ext1 = pathinfo($profile, PATHINFO_EXTENSION);
	$profile_ext = strtoupper($file_ext1);

	$file_ext2 = pathinfo($cover, PATHINFO_EXTENSION);
	$cover_ext = strtoupper($file_ext2);


	if (($profile_ext == 'PNG' || $profile_ext == 'JPG' || $profile_ext == 'JPEG') && ($cover_ext == 'PNG' || $cover_ext == 'JPG' || $cover_ext == 'JPEG')) {
		$location = 'uploads/';
		if (move_uploaded_file($temp_profile, $location.$profile) && move_uploaded_file($temp_cover, $location.$cover)) {
			$updte_sql = "UPDATE users SET `profile_photo`='$profile', `cover_photo`='$cover', `skills`='$skills', `about`='$about', `quote`='$quote',`fb`='$fb', `twitter`='$twitter', `linkedin`='$linkedin',`insta`='$insta' WHERE user_id='$user_id'";
			$update_query = mysqli_query($conn, $updte_sql);

			if ($update_query) {
				echo "<script>
                $.alert({
                    icon: 'far fa-check-circle',
                    title: 'Profile Update',
                    content: 'You have Successfully Updated Profile!!!',
                    theme: 'modern',
                    type: 'blue',
                    buttons: {
                        OK: {
                            btnClass: 'btn-success',
                            action: function(){
                                location.href = 'profile.php'
                            }
                        }
                    }
                })
                </script>";
			}
		}
	}
	else {
		header('location: update_profile.php');
	}
}
?>