<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];

$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id'");
if(mysqli_num_rows($re)>0)
{
  $result=mysqli_fetch_object($re);
  $first_name=$result->first_name;
  $middle_name=$result->middle_name;
  $last_name=$result->last_name;
  $nationality=$result->nationality;
  $passport_no=$result->passport_no;
  $marital_status=$result->marital_status;
  $email=$result->email;
  $date_of_birth=$result->date_of_birth;
  $place_of_birth=$result->place_of_birth;
  $mobile_no=$result->mobile_no;
  $university_name=$result->university_name;
  $final_grade=$result->final_grade;
  $enter_mark=$result->enter_mark;
  $graduation_year=$result->graduation_year;
  $medical_degree=$result->medical_degree;
  $other_degree=$result->other_degree;
  $pre_entry_exam=$result->pre_entry_exam;
  $pre_exam_name=$result->pre_exam_name;
  $enter_score=$result->enter_score;
  $english_langauge_proficiency=$result->english_langauge_proficiency;
  $exam_name=$result->exam_name;
  $enter_marks=$result->enter_marks;
  $gender=$result->gender;
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
              <h6>1. APPLICANT INFORMATION</h6>
              <p></p>
              <form class="form-wrapper ">
                <div class="row">
                  <div class="form-group col-md-3">
                      <label class="title">First Name </label>
                      <input type="text" name="first_name" disabled="disabled" value="<?php echo $first_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-3">
                      <label class="title">Middle Name </label>
                      <input type="text"  disabled="disabled" name="middle_name" value="<?php echo $middle_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-3">
                      <label class="title">Last Name </label>
                      <input type="text" disabled="disabled" name="last_name" value="<?php echo $last_name ?>" class="form-control" >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Nationality  </label>
                      <select class="form-control" disabled="disabled" name="nationality">
                        <option value=""></option>
                        <?php
                                    $n=mysqli_query($con,"SELECT * FROM `nationalities`");
                                    while ($r=mysqli_fetch_array($n)) {
                                     ?>
                        <option <?php if($nationality==$r['nationality']){ ?> selected <?php } ?> value="<?php echo $r['nationality']; ?>"><?php echo $r['nationality']; ?></option>
                                     <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">National/Residency Identification Card (ID) </label>
                      <input  type="text"  name="passport_no" disabled="disabled" value="<?php echo $passport_no ?>" class="form-control" >
                  </div>                  
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Marital Status </label>
                      <select name="marital_status" disabled="disabled" class="form-control" id="marital_status">
                                        <option value=""></option>
                                        <option value="Single" <?php if($marital_status=='Single'){ ?> selected <?php } ?>>Single</option>
                                        <option value="Married" <?php if($marital_status=='Married'){ ?> selected <?php } ?>>Married</option>
                                        <option value="Other" <?php if($marital_status=='Other'){ ?> selected <?php } ?>>Other</option>
                                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Email</label>
                      <input type="email" disabled="disabled" name="email" value="<?php echo $email ?>" class="form-control" >
                  </div>                  
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Gender</label>
                      <div class="radio">
                          <label><input type="radio" name="gender"  <?php if($gender=='Male'){ ?> checked <?php } ?> value="Male">Male</label>
                          <label><input type="radio" name="gender"  <?php if($gender=='Female'){ ?> checked <?php } ?> value="Female">Female</label>
                      </div>                      
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Place of Birth</label>
                      <input  type="text" disabled="disabled" name="place_of_birth" value="<?php echo $place_of_birth ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">DOB </label>
                      <input type="date" disabled="disabled" name="date_of_birth" min="1970-01-01" value="<?php echo $date_of_birth ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Mobile </label>
                      <input type="text" disabled="disabled" name="mobile_no" value="<?php echo $mobile_no ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Academic Institution </label>
                      <input type="text" disabled="disabled" name="university_name" value="<?php echo $university_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Final Grade (as it appears on academic transcript) </label>
                      <select name="final_grade" disabled="disabled" class="form-control">
                        <option value=""></option>
                                              <option <?php if($final_grade=='GPA'){ ?> selected <?php } ?> value="GPA">GPA</option>
                                              <option <?php if($final_grade=='Percentage'){ ?> selected <?php } ?> value="Percentage">Percentage</option>
                                              <option <?php if($final_grade=='Grade'){ ?> selected <?php } ?> value="Grade">Grade</option>
                      </select>
                      <div id="EntermarksLabel">
                      <label class="title"><span class="enterSelect">GPA</span> <span class="red" id="enter_mark_error"></span></label>
                      <input  type="text" disabled="disabled" name="enter_mark" value="<?php echo $enter_mark ?>" class="form-control" >
                    </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
    <label class="title">Graduation Year </label>
                      <select  name="graduation_year" disabled="disabled" class="form-control">
                        <option value="">Select Options</option>
                                                <option <?php if($graduation_year=='2000'){ ?> selected <?php } ?> value="2000">2000</option>
                                                <option <?php if($graduation_year=='2001'){ ?> selected <?php } ?> value="2001">2001</option>
                                                <option <?php if($graduation_year=='2002'){ ?> selected <?php } ?> value="2002">2002</option>
                                                <option <?php if($graduation_year=='2003'){ ?> selected <?php } ?> value="2003">2003</option>
                                                <option <?php if($graduation_year=='2004'){ ?> selected <?php } ?> value="2004">2004</option>
                                                <option <?php if($graduation_year=='2005'){ ?> selected <?php } ?> value="2005">2005</option>
                                                <option <?php if($graduation_year=='2006'){ ?> selected <?php } ?> value="2006">2006</option>
                                                <option <?php if($graduation_year=='2007'){ ?> selected <?php } ?> value="2007">2007</option>
                                                <option <?php if($graduation_year=='2008'){ ?> selected <?php } ?> value="2008">2008</option>
                                                <option <?php if($graduation_year=='2009'){ ?> selected <?php } ?> value="2009">2009</option>
                                                <option <?php if($graduation_year=='2010'){ ?> selected <?php } ?> value="2010">2010</option>
                                                <option <?php if($graduation_year=='2011'){ ?> selected <?php } ?> value="2011">2011</option>
                                                <option <?php if($graduation_year=='2012'){ ?> selected <?php } ?> value="2012">2012</option>
                                                <option <?php if($graduation_year=='2013'){ ?> selected <?php } ?> value="2013">2013</option>
                                                <option <?php if($graduation_year=='2014'){ ?> selected <?php } ?> value="2014">2014</option>
                                                <option <?php if($graduation_year=='2015'){ ?> selected <?php } ?> value="2015">2015</option>
                                                <option <?php if($graduation_year=='2016'){ ?> selected <?php } ?> value="2016">2016</option>
                                                <option <?php if($graduation_year=='2017'){ ?> selected <?php } ?> value="2017">2017</option>
                                                <option <?php if($graduation_year=='2018'){ ?> selected <?php } ?> value="2018">2018</option>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Medical Degree (MBBS,MD,etc…) <</label>
                      <input type="text"  name="medical_degree" disabled="disabled" value="<?php echo $medical_degree ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Other Degree</label>
                      <input type="text"  name="other_degree" disabled="disabled" value="<?php echo $other_degree ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Type of Residency Entrance Exam </label>
                      <select  name="pre_entry_exam" disabled="disabled" class="form-control">
                        <option <?php if($pre_entry_exam==''){ ?> selected <?php } ?> value=""></option>
                                                <option <?php if($pre_entry_exam=='Emirates Medical Residency Entrance Examination'){ ?> selected <?php } ?> value="Emirates Medical Residency Entrance Examination">Emirates Medical Residency Entrance Examination</option>

                                                <option <?php if($pre_entry_exam=='Saudi Medical Licensing Exam'){ ?> selected <?php } ?> value="Saudi Medical Licensing Exam">Saudi Medical Licensing Exam</option>
                                                <option <?php if($pre_entry_exam=='Other'){ ?> selected <?php } ?> value="Other">Other</option>
                      </select>
                      <div id="PreExamname">
                       <label class="title">Enter Exam Name: <span class="red" id="pre_exam_name_error"></span></label>
                      <input type="text"  name="pre_exam_name" disabled="disabled" value="<?php echo $pre_exam_name ?>" class="form-control" >
</div><div id="Enterscore">
                      <label class="title">Score: <span class="red" id="enter_score_error"></span></label>
                      <input type="text"  name="enter_score" disabled="disabled" value="<?php echo $enter_score ?>" class="form-control" >
                      </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">English Language Proficiency </label>
                      <select  name="english_langauge_proficiency" disabled="disabled" class="form-control">
                        <option <?php if($english_langauge_proficiency==''){ ?> selected <?php } ?> value=""></option>
                                                      <option <?php if($english_langauge_proficiency=='IELTS'){ ?> selected <?php } ?> value="IELTS">IELTS</option>
                                                      <option <?php if($english_langauge_proficiency=='TOEFL'){ ?> selected <?php } ?> value="TOEFL">TOEFL</option>
                                                      <option <?php if($english_langauge_proficiency=='Cambridge'){ ?> selected <?php } ?> value="Cambridge">Cambridge</option>
                                                      <option <?php if($english_langauge_proficiency=='Other'){ ?> selected <?php } ?> value="Other">Other</option>
                      </select>
                      <div id="Examname">
                      <label class="title">Enter Test Name: <span class="red" id="exam_name_error"></span></label>
                      <input type="text"  name="exam_name" disabled="disabled" value="<?php echo $exam_name ?>" class="form-control" >
</div>
<div id="Entermark">
                      <label class="title">Score: <span class="red" id="enter_marks_error"></span></label>
                      <input type="text"  name="enter_marks" disabled="disabled" value="<?php echo $enter_marks ?>" class="form-control" >
                      </div>
                  </div>                                  
                </div>
                
                <div class="btn-row">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="step-pager">
                        <ul>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="profile_view_2.php" >2</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-6 text-right">
                  	 <a href="profile_view_2.php" id="stpbtn1"  class="btn btn-submit">Next</a>    
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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
       
         if($("input[name*='enter_mark']" ).val()=='')
        $("#EntermarksLabel").hide();
              else
              $("#EntermarksLabel").show();
if($("input[name*='enter_score']" ).val()=='')
        $("#Enterscore").hide();
          else
    $("#Enterscore").show();

          if($("input[name*='pre_exam_name']" ).val()=='')
              $("#PreExamname").hide();
          else
              $("#PreExamname").show();

          if($("input[name*='exam_name']" ).val()=='')
              $("#Examname").hide();
          else
              $("#Examname").show();

          if($("input[name*='enter_marks']" ).val()=='')
        $("#Entermark").hide();
          else
              $("#Entermark").show();
          });
        </script>

  </body>
</html>