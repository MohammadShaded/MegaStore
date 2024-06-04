<?php session_start();?>
<?php include('layout/head.php');?>
<html lang="en">
<body>
  <?php

  include('connect.php');
if(isset($_POST['btn_forgot']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
 $text_email=$_POST['email'];
$sql = "SELECT * FROM users where email ='".$text_email."' " ;
$ans = $connect->query($sql);
$res=mysqli_fetch_array($ans);
   $realemail=$res['email'];
  $user_name = $res['username'];

 $msg = "Your Password is :'".$otp."'";
  $subject='Remind password';
  //$m = mail($to,$subject,$msg,$headers);

$otp1 = md5($otp);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
//$otp_pass =  hash('sha256', $otp1);
if($text_email == $realemail){
$sql = "UPDATE users SET password ='$otp1' WHERE email='$text_email'";
$ans1 = $connect->query($sql);



//$s = "select * from tbl_email_config";
//$r = $connect->query($s);
//$rr = mysqli_fetch_array($r);
//
//$mail_host = 'smtp.gmail.com';
//$mail_name ='Orange Station';
//$mail_username = '3sfr3sfr@gmail.com';
//$mail_password = 'zedvvvdlblcadluy';
//$mail_port = 465;
////$m = mail($to,$subject,$msg,$headers);
// require_once('mailer/autoload.php');
//$mail = new \PHPMailer\PHPMailer\PHPMailer();
//$mail->isSMTP();
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;// Set mailer to use SMTP
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';
//$mail->Host = $mail_host;  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = $mail_username;                 // SMTP username
//$mail->Password = $mail_password;                           // SMTP password
////$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail  // Enable TLS encryption, `ssl` also accepted
//$mail->SMTPSecure = 'tls';
//$mail->Port = $mail_port;           // or 587                         // TCP port to connect to
//$mail->setFrom($mail_username, $mail_name);
//$mail->addAddress($email, $fname);     // Add a recipient
//$mail->addAddress($text_email, $user_name);

//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);
  require_once '../mail.php';
 $mail->setFrom('3sfr3sfr@gmail.com','Orange Station');
 $mail->addAddress($realemail);
 $mail->Subject = 'Forget Password';
 $mail->Body    = "Hello, Your New Password is :'".$otp."' ";
$mail->send();
if ($mail->send()==true) {

?>

<link rel="stylesheet" href="../assets/css/popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success
    </h3>
    <p>Send Email Successfully.....Please check Your Email</p>
    <p>
      <a href="../login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a>
    </p>
  </div>
</div>


<?php } else { ?>

<link rel="stylesheet" href="../assets/css/popup_style.css">
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error
    </h3>
    <p>Something Goes Wrong.....</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>


<?php




    }
else {
  echo 'the email  you enterd not found in the database!';
}
}

?>



    <div id="main-wrapper">

        <div class="unix-login">


<div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Forgot Password</h4>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>


                                    <button type="submit" name="btn_forgot" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="../assets/js/lib/jquery/jquery.min.js"></script>

    <script src="../assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../assets/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.js"></script>

    <script src="../assets/js/sidebarmenu.js"></script>

    <script src="../assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="../assets/js/custom.min.js"></script>

</body>
</html>


