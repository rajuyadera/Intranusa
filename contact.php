<!-- ======= Contact Section ======= -->
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$msg = "";

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
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
    $mail->setFrom($email);
    $mail->addAddress('rajuyaderaa@gmail.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body    = "<h3>Name : $name <br>Email: $email <br>Message: $message</h3>";

    $mail->send();
    $msg = "<div class='alert alert-primary'>Message Sent! Thank you for contacting us.</div>";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  echo "</div>";
  $msg = "<div class='alert alert-primary'>Message Sent! Thank you for contacting us. </div>";
}

?>

<?php
include "header.php";
?>

<div class="jumbotron jumbotron-fluid" style="background-image: url(assets/img/about/bg.jpg);">
  <div class="container">
    <h1 class="display-4">Contact Us</h1>
    <p class="lead">Know Us Better</p>
  </div>
</div>
<div id="contact" class="contact-area">
  <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Contact us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-phone"></i>
              <p>
                Call: +62 838 9979 0773<br />
                <span>Every Day (9am-5pm)</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-envelope"></i>
              <p>
                Email: rajuyaderaa@gmail.com<br />
                <span>Web: www.example.com</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-geo-alt"></i>
              <p>
                Location: Perumahan Graha Arradea Blok CB No. 2,
                RT.06/RW.12, Ciherang, Dramaga, Bogor<br />
                <span>West Java 16610</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Google Map -->
        <div class="col-md-6">
          <!-- Start Map -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15853.813239011251!2d106.7511202!3d-6.5904412!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8c60a077808473de!2sMJ%20Tech%20(IT%20%26%20CCTV%20Solution)!5e0!3m2!1sid!2sid!4v1649132802366!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border: 0" allowfullscreen></iframe>

          <!-- End Map -->
        </div>
        <!-- End Google Map -->

        <!-- Start  contact -->
        <div class="col-md-6">
          <div class="form contact-form">
            <?= $msg; ?>
            <form action="" method="post">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required autocomplete="off" />
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required autocomplete="off" />
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required autocomplete="off" />
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required autocomplete="off"></textarea>
              </div>
              <div class="text-center">
                <button name="send" class="btn" type="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div>
        <!-- End Left contact -->
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>
<!-- End Contact Section -->