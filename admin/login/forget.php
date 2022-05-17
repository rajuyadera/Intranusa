<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
	header("Location: ../cctv.php");
	die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

require("../functions/functions.php");
$msg = "";

if (isset($_POST["send"])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$code = mysqli_real_escape_string($conn, md5(rand()));

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'")) > 0) {

		$query = mysqli_query($conn, "UPDATE user SET code='{$code}' WHERE email='{$email}'");

		if ($query) {
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
				$mail->Subject = 'Verification Link :';
				$mail->Body    = 'Here is the verification link <b><a href="http://100.115.92.205/intranusa/admin/login/change-password.php?reset=' . $code . '">http://100.115.92.205/intranusa/admin/login/change-password.php?reset=' . $code . '</a></b>';

				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			echo "</div>";
			$msg = "<div class='alert alert-primary'>We've send a verification link on your email address</div>";
		}
	} else {
		$msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box">
					<div class="logo mt-5 mb-3 text-center">
						<img src="image/logo.png" width="150px">
					</div>
					<div class="reset-form d-block">
						<?= $msg; ?>
						<form action="" method="post">
							<h4 class="mb-3 text-center">Reset Your Password</h4>
							<p class="mb-3 text-white">
								Please enter your email address and we will send you a password reset link
							</p>
							<div class="form-input">
								<span><i class="fa fa-envelope"></i></span>
								<input type="email" name="email" placeholder="Email Address" required>
							</div>
							<div class="mb-3">
								<button name="send" type="submit" class="btn">Send Reset link</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>

</html>