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
      <!-- Header Bar -->
      <?php include 'header.php'; ?>
      <!-- /.Header Bar -->

      <!-- Banner -->
      <div class="sub-banner curriculum-tab">
        <div class="container">
          <ul class="tab-menu curriculum-tab">
            <li class="active"><a href="admission.php">How To Apply</a></li>
            <li><a href="eligibility.php">Eligibility</a></li>
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
<p><Strong>Currently accepting candidates for the academic year of 2018/2019. Commencement date is October 1<sup>st</sup>, 2018.</p>
            <h4>Document Checklist</h4>
            <p>This checklist is provided to help you submit a complete online application. Please have the below-listed electronically available prior to initiating the online process. All copies must be clear coloured and in PDF format.</p>
            <p>IDENTIFIERS</p>
            <ul>
                <li>Copy of Travel Document/Passport</li>
                <li>National Identification Card (optional)</li>
                <li>Recent Passport-sized Photograph</li>
                <li>Curriculum Vitae</li>
            </ul>
            <p>ACADEMICS</p>
            <p>MEDICAL SCHOOL-RELATED</p>
            <ul>
                <li>Degree Completion Certificate</li>
                <li>Academic Transcript</li>
                <li>Dean's Letter<br><span>
1) To include ranking of applicant amongst the top % of class/cohort…   All letters must be printed on your institution(s) letterhead, andbear the original institution(s) stamp,in addition to the signature ofthe chosen official(s).
</span></li>
                <li>Recommendation Letters<br><span>1) Recommendation letters must be sent directly to residency@ajch.ae. AJCH Residency Programme will ONLY accept scanned letters that are emailed by the recommender from their institution’s official email address.<br>2) All letters must be printed on the recommender’s institution letterhead, and bear the original institution stamp,
in addition to the signature of the recommender.
<br>
3) The e-mail subject to include the applicant’s full name (i.e. Last, first, and middle ONLY) and date of birth.
</span></li>
                <li>Residency Entrance Exam</li>
            </ul>
            <p>OTHER</p>
            <ul>
                <li>Personal Statement</li>
                <li>Evidence of English Language Proficiency Result</li>
            </ul>
            <p>LICENSURE-RELATED</p>
            <ul>
                <li>Evidence of Licence (optional)</li>
                <li>Good Standing  Certificate (optional)</li>
            </ul>
           <!-- Page Content -->
           <a href="assets/download/Checklist.pdf" target="blank"><button class="btn btn-primary">DOWNLOAD CHECKLIST</button></a>

          </div>
        </div>
      </div>
    </div>
    <!-- /.Content Area -->


    <!-- Address Strip -->
    <?php include 'footer.php'; ?>
    <!-- /.Footer -->

    <!-- Java Script --> 
    <?php include 'script.php' ?>

  </body>
</html>