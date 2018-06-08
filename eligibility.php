<?php
session_start();
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

<!-- 
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
<!-- Global site tag (gtag.js) - DoubleClick -->
<script async src="https://www.googletagmanager.com/gtag/js?id=DC-6210620"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'DC-6210620');
</script>
<!-- End of global snippet: Please do not remove -->

      <!-- Header Bar -->
      <?php include 'header.php'; ?>
      <!-- /.Header Bar -->

      <!-- Banner -->
      <div class="sub-banner curriculum-tab">
        <div class="container">
          <ul class="tab-menu curriculum-tab">
            <li><a href="admission.php">How To Apply</a></li>
            <li class="active"><a href="eligibility.php">Eligibility</a></li>
            <li><a href="<?php if(isset($_SESSION['username'])){echo "application_form.php"; }else{ echo "apply-now.php"; } ?>">Apply now</a></li>
          </ul>
        </div>
      </div>
      <!-- /.Banner -->

    </header>
    <!-- /.Header -->



    <!-- Content Area -->
    <div class="content-area sub-content curriculum">
      <div class="container">
      	<div class="row">
          <div class="col-sm-12">
<p><Strong>Currently accepting candidates for the academic year of 2018/2019. Commencement date is October 1<sup>st</sup>, 2018.
            <h4>Eligibility Criteria</h4>
            <ul class="sub">
                <li>Holds bachelor degree in the related health specialty e.g. MBBS or MD post graduate students that are within 4 years of graduating from medical school.</li>
                <li>Should score a minimum overall mark of 6.5 in IELTS exam or equivalent</li>
                <li>Should pass the post medical school exam (if applicable, e.g. EMSTREX, SMLE, etc..)</li>
                <li>Should commit to be a full time applicant who is free and dedicated to the programme for its whole duration</li>
                <li>Should be willing to undertake and complete the licensing process</li>
                <li>Should be medically fit</li>
            </ul>
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