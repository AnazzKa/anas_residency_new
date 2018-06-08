<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$invalidf='Please Fill Required Fields';
$invalidt='Please Fill Required Fields';
$log_id=$_SESSION['userid'];
$first_name='';
$middle_name='';
$last_name='';
$nationality='';
$passport_no='';
$marital_status='';
$email=$_SESSION['email'];
$date_of_birth='';
$place_of_birth='';
$mobile_no='';
$university_name='';
$final_grade='';
$enter_mark='';
$graduation_year='';
$medical_degree='';
$other_degree='';
$pre_entry_exam='';
$pre_exam_name='';
$enter_score='';
$english_langauge_proficiency='';
$exam_name='';
$enter_marks='';
$gender='Male';

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


$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id' AND status=1");
if(mysqli_num_rows($re)>0)
{
 header('Location: profile_view.php?s');
 echo "<script>location='profile_view.php?s'</script>";
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
            <li class="active"><a href="application_form.php">Application Form</a></li>
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
              <h4>Application Form</h4>
              <h6>1. APPLICANT INFORMATION</h6>
              <p>(Information entered in this form is saved automatically and will be available to edit during next log in)</p>
              <form class="form-wrapper ">
                <div class="row">
                  <div class="form-group col-md-3">
                      <label class="title">First Name <?php if($first_name==''){ ?> <span id="first_name_star" class="red">*</span><?php } ?><span class="red" id="first_name_error"></span></label>
                      <input type="text" required onchange="update('first_name',this.value)" name="first_name" value="<?php echo $first_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-3">
                      <label class="title">Middle Name <?php if($middle_name==''){ ?> <span id="middle_name_star" class="red">*</span><?php } ?><span class="red" id="middle_name_error"></span></label>
                      <input type="text" required onchange="update('middle_name',this.value)" name="middle_name" value="<?php echo $middle_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-3">
                      <label class="title">Last Name <?php if($last_name==''){ ?> <span id="last_name_star" class="red">*</span><?php } ?><span class="red" id="last_name_error"></span></label>
                      <input type="text" required onchange="update('last_name',this.value)" name="last_name" value="<?php echo $last_name ?>" class="form-control" >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Nationality  <?php if($nationality==''){ ?> <span id="nationality_star" class="red">*</span><?php } ?><span class="red" id="nationality_error"></span></label>
                      <select class="form-control" required onchange="update('nationality',this.value)" name="nationality">
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
                      <label class="title">National/Residency Identification Card (ID) <?php if($passport_no==''){ ?> <span id="passport_no_star" class="red">*</span><?php } ?><span class="red" id="passport_no_error"></span></label>
                      <input required type="text" onchange="update('passport_no',this.value)" name="passport_no" value="<?php echo $passport_no ?>" class="form-control" >
                  </div>                  
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Marital Status <?php if($marital_status==''){ ?> <span id="marital_status_star" class="red">*</span><?php } ?><span class="red" id="marital_status_error"></span></label>
                      <select name="marital_status" required onchange="update('marital_status',this.value)" class="form-control" id="marital_status">
                                        <option value=""></option>
                                        <option value="Single" <?php if($marital_status=='Single'){ ?> selected <?php } ?>>Single</option>
                                        <option value="Married" <?php if($marital_status=='Married'){ ?> selected <?php } ?>>Married</option>
                                        <option value="Other" <?php if($marital_status=='Other'){ ?> selected <?php } ?>>Other</option>
                                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Email<?php if($email==''){ ?> <span id="email_star" class="red">*</span><?php } ?><span class="red" id="email_error"></span></label>
                      <input type="email" required onchange="update('email',this.value)" name="email" value="<?php echo $email ?>" class="form-control" >
                  </div>                  
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Gender<?php if($gender==''){ ?> <span id="gender_star" class="red">*</span><?php } ?><span class="red" id="gender_error"></span></label>
                      <div class="radio">
                          <label><input type="radio" name="gender" onchange="update('gender',this.value)" <?php if($gender=='Male'){ ?> checked <?php } ?> value="Male">Male</label>
                          <label><input type="radio" name="gender"  onchange="update('gender',this.value)" <?php if($gender=='Female'){ ?> checked <?php } ?> value="Female">Female</label>
                      </div>                      
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Place of Birth<?php if($place_of_birth==''){ ?> <span id="place_of_birth_star" class="red">*</span><?php } ?><span class="red" id="place_of_birth_error"></span></label>
                      <input onchange="update('place_of_birth',this.value)" required type="text" name="place_of_birth" value="<?php echo $place_of_birth ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">DOB <?php if($date_of_birth==''){ ?> <span id="date_of_birth_star" class="red">*</span><?php } ?><span class="red" id="date_of_birth_error"></span></label>
                      <input type="date" required onchange="update('date_of_birth',this.value)" name="date_of_birth" min="1970-01-01" max="2000-12-31" value="<?php echo $date_of_birth ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Mobile <?php if($mobile_no==''){ ?> <span id="mobile_no_star" class="red">*</span><?php } ?><span  class="red" id="mobile_no_error"></span></label>
                      <input type="number" required onchange="update('mobile_no',this.value)" name="mobile_no" value="<?php echo $mobile_no ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Academic Institution <?php if($university_name==''){ ?> <span id="university_name_star" class="red">*</span><?php } ?><span class="red" id="university_name_error"></span></label>
                      <input type="text" required onchange="update('university_name',this.value)" name="university_name" value="<?php echo $university_name ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Final Grade (as it appears on academic transcript) <?php if($final_grade==''){ ?> <span id="final_grade_star" class="red">*</span><?php } ?><span class="red" id="final_grade_error"></span></label>
                      <select name="final_grade" required onchange="update('final_grade',this.value)" class="form-control">
                        <option value=""></option>
                                              <option <?php if($final_grade=='GPA'){ ?> selected <?php } ?> value="GPA">GPA</option>
                                              <option <?php if($final_grade=='Percentage'){ ?> selected <?php } ?> value="Percentage">Percentage</option>
                                              <option <?php if($final_grade=='Grade'){ ?> selected <?php } ?> value="Grade">Grade</option>
                      </select>
                      <div id="EntermarksLabel">
                      <label class="title"><span class="enterSelect">GPA</span> <span class="red" id="enter_mark_error"></span></label>
                      <input onchange="update('enter_mark',this.value)" type="text" name="enter_mark" value="<?php echo $enter_mark ?>" class="form-control" >
                    </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
    <label class="title">Graduation Year <?php if($graduation_year==''){ ?> <span id="graduation_year_star" class="red">*</span><?php } ?><span class="red" id="graduation_year_error"></span></label>
                      <select required onchange="update('graduation_year',this.value)" name="graduation_year" class="form-control">
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
                      <label class="title">Medical Degree (MBBS,MD,etc…) <?php if($medical_degree==''){ ?> <span id="medical_degree_star" class="red">*</span><?php } ?><span class="red" id="medical_degree_error"></span></label>
                      <input type="text" required onchange="update('medical_degree',this.value)" name="medical_degree" value="<?php echo $medical_degree ?>" class="form-control" >
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">Other Degree</label>
                      <input type="text" onchange="update('other_degree',this.value)" name="other_degree" value="<?php echo $other_degree ?>" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="title">Type of Residency Entrance Exam <?php if($pre_entry_exam==''){ ?> <span id="pre_entry_exam_star" class="red">*</span><?php } ?><span class="red" id="pre_entry_exam_error"></span></label>
                      <select required name="pre_entry_exam" onchange="update('pre_entry_exam',this.value)" class="form-control">
                        <option <?php if($pre_entry_exam==''){ ?> selected <?php } ?> value="">Please Select an Exam in the List</option>
                                                <option <?php if($pre_entry_exam=='Emirates Medical Residency Entrance Examination'){ ?> selected <?php } ?> value="Emirates Medical Residency Entrance Examination">Emirates Medical Residency Entrance Examination</option>

                                                <option <?php if($pre_entry_exam=='Saudi Medical Licensing Exam'){ ?> selected <?php } ?> value="Saudi Medical Licensing Exam">Saudi Medical Licensing Exam</option>
                                                <option <?php if($pre_entry_exam=='Other'){ ?> selected <?php } ?> value="Other">Other</option>
                      </select>
                      <div id="PreExamname">
                       <label class="title">Enter Exam Name: <span class="red" id="pre_exam_name_error"></span></label>
                      <input type="text" onchange="update('pre_exam_name',this.value)" name="pre_exam_name" value="<?php echo $pre_exam_name ?>" class="form-control" >
</div><div id="Enterscore">
                      <label class="title">Score: <span class="red" id="enter_score_error"></span></label>
                      <input type="text" onchange="update('enter_score',this.value)" name="enter_score" value="<?php echo $enter_score ?>" class="form-control" >
                      </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <label class="title">English Language Proficiency <?php if($english_langauge_proficiency==''){ ?> <span id="english_langauge_proficiency_star" class="red">*</span><?php } ?><span class="red" id="english_langauge_proficiency_error"></span></label>
                      <select onchange="update('english_langauge_proficiency',this.value)" required name="english_langauge_proficiency" class="form-control">
                        <option <?php if($english_langauge_proficiency==''){ ?> selected <?php } ?> value="" >Please Select an Exam in the List</option>
                                                      <option <?php if($english_langauge_proficiency=='IELTS'){ ?> selected <?php } ?> value="IELTS">IELTS</option>
                                                      <option <?php if($english_langauge_proficiency=='TOEFL'){ ?> selected <?php } ?> value="TOEFL">TOEFL</option>
                                                      <option <?php if($english_langauge_proficiency=='Cambridge'){ ?> selected <?php } ?> value="Cambridge">Cambridge</option>
                                                      <option <?php if($english_langauge_proficiency=='Other'){ ?> selected <?php } ?> value="Other">Other</option>
                      </select>
                      <div id="Examname">
                      <label class="title">Enter Test Name: <span class="red" id="exam_name_error"></span></label>
                      <input type="text" onchange="update('exam_name',this.value)" name="exam_name" id="exam_name" value="<?php echo $exam_name ?>" class="form-control" >
</div>
<div id="Entermark">
                      <label class="title">Score: <span class="red" id="enter_marks_error"></span></label>
                      <input type="text" onchange="update('enter_marks',this.value)" name="enter_marks" value="<?php echo $enter_marks ?>" class="form-control" >
                      </div>
                  </div>                                  
                </div>
                
                <div class="btn-row">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="step-pager">
                        <ul>
                          <li class="active"><a href="#">1</a></li>
                          <li><a  id="step1" onclick="menus_two(2);">2</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-6 text-right">
                  	 <a  id="stpbtn1" onclick="menus_two(2);" class="btn btn-submit">Next</a>    
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
// if($("input[name*='enter_score']" ).val()=='')
//         $("#Enterscore").hide();
//           else
//     $("#Enterscore").show();
//alert($("input[name*='exam_name']" ).val());
          var pre_entry_exam=$('select[name="pre_entry_exam"] option:selected').val();
          var english_langauge_proficiency=$('select[name="english_langauge_proficiency"] option:selected').val();

          if(english_langauge_proficiency=='Other') {
              $("#Examname").show();

          }else{
              if($('#exam_name').val()=='')
                  $("#Examname").hide();
              else
                  $("#Examname").show();
          }

          if(pre_entry_exam=='Other') {
              $("#PreExamname").show();

          }else{
              if($("input[name*='pre_exam_name']" ).val()=='')
                  $("#PreExamname").hide();
              else
                  $("#PreExamname").show();
          }





        //   if($("input[name*='enter_marks']" ).val()=='')
        // $("#Entermark").hide();
        //   else
        //       $("#Entermark").show();
          });
      function menus_two()
    {
        var sts=0;
       var first_name=$("input[name*='first_name']" ).val();
       var middle_name=$("input[name*='middle_name']" ).val();
       var last_name=$("input[name*='last_name']" ).val();
       var nationality=$('select[name="nationality"] option:selected').val();
       var passport_no=$("input[name*='passport_no']" ).val();
       var marital_status=$('select[name="marital_status"] option:selected').val();
       var email=$("input[name*='email']" ).val();
       var place_of_birth=$("input[name*='place_of_birth']" ).val();
       var date_of_birth=$("input[name*='date_of_birth']" ).val();
       var mobile_no=$("input[name*='mobile_no']" ).val();
       var university_name=$("input[name*='university_name']" ).val();
       var final_grade=$('select[name="final_grade"] option:selected').val();
       var graduation_year=$('select[name="graduation_year"] option:selected').val();
       var medical_degree=$("input[name*='medical_degree']" ).val();
       var pre_entry_exam=$('select[name="pre_entry_exam"] option:selected').val();
       var english_langauge_proficiency=$('select[name="english_langauge_proficiency"] option:selected').val();
       var enter_mark=$('input[name="enter_mark"] ').val();
       var enter_score=$('input[name="enter_score"] ').val();
       var enter_marks=$('input[name="enter_marks"] ').val();
        var s=0;
        var t=0;

        if(english_langauge_proficiency=='Other') {
            var exam_name = $('#exam_name').val();
           if(exam_name=='')
               s=1;
           else
               s=0;
       }  if(pre_entry_exam=='Other') {
            var pre_exam_name = $('input[name="pre_exam_name"] ').val();
           if(pre_exam_name=='')
               t=1;
           else
               t=0;
       }

    if(first_name==''|| middle_name==''|| last_name==''|| nationality==''|| passport_no==''|| marital_status==''|| email==''||
        place_of_birth==''|| date_of_birth==''|| mobile_no==''|| university_name==''|| final_grade==''|| graduation_year==''|| medical_degree==''||
        pre_entry_exam==''|| english_langauge_proficiency=='' || enter_mark=='' || enter_score=='' || enter_marks=='' || s==1 || t==1){
        if(s==1){
            $('#exam_name_error').html('Field is required');
        }
        if(t==1){
            $('#pre_exam_name_error').html('Field is required');
        }
            if(enter_marks==''){
            $('#enter_marks_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#university_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#enter_marks_error').html('');
        }
        if(enter_score==''){
            $('#enter_score_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#university_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#enter_score_error').html('');
        }
        if(enter_mark==''){
            $('#enter_mark_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#university_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#enter_mark_error').html('');
        }

        if(english_langauge_proficiency==''){
            $('#english_langauge_proficiency_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#university_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#english_langauge_proficiency_error').html('');
        }
        if(pre_entry_exam==''){
            $('#pre_entry_exam_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#mobile_no_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#pre_entry_exam_error').html('');
        }
        if(medical_degree==''){
            $('#medical_degree_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#mobile_no_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#medical_degree_error').html('');
        }
        if(graduation_year==''){
            $('#graduation_year_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#place_of_birth_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#graduation_year_error').html('');
        }
        if(final_grade==''){
            $('#final_grade_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#marital_status_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#final_grade_error').html('');
        }
        if(university_name==''){
            $('#university_name_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#place_of_birth_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#university_name_error').html('');
        }
        if(mobile_no==''){
            $('#mobile_no_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#first_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#mobile_no_error').html('');
        }
        if(date_of_birth==''){
            $('#date_of_birth_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#first_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#date_of_birth_error').html('');
        }
        if(place_of_birth==''){
            $('#place_of_birth_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('#first_name_error').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#place_of_birth_error').html('');
        }
        if(email==''){
            $('#email_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#email_error').html('');
        }
        if(marital_status==''){
            $('#marital_status_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#marital_status_error').html('');
        }
        if(passport_no==''){
            $('#passport_no_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#passport_no_error').html('');
        }
        if(nationality==''){
            $('#nationality_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#nationality_error').html('');
        }
        if(last_name==''){
            $('#last_name_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#last_name_error').html('');
        }
        if(middle_name==''){
            $('#middle_name_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else
        {
            if(sts!=1)
                sts=0;
            $('#middle_name_error').html('');
        }
        if(first_name==''){
            $('#first_name_error').html('Field is required');
            sts=1;
            $(window).scrollTop($('.login-form').offset().top);
        }else{
            if(sts!=1)
                sts=0;
            $('#first_name_error').html('');
        }

    }else{
        console.log('else part');
        document.location.href = 'application_form_2.php';
    }

    }
     function update(fld,cont)
    {
      
        $('#'+fld+'_error').html('');
      if(fld=='email')
      {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(cont)) {
        $('#email_error').html('');
      }
      else {
          $('#email_error').html('Please Enter Valid Email Address');
       }
      }
      if(fld=='first_name'|| fld=='middle_name' || fld=='place_of_birth' || fld=='passport_no')
      {
        if(cont.length>=2)
            $('#'+fld+'_error').html('');
          else
            $('#'+fld+'_error').html('Minimum 2 Letters');
      }
        if(fld=='mobile_no')
        {
            var filter = /^\d*(?:\.\d{1,2})?$/;
            if (filter.test(cont)) {
                if(cont.length>=10){
                    if(cont.length<=14)
                    $('#'+fld+'_error').html('');
                    else
                    $('#'+fld+'_error').html('Please put max 14 digit mobile number');

                } else {
                    $('#'+fld+'_error').html('Please put min 10 digit mobile number');
                }
            }
            else {

                $('#'+fld+'_error').html('Not a valid number');
            }
        }
        // if(fld=='date_of_birth'){
        //     dob = new Date(cont);
        //     var today = new Date();
        //     var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        //     if(age>18){
        //         if(age<40)
        //             $('#'+fld+'_error').html('');
        //         else
        //             $('#'+fld+'_error').html('Max age 40');
        //
        //     }else
        //     $('#'+fld+'_error').html('Min Age 18');
        // }
if(fld=='final_grade'){
    if($("input[name*='enter_mark']" ).val()==''){
      $('#EntermarksLabel').show();
      $('.enterSelect').html(cont);
    $('#enter_mark_error').html('Field is required');
        $("input[name*='enter_mark']").attr("required","true");
    }

}
    if(fld=='pre_entry_exam'){
    if($("input[name*='enter_score']" ).val()==''){
      $('#Enterscore').show();
    $('#enter_score_error').html('Field is required');
        $("input[name*='enter_score']").attr("required","true");
    }
        if(cont=='Other'){
          $('#PreExamname').show();
            $('#pre_exam_name_error').html('Field is required');
          }else{
            $('#PreExamname').hide();
          }
}
        if(fld=='english_langauge_proficiency'){
    if($("input[name*='enter_marks']" ).val()==''){
      $('#Entermark').show();
    $('#enter_marks_error').html('Field is required');
        $("input[name*='enter_marks']").attr("required","true");
    }
        if(cont=='Other'){
          $('#Examname').show();
            $('#exam_name_error').html('Field is required');
          }else{
            $('#Examname').hide();
          }
}
      $.ajax({
        type: "POST",
        url: "update_form.php",
        async: false,
        data: {fld:fld,text:cont},
        success: function (response) {
          console.log(response);
        }
      });
        $('#'+fld+'_star').css('display', 'none');
    }
          </script>

  </body>
</html>