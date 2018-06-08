<?php
include 'connect.php';
session_start();
$invalid ='';
$hide=0;
$email_code=$_REQUEST['ids'];
if(isset($_POST['login']))
{

  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $con_pass=$_POST['con_pass'];

if($pass==$con_pass)
{
$re=mysqli_query($con,"UPDATE `al_login` SET `password`='$pass' WHERE `email`='$username' AND `email_code`='$email_code'");
$test="Your password has been updated.";
$hide=1;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = 'noreply@residency.aljalilachildrens.ae'; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set('SMTP', "relay-hosting.secureserver.net");
ini_set('smtp_port', "25");

        $to = $username;
        $subject = "Password Updated: Al Jalila Children's Paediatric Residency Programme";
        $message = '<html><body>';
        $message .= '<h4 style="color:#000">Your password has been successfully updated. </h4>'; 
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
else{
 $invalid = "Password Not Match";
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
                            
              <p style="text-align: center; color: #115e6e"><?php echo $test; ?></p>
              <p style="text-align: center; color: red"><?php echo $invalid; ?></p>
              <?php if($hide==0){ ?> 
              <form action="" method="post" enctype="multipart/form-data" class="form-wrapper login-form-wrapper">
                <div class="form-group">
                    <label>Email Your Full Name</label>
                    <input type="text" name="username" value="<?php echo $_REQUEST['id']; ?>" class="form-control" placeholder="Enter Your full name">
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" minlength="8" required name="pass" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" minlength="8" required name="con_pass" required class="form-control" placeholder="Confirm Password">
                </div>

                <div class="btn-row">
                	<button type="submit" name="login" class="btn btn-submit btn-register">RESET</button>
                  	                
                </div>
                
              </form>
              <?php  } ?>
                           <?php if($hide==1){ ?> 
                           <a href="apply-now.php"> <button  type="button"  class="btn btn-primary" >Login</button></a>
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