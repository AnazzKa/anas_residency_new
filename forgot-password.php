<?php
include 'connect.php';
session_start();
$invalid ='';
$hide=0;
if(isset($_POST['send']))
{

  $username=$_POST['username'];
  
  $sql="SELECT * FROM `al_login` WHERE `email`='$username' OR `username`='$username'";
  $result = mysqli_query($con,$sql);
  $arr = mysqli_fetch_array($result);

if (mysqli_num_rows($result)==0)
{
  $invalid = "Invalid User";
  
}
else
{
  $email=$arr['email'];
  $email_code=$arr['email_code'];

    $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = 'noreply@residency.aljalilachildrens.ae'; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set('SMTP', "relay-hosting.secureserver.net");
ini_set('smtp_port', "25");

        $to = $email;
        $subject = "Reset Password: Al Jalila Children's Paediatric Residency Programme";
        $message = '<html><body>';
        $message .= '<h4 style="color:#115E6E;">Please click below link to change password</h4>';
        $message .= '<p><a href="http://residency.aljalilachildrens.ae/change_password.php?id='.$email.'&ids='.$email_code.'">click here</a></p>'; 
        $message .= '</body></html>';
        

// Sending email
        if(mail($to, $subject, $message, $headers)){
          //header('Location: mail_confirm.php'); 
          $hide=1;
          //$invalid = "We have send you the link to reset the password. Please check your inbox.";
        } else{
         $invalid= 'Unable to send email. Please try again.';
       }
}
}
if(isset($_REQUEST['s']))
{
$invalid = "Profile Updated"; 
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
            <li class="active"><a href="apply-now.php">Forgot Password</a></li>
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
              
              <?php if($hide==0){ ?>
<h4>We just need your registered email id to sent you passwprd reset instruction.</h4>
<?php  } ?>
<?php if($hide==1){ ?>
<h4>We have send you the link to reset the password. Please check your inbox.
</h4>
<?php  } ?>
<p style="text-align: center; color: red"><?php echo $invalid; ?></p>
<?php if($hide==0){ ?>
              <form action="" method="post" enctype="multipart/form-data" class="form-wrapper login-form-wrapper">
                <div class="form-group">
                    <label>Enter Registered Email Address</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Your Registered Email Address">
                </div>                
                <div class="btn-row">
                  <button type="submit" name="send" class="btn btn-submit">Send</button>
                  <a href="register.php"><button type="button" class="btn btn-submit btn-register">Login</button></a>
                </div>
                
              </form>
               <?php  } ?>
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