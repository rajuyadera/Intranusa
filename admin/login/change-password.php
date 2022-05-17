<?php

session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}

require("../functions/functions.php");

$msg = "";

if (isset($_GET["reset"])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET["reset"]}'")) > 0) {
        if (isset($_POST["submit"])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE user SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: index.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset link do not match</div>";
    }
} else {
     header("Location: forget.php");
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
                            <h4 class="mb-3 text-center">Change Your Password</h4>
                            <p class="mb-3 text-white text-center">
                                Add new password
                            </p>
                            <div class="form-input">
                                <span><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Enter Your Password" name="password" required>
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                            </div>
                            <div class="text-left mb-5">
                                <button type="submit" name="submit" class="btn p-0">Change Password</button>
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