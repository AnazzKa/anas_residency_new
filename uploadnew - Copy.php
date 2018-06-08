<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];

if(isset($_FILES['CV']['name']))
$CV = $_FILES['CV']['name'];
else
    $CV='';

if(isset($_FILES['Medical']['name']))
$Medical = $_FILES['Medical']['name'];
else
    $Medical='';

if(isset($_FILES['MedicaldegreeCertificate']['name']))
$MedicaldegreeCertificate = $_FILES['MedicaldegreeCertificate']['name'];
else
    $MedicaldegreeCertificate='';

if(isset($_FILES['OtherDegree']['name']))
$OtherDegree = $_FILES['OtherDegree']['name'];
else
    $OtherDegree='';

if(isset($_FILES['PersonalStatement']['name']))
$PersonalStatement = $_FILES['PersonalStatement']['name'];
else
    $PersonalStatement='';

if(isset($_FILES['PersonalPhoto']['name']))
$PersonalPhoto = $_FILES['PersonalPhoto']['name'];
else
    $PersonalPhoto='';

if(isset($_FILES['EnglishLangugaeTestScore']['name']))
$EnglishLangugaeTestScore = $_FILES['EnglishLangugaeTestScore']['name'];
else
    $EnglishLangugaeTestScore='';

if(isset($_FILES['PreentryexamResult']['name']))
$PreentryexamResult = $_FILES['PreentryexamResult']['name'];
else
    $PreentryexamResult='';

if(isset($_FILES['EmiratesID']['name']))
$EmiratesID = $_FILES['EmiratesID']['name'];
else
    $EmiratesID='';
if(isset($_FILES['PassportId']['name']))
$PassportId = $_FILES['PassportId']['name'];
else
    $PassportId='';

if(isset($_FILES['DeansLetter']['name']))
$DeansLetter = $_FILES['DeansLetter']['name'];
else
    $DeansLetter='';



$sql="UPDATE `al_registration` SET  `status`=0 ";
if($CV!=''){
        $temp = explode(".", $CV);
        $extension = end($temp);
        $temp_name = $_FILES["CV"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=",`cv`='$imagename'";
}
    if($Medical!=''){
        $temp = explode(".", $Medical);
        $extension = end($temp);
        $temp_name = $_FILES["Medical"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `medical`='$imagename'";
}
    if($MedicaldegreeCertificate!=''){
        $temp = explode(".", $MedicaldegreeCertificate);
        $extension = end($temp);
        $temp_name = $_FILES["MedicaldegreeCertificate"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `medicaldegreeCertificate`='$imagename'";
}
    if($OtherDegree!=''){
        $temp = explode(".", $OtherDegree);
        $extension = end($temp);
        $temp_name = $_FILES["OtherDegree"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `otherdegree`='$imagename'";
}
    if($PersonalStatement!=''){
        $temp = explode(".", $PersonalStatement);
        $extension = end($temp);
        $temp_name = $_FILES["PersonalStatement"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `personalstatement`='$imagename'";
}
    if($PersonalPhoto!=''){
        $temp = explode(".", $PersonalPhoto);
        $extension = end($temp);
        $temp_name = $_FILES["PersonalPhoto"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `personalphoto`='$imagename'";
}
    if($EnglishLangugaeTestScore!=''){
        $temp = explode(".", $EnglishLangugaeTestScore);
        $extension = end($temp);
        $temp_name = $_FILES["EnglishLangugaeTestScore"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `englishLangugaetestscore`='$imagename'";
}
    if($PreentryexamResult!=''){
        $temp = explode(".", $PreentryexamResult);
        $extension = end($temp);
        $temp_name = $_FILES["PreentryexamResult"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `preentryexamresult`='$imagename'";
}
    if($EmiratesID!=''){
        $temp = explode(".", $EmiratesID);
        $extension = end($temp);
        $temp_name = $_FILES["EmiratesID"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `emiratesid`='$imagename'";
}
    if($PassportId!=''){
        $temp = explode(".", $PassportId);
        $extension = end($temp);
        $temp_name = $_FILES["PassportId"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=", `passportid`='$imagename'";
}
if($DeansLetter!='') {
    $temp = explode(".", $DeansLetter);
        $extension = end($temp);
        $temp_name = $_FILES["DeansLetter"]["tmp_name"];
        $imagename = date("d-m-Y") . "-" . time() . "." . $extension;
            $target_path = "uploads/" . $imagename;
    move_uploaded_file($temp_name, $target_path);
    $sql.=",`deansletter`='$imagename'";
}

$sql.=" WHERE `log_id`='$log_id'";

if(mysqli_query($con,$sql)){

}else{
    $invalid="Error";
}
