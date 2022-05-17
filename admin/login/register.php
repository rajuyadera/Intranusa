<?php
require("../functions/functions.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
	header("Location: cctv.php");
	die();
}

//Load Composer's autoloader
require '../../vendor/autoload.php';

$msg = "";

if (isset($_POST["register"])) {

	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
	$confirm_password = mysqli_real_escape_string($conn, md5($_POST["confirm_pw"]));
	$code = mysqli_real_escape_string($conn, md5(rand()));

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'")) > 0) {
		$msg = "<div class='alert alert-danger'>{$email} - This email has been already exist.</div>";
	} else {
		if ($password === $confirm_password) {
			$query = "INSERT INTO user ( name , email, password, code) VALUES 
           ( '$name', '$email', '$password', '$code');
           ";
			$result = mysqli_query($conn, $query);

			if ($result) {
				echo "<div style='display: none;'>";

				//Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
					//Server settings
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'ihsan.miftah70@gmail.com';                     //SMTP username
					$mail->Password   = 'sempak098';                               //SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
					$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

					//Recipients
					$mail->setFrom('ihsan.miftah70@gmail.com');
					$mail->addAddress($email);

					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'no reply';
					$mail->Body    = 'Here is the verification link <b><a href="http://100.115.92.205/intranusa/admin/login/?verification=' . $code . '">http://100.115.92.205/intranusa/admin/login/?verification=' . $code . '</a></b>';

					$mail->send();
					echo 'Message has been sent';
				} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
				echo "</div>";
				$msg = "<div class='alert alert-primary'>We've send a verification link on your email address</div>";
			} else {
				$msg = "<div class='alert alert-danger'>Something wrong went</div>";
			}
		} else {
			$msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
						<h4>Create an account</h4>
					</div>
					<?= $msg; ?>
					<form action="" method="post" autocomplete="on">
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" placeholder="Full Name" name="name" value="<?php if (isset($_POST["register"])) {echo $name;} ?>" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" placeholder="Email Address" name="email" value="<?php if (isset($_POST["register"])) {echo $email;} ?>" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" name="password" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Confirm Password" name="confirm_pw" required>
						</div>
						<div class="row mb-3">
							<div class="col-12 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">I agree all terms & conditions</label>
								</div>
							</div>
						</div>
						<div class="text-left mb-3">
							<button type="submit" name="register" class="btn">Register</button>
						</div>
						<div class="text-white">Already have an account?
							<a href="index.php" class="login-link">Login here</a>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>

</html>