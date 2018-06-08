<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];
$val=mysqli_real_escape_string($con,$_POST['filevalue']);
echo "SELECT * FROM `al_registration` WHERE (`cv`='$val' || `medical`='$val' || `medicaldegreecertificate`='$val' || `otherdegree`='$val' || `personalstatement`='$val' || `personalphoto`='$val' || `englishlangugaetestscore`='$val' || `preentryexamresult`='$val' || `emiratesid`='$val' || `passportid`='$val' || `deansletter`='$val')&& `log_id`='$log_id'";
exit;
$r=mysqli_query($con,"SELECT * FROM `al_registration` WHERE (`cv`='$val' || `medical`='$val' || `medicaldegreecertificate`='$val' || `otherdegree`='$val' || `personalstatement`='$val' || `personalphoto`='$val' || `englishlangugaetestscore`='$val' || `preentryexamresult`='$val' || `emiratesid`='$val' || `passportid`='$val' || `deansletter`='$val')&& `log_id`='$log_id'");
echo mysqli_num_rows($r);



        