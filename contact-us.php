<?php
include 'connect.php';
session_start();
$invalid='';
if(isset($_POST['submit']))
{

  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $messagetxt=$_POST['message'];
$current_date = date('Y/m/d H:i:s');
    mysqli_query($con,"INSERT INTO `al_conatct_form`( `first_name`, `last_name`, `mobile`, `email`, `message`,`date`) VALUES ('$first_name','$last_name','$mobile','$email','$messagetxt','$current_date')");

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = $email; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$headersn  = 'MIME-Version: 1.0' . "\r\n";
$headersn .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$fromn = 'noreply@aljalilachildrens.ae'; 
// Create email headers
$headersn .= 'From: '.$fromn."\r\n".
    'Reply-To: '.$fromn."\r\n" .
    'X-Mailer: PHP/' . phpversion();

ini_set('SMTP', "relay-hosting.secureserver.net");
ini_set('smtp_port', "25");
          $to = 'residency@ajch.ae';
        //$to = 'anaska582@yahoo.com';
        $subject = 'Contact Form';
        $message = '<html><body>';
  $message .='
<div style="background:#f2f2f2; padding:30px; font-family:calibri; font-size:12px; color:#666666; padding-top:60px">
<div style="width:600px; margin:0 auto; background:#fff;  padding:20px; position:relative; border-radius:10px;">
<div style="position:absolute; left: 240px; top: -50px;"><a href="#" style="color:#666; font-size:32px; text-decoration:none; font-family:tahoma">Contact Form of Al Jalila Children\'s Residency Programme</a></div>
<div style="padding-top:20px; padding-bottom:20px">
<div style="padding-bottom:15px; border-top:dashed 1px #e5e5e5; padding-top:20px;">
<div style="float:left; width:160px">Full Name</div>
<div style="float:left; width:400px; color:#999">'.$first_name.' '.$last_name.'</div>
<br clear="all">
</div>
<div style="padding-bottom:15px;">
  <div style="float:left; width:160px">Mobile</div>
  <div style="float:left; width:400px; color:#999">'.$mobile.'</div>
  <br clear="all" />
</div>
<div style="padding-bottom:15px;">
  <div style="float:left; width:160px">Email</div>
  <div style="float:left; width:400px; color:#999">'.$email.'</div>
  <br clear="all" />
</div>
<div style="padding-bottom:15px;">
  <div style="float:left; width:160px">Message</div>
  <div style="float:left; width:400px; color:#999">'.$messagetxt.'</div>
  <br clear="all" />
</div>

</div>
</div>
</div>
';
$message .= '</body></html>';
  

$subnew='';
$subnew .="<html><body>";
$subnew .="<b><p>Dear ".$first_name."</p></b>";
$subnew .="<b><p>Thank you for emailing Al Jalila Children’s Paediatric Residency Program. This is to acknowledge receipt of your message/inquiry. Please allow us some time to get back to you as soon as we can.</p></b>";
$subnew .="<b><p>Best Regards</p></b>";
$subnew .="</body></html>";

$ton='anaska582@yahoo.com';
// Sending email
        if(mail($to, $subject, $message, $headers)){
          if(mail($email,'Contact Form of Al Jalila Children\'s Residency Programme',$subnew,$headersn))
          $invalid = "Your Message Send Successfully";
        else
          $invalid="not send";
        } else{
         $invalid= 'Unable to send email. Please try again.';
       }
}
?>
<!DOCTYPE html>
<html lang="en-US">
  
  <!-- Head -->
  <?php include 'head.php'; ?>
  <!-- /.Head -->

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
      <div class="sub-banner">
        <div class="container">
          <ul class="tab-menu">
            <li><a href="contact-us.php">Contact US</a></li>            
          </ul>
        </div>
      </div>
      <!-- /.Banner -->

    </header>
    <!-- /.Header -->



    <!-- Content Area -->
    <div class="content-area sub-content about-us affiliation">
      <div class="container">
      	<div class="row">
          <div class="col-md-12">
            <p>Al Jalila Children’s is situated on a campus adjacent to the Latifa Hosptial on Oud Metha Road, Dubai, United Arab Emirates. The hospital can be accessed from Sheikh Zayed Road in the area opposite the well known Wafi Mall and the Raffles Hotel. Dubai Healthcare City is in the immediate vicinity of the hospital.</p>
          </div> 
          
          <div class="col-sm-4" align="left">
            <h3>GET IN TOUCH</h3>   
           <p><?php echo $invalid; ?></p>
            <form action="" method="post" enctype="multipart/form-data" class="form-wrapper contact-form">
              <div class="patients-detail form-group">
                  <input type="text" name="first_name" value="" required class="form-control" id="firstname" aria-invalid="false" placeholder="First Name">
              </div>
              <div class="patients-detail form-group">
                  <input type="text" name="last_name" value="" required class="form-control" id="firstname" aria-invalid="false" placeholder="Last Name">
              </div>
              <div class="patients-detail form-group">
                  <input type="Number" name="mobile" value="" required class="form-control" id="firstname" aria-invalid="false" placeholder="Mobile Number">
              </div>
              <div class="patients-detail form-group">
                  <input type="email" name="email" value="" required class="form-control" id="firstname" aria-invalid="false" placeholder="Email">
              </div>
              <div class="patients-detail form-group">
                  <textarea minlength="10" maxlength="500" name="message"  required class="form-control" placeholder="Your Message"></textarea>
              </div>

              <div class="btn-row">
                <button type="submit" name="submit" class="btn btn-submit">Submit</button>
              </div>

            </form>

          </div>

          <div class="col-sm-8" align="right">
            <div class="contact-img">            
                <img src="assets/images/contact-us.jpg" alt="">
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