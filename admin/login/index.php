<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: ../cctv.php");
  die();
}

require ("../functions/functions.php");
$msg="";

if ( isset($_GET["verification"])){
	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET['verification']}'")) > 0){
		$query = mysqli_query($conn,"UPDATE user SET code='' WHERE code='{$_GET['verification']}'");

		if ($query){
			$msg = "<div class='alert alert-success'>Account verification has been succesfully completed</div>";
		}
	}
}

if( isset($_POST["submit"])){
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["password"]));

	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) === 1){
		$row = mysqli_fetch_assoc($result);

		if (empty($row["code"])){
			$_SESSION["SESSION_EMAIL"] = $email;
			header("Location: ../cctv.php");
		} else{
			$msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
		}
	} else {
		$msg = "<div class='alert alert-danger'>Email or Password do not match</div>";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="image/logo.png" width="150px">
					</div>
					<div class="heading mb-3">
						<h4>Login into your account</h4>
					</div>
					<?= $msg; ?>
					<form action="" method="post">
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" placeholder="Email Address" name="email" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" name="password" required>
						</div>
						<div class="row mb-3">
							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Remember me</label>
								</div>
							</div>
							<div class="col-6 text-right">
								<a href="forget.php" class="forget-link">Forget password</a>
							</div>
						</div>
						<div class="text-left mb-3">
							<button type="submit" name="submit" class="btn">Login</button>
						</div>
						<div class="text-white">Don't have an account?
							<a href="register.php" class="register-link">Register here</a>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>

</html>