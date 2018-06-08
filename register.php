<?php
include 'connect.php';
$invalid='';
if(isset($_POST['signup']))
{
  $username=$_POST['first_name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $con_pass=$_POST['con_password'];
  $email_code=rand(1000,100000);
  $date_time=date('Y/m/d H:i:s');
  if($username!='' && $email!='' && $pass!='' && $con_pass!=''){
      $re=mysqli_query($con,"SELECT * FROM `al_login` WHERE `email`='$email'");
      if(mysqli_num_rows($re)>0){
          $invalid="This Email Already Registered";
      }else{
    if($pass==$con_pass)
    {
      $sql="INSERT INTO `al_login`(`email`, `password`,`username`,`email_code`,`date_time`) VALUES ('$email','$pass','$username','$email_code','$date_time')"; 
      if(mysqli_query($con,$sql)){
        // To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = 'noreply@residency.aljalilachildrens.ae'; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set('SMTP', "relay-hosting.secureserver.net");
ini_set('smtp_port', "25");

       
        $subject = "Email Verification: Al Jalila Children's Paediatric Residency Programme";
        $message = '<html><body>';
        $message .= '<h4 style="color:#115E6E;">Thank you for registering for Al Jalila Residency programme. Please click the below link to verify your email address.</h4>';
        $message .= '<p><a href="http://residency.aljalilachildrens.ae/verify.php?id='.$email.'&ids='.$email_code.'">click here</a></p>'; 
        $message .= '</body></html>';
        
 $to = 'anaska582@yahoo.com';
// Sending email
        if(mail($email, $subject, $message, $headers)){
          header('Location: mail_confirm.php'); 
          $invalid = "Registration Complted Please Login ";
        } else{
         $invalid= 'Unable to send email. Please try again.';
       }
       
     }else{
      $invalid="Error";
    }
  }
  else{
    $invalid = "Password Not Match";
  }
      }

}else{
  $invalid = "Please Fill Required Fields";
}
}
?>
<!DOCTYPE html>
<html lang="en-US">
  
  <!-- Heady -->
<?php include 'head.php'; ?>
  <!-- /.Heady -->

  <!-- Body -->
  <body class="subpage">

    <!-- NavBar -->
    <?php include 'top_nav.php'; ?>
    <!-- /.NavBar -->

    <!-- Header -->
    <header>
      <!-- Header Bar -->
        <?php include 'header.php'; ?>
      <!-- /.Header Bar -->

      <!-- Banner -->
      <div class="sub-banner curriculum-tab">
        <div class="container">
          <ul class="tab-menu curriculum-tab">
            <li class="active"><a href="register.php">Register</a></li>
          </ul>
        </div>
      </div>
      <!-- /.Banner -->

    </header>
    <!-- /.Header -->



    <!-- Content Area -->
    <div class="content-area sub-content login-outer">
      <div class="container">
      	<div class="row">
          <div class="col-sm-12">
            <div class="login-form">
              <h4>Al Jalila Children’s Paedriatic Residency Programme</h4>
              <p>Create your account for applying for Al Jalila residency programme</p>
              <p style="text-align: center; color: red"><?php echo $invalid; ?></p>
              <form action="" method="post" enctype="multipart/form-data" class="form-wrapper login-form-wrapper">
                <div class="form-group">
                    <label>Enter Your Full Name</label>
                    <input type="text" name="first_name" required class="form-control" >
                </div>
                <div class="form-group">
                    <label>Enter Your Email</label>
                    <input type="email" name="email" required class="form-control" >
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" minlength="8" name="password" required class="form-control" >
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" minlength="8" name="con_password" required class="form-control" >
                </div>

                



                <div class="btn-row">
                	<button type="submit" name="signup" class="btn btn-submit btn-register">Register</button>              
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Content Area -->

   <?php include 'footer.php'; ?>
    <!-- /.Footer -->

    <!-- Java Script --> 
    <?php include 'script.php' ?>

  </body>
</html>