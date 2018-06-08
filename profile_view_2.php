<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];
$CV = '';
$Medical = '';
$MedicaldegreeCertificate = '';
$PersonalStatement = '';
$PersonalPhoto = '';
$EnglishLangugaeTestScore = '';
$PreentryexamResult = '';
$EmiratesID = '';
$PassportId='';
$DeansLetter='';
$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id'");
if(mysqli_num_rows($re)>0)
{
  $result=mysqli_fetch_object($re);
  $CV = $result->cv;
  $Medical = $result->medical;
  $MedicaldegreeCertificate = $result->medicaldegreecertificate;
  $PersonalStatement = $result->personalstatement;
  $PersonalPhoto = $result->personalphoto;
  $EnglishLangugaeTestScore = $result->englishlangugaetestscore;
  $PreentryexamResult = $result->preentryexamresult;
  $EmiratesID = $result->emiratesid;
  $PassportId=$result->passportid;
  $DeansLetter=$result->deansletter;
  $otherdegree=$result->otherdegree;
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
            <li class="active"><a href="#">Profile View</a></li>
          </ul>
        </div>
      </div>
      <!-- /.Banner -->

    </header>
    <!-- /.Header -->



    <!-- Content Area -->
    <div class="content-area sub-content application-form">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="login-form full-width">
              <h4>Profile View</h4>
              <h6>2.ATTACHMENTS</h6>
              <form action="" id="login_form" method="post" enctype="multipart/form-data" class="form-wrapper">
                
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">CV</label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn"> 

                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $CV; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Academic Transcript </label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $Medical; ?>">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Degree Completion Certificate <span class="sub-text">(e.g. Diploma, Bachelor’s, etc…)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $MedicaldegreeCertificate; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Other Degree <span class="sub-text">(if applicable)</span> </label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" id="Othertxt" class="form-control" readonly value="<?php echo $otherdegree; ?>">
                          
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Personal Statement  <span class="sub-text">(e.g. Diploma, Bachelor’s, etc…)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                             
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $PersonalStatement; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Personal Photo </label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $PersonalPhoto; ?>">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Evidence Of English Language Proficiency Result  <span class="sub-text">(e.g. IELTS, TOFEL, etc..)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                             
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $EnglishLangugaeTestScore; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Residency Entrance Exam Result  <span class="sub-text">(e.g. EMSTREX,SMLE,etc..)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $PreentryexamResult; ?>">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">National Identification Card <span class="sub-text">(e.g. IELTS, TOFEL, etc..)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $EmiratesID; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Passport/Travel Document  <span class="sub-text">(e.g. EMSTREX,SMLE,etc..)</span></label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $PassportId; ?>">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Dean’s Letter </label>
                      <div class="image-uploader">
                        <div class="input-group">
                          <span class="input-group-btn">
                              
                          </span>
                          <input type="text" class="form-control" readonly value="<?php echo $DeansLetter; ?>">
                        </div>
                      </div>
                  </div>
                </div>                
                
                
                <div class="btn-row">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="step-pager">
                        <ul>
                          <li class="active"><a href="profile_view.php">1</a></li>
                          <li class="active"><a href="#">2</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="profile_view.php" class="btn btn-submit">Back</a>  
                    </div>  
                  </div>           
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