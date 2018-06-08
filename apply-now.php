<?php
include 'connect.php';
session_start();
$invalid ='';
if(isset($_POST['login']))
{

  $username=mysqli_real_escape_string($con,$_POST['username']);
  $pass=mysqli_real_escape_string($con,$_POST['pass']);
  $sql="SELECT * FROM `al_login` WHERE `email`='$username' AND `password`='$pass' AND `status`=1";
  $result = mysqli_query($con,$sql);
  $arr = mysqli_fetch_array($result);

if (mysqli_num_rows($result)==0)
{
  $invalid = "Invalid Username or Password";
  
}
else
{
  $date_time=date('Y/m/d H:i:s');
  $userid=$arr['user_id'];
  mysqli_query($con,"UPDATE `al_login` SET `log_date`='$date_time' where `user_id`=$userid");
  $_SESSION['userid']=$arr['user_id'];
  $_SESSION['username']=$arr['username'];
  $_SESSION['email']=$arr['email'];
    header('Location: application_form.php'); 
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
            <li><a href="admission.php">How To Apply</a></li>
            <li><a href="eligibility.php">Eligibility</a></li>
            <li class="active"><a href="<?php if(isset($_SESSION['username'])){echo "application_form.php"; }else{ echo "apply-now.php"; } ?>">Apply now</a></li>
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
              <p>Sign In using your registered account</p>
              <p style="text-align: center; color: red"><?php echo $invalid; ?></p>
              <form action="" method="post" enctype="multipart/form-data" class="form-wrapper login-form-wrapper">
                <div class="patients-detail form-group">
                    <label>Email Address</label>
                    <input type="text" name="username" value="" class="form-control" id="firstname" aria-invalid="false" >
                </div>
                <div class="patients-detail form-group">
                    <label>Password</label>
                    <input type="password" name="pass" value="" class="form-control" id="firstname" aria-invalid="false" >
                </div>
                <div class="btn-row">
                  <button class="btn btn-submit" type="submit" name="login">Login</button>
                  <a href="register.php"><button type="button" class="btn btn-submit btn-register">Register</button></a>
                </div>
                <p class="forget-password"><a class="" href="forgot-password.php">Forgot Password</a></p>
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