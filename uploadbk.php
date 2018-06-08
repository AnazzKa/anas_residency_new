<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];

  $CV = $_FILES['CV']['name'];
  $Medical = $_FILES['Medical']['name'];
  $MedicaldegreeCertificate = $_FILES['MedicaldegreeCertificate']['name'];
  $OtherDegree = $_FILES['OtherDegree']['name'];
  $PersonalStatement = $_FILES['PersonalStatement']['name'];
  $PersonalPhoto = $_FILES['PersonalPhoto']['name'];
  $EnglishLangugaeTestScore = $_FILES['EnglishLangugaeTestScore']['name'];
  $PreentryexamResult = $_FILES['PreentryexamResult']['name'];
  $EmiratesID = $_FILES['EmiratesID']['name'];
  $PassportId = $_FILES['PassportId']['name'];
  $DeansLetter = $_FILES['DeansLetter']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($CV);
    $target_file1 = $target_dir . basename($Medical);
    $target_file2 = $target_dir . basename($MedicaldegreeCertificate);
    $target_file3 = $target_dir . basename($OtherDegree);
    $target_file4 = $target_dir . basename($PersonalStatement);
    $target_file5 = $target_dir . basename($PersonalPhoto);
    $target_file6 = $target_dir . basename($EnglishLangugaeTestScore);
    $target_file7 = $target_dir . basename($PreentryexamResult);
    $target_file8 = $target_dir . basename($EmiratesID);
    $target_file9 = $target_dir . basename($PassportId);
    $target_file10 = $target_dir . basename($DeansLetter);

    if($CV!='')
      move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file);
    if($Medical!='')
      move_uploaded_file($_FILES["Medical"]["tmp_name"], $target_file1);
    if($MedicaldegreeCertificate!='')
      move_uploaded_file($_FILES["MedicaldegreeCertificate"]["tmp_name"], $target_file2);
    if($OtherDegree!='')
      move_uploaded_file($_FILES["OtherDegree"]["tmp_name"], $target_file3);
    if($PersonalStatement!='')
      move_uploaded_file($_FILES["PersonalStatement"]["tmp_name"], $target_file4);
    if($PersonalPhoto!='')
      move_uploaded_file($_FILES["PersonalPhoto"]["tmp_name"], $target_file5);
    if($EnglishLangugaeTestScore!='')
      move_uploaded_file($_FILES["EnglishLangugaeTestScore"]["tmp_name"], $target_file6);
    if($PreentryexamResult!='')
      move_uploaded_file($_FILES["PreentryexamResult"]["tmp_name"], $target_file7);
    if($EmiratesID!='')
      move_uploaded_file($_FILES["EmiratesID"]["tmp_name"], $target_file8);
    if($PassportId!='')
      move_uploaded_file($_FILES["PassportId"]["tmp_name"], $target_file9);
    if($DeansLetter!='')
      move_uploaded_file($_FILES["DeansLetter"]["tmp_name"], $target_file10);

    $sql="UPDATE `al_registration` SET  `cv`='$CV', `medical`='$Medical', `medicaldegreeCertificate`='$MedicaldegreeCertificate', `otherdegree`='$OtherDegree', `personalstatement`='$PersonalStatement', `personalphoto`='$PersonalPhoto', `englishLangugaetestscore`='$EnglishLangugaeTestScore', `preentryexamresult`='$PreentryexamResult', `emiratesid`='$EmiratesID', `passportid`='$PassportId',`deansletter`='$DeansLetter' WHERE `log_id`='$log_id'";

    if(mysqli_query($con,$sql)){
    echo "Your Files Have Been Uploaded - Please Enter Submit Button To Complete The Process";
      
    }else{
   $invalid="Error";
  }
