<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
if(isset($_SESSION['userid']))
{
  $log_id=$_SESSION['userid'];

  if(isset($_FILES['CV']['name'])){
    $CV = mysqli_real_escape_string($con,$_FILES['CV']['name']);
    $CVn = $_FILES['CV']['name'];
}
else
    $CV='';

if(isset($_FILES['Medical']['name'])){
    $Medical = mysqli_real_escape_string($con,$_FILES['Medical']['name']);
    $Medicaln = $_FILES['Medical']['name'];
}
else
    $Medical='';

if(isset($_FILES['MedicaldegreeCertificate']['name'])){
    $MedicaldegreeCertificate = mysqli_real_escape_string($con,$_FILES['MedicaldegreeCertificate']['name']);
    $MedicaldegreeCertificaten = $_FILES['MedicaldegreeCertificate']['name'];
}
else
    $MedicaldegreeCertificate='';

if(isset($_FILES['OtherDegree']['name'])){
    $OtherDegree = mysqli_real_escape_string($con,$_FILES['OtherDegree']['name']);
    $OtherDegreen = $_FILES['OtherDegree']['name'];
}
else
    $OtherDegree='';

if(isset($_FILES['PersonalStatement']['name'])){
    $PersonalStatement = mysqli_real_escape_string($con,$_FILES['PersonalStatement']['name']);
    $PersonalStatementn = $_FILES['PersonalStatement']['name'];
}
else
    $PersonalStatement='';

if(isset($_FILES['PersonalPhoto']['name'])){
    $PersonalPhoto = mysqli_real_escape_string($con,$_FILES['PersonalPhoto']['name']);
    $PersonalPhoton = $_FILES['PersonalPhoto']['name'];
}
else
    $PersonalPhoto='';

if(isset($_FILES['EnglishLangugaeTestScore']['name'])){
    $EnglishLangugaeTestScore = mysqli_real_escape_string($con,$_FILES['EnglishLangugaeTestScore']['name']);
    $EnglishLangugaeTestScoren = $_FILES['EnglishLangugaeTestScore']['name'];
}
else
    $EnglishLangugaeTestScore='';

if(isset($_FILES['PreentryexamResult']['name'])){
    $PreentryexamResult = mysqli_real_escape_string($con,$_FILES['PreentryexamResult']['name']);
    $PreentryexamResultn = $_FILES['PreentryexamResult']['name'];
}
else
    $PreentryexamResult='';

if(isset($_FILES['EmiratesID']['name'])){
    $EmiratesID = mysqli_real_escape_string($con,$_FILES['EmiratesID']['name']);
    $EmiratesIDn = $_FILES['EmiratesID']['name'];
}
else
    $EmiratesID='';
if(isset($_FILES['PassportId']['name'])){
    $PassportId = mysqli_real_escape_string($con,$_FILES['PassportId']['name']);
    $PassportIdn = $_FILES['PassportId']['name'];
}
else
    $PassportId='';

if(isset($_FILES['DeansLetter']['name'])){
    $DeansLetter = mysqli_real_escape_string($con,$_FILES['DeansLetter']['name']);
    $DeansLettern = $_FILES['DeansLetter']['name'];
}
else
    $DeansLetter='';

$sq=mysqli_query($con,"SELECT `directory_name` FROM `al_registration` WHERE `log_id`=$log_id");
$lklk=mysqli_fetch_object($sq);
if($lklk->directory_name!='')
    $dirname=$lklk->directory_name;
else{
    $company=$_SESSION['username'].rand(1000,99999);
// $dirname = "D:/xamp/htdocs/residency_new/uploads/".$company;
    $dirname = "uploads/".$company;
    if (!file_exists($dirname)) {
        mkdir($dirname);
        mysqli_query($con,"UPDATE `al_registration` SET `directory_name`='$dirname' WHERE `log_id`=$log_id");
    }
}

$target_dir = $dirname."/";

$sql="UPDATE `al_registration` SET  `status`=0 ";
if($CV!=''){
    $target_file = $target_dir .basename($CVn);
    if (file_exists($target_dir.$CVn)) {       
            // file already exists error
            $expld=explode('.', $CVn);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(0,9).').'.$ext;
            if(move_uploaded_file($_FILES["CV"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`cv`='$newfilename'";                
        } else {        
            if(move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file))
            $sql.=",`cv`='$CV'";        
        }
}
if($Medical!=''){
    $target_file1 = $target_dir . basename($Medicaln);
    if (file_exists($target_dir.$Medicaln)) {       
            // file already exists error
            $expld=explode('.', $Medicaln);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(10,19).').'.$ext;
            if(move_uploaded_file($_FILES["Medical"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`medical`='$newfilename'";                
        } else { 
         if(move_uploaded_file($_FILES["Medical"]["tmp_name"], $target_file1))
         $sql.=", `medical`='$Medical'";
        }
}
if($MedicaldegreeCertificate!=''){
   $target_file2 = $target_dir . basename($MedicaldegreeCertificaten);
   if (file_exists($target_dir.$MedicaldegreeCertificaten)) {       
            // file already exists error
            $expld=explode('.', $MedicaldegreeCertificaten);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(20,29).').'.$ext;
            if(move_uploaded_file($_FILES["MedicaldegreeCertificate"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`medicaldegreeCertificate`='$newfilename'";                
        } else { 
   if(move_uploaded_file($_FILES["MedicaldegreeCertificate"]["tmp_name"], $target_file2))
   $sql.=", `medicaldegreeCertificate`='$MedicaldegreeCertificate'";
 }
}
if($OtherDegree!=''){
    $target_file3 = $target_dir . basename($OtherDegreen);
    if (file_exists($target_dir.$OtherDegreen)) {       
            // file already exists error
            $expld=explode('.', $OtherDegreen);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(30,39).').'.$ext;
            if(move_uploaded_file($_FILES["OtherDegree"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`otherdegree`='$newfilename'";                
        } else { 
    if(move_uploaded_file($_FILES["OtherDegree"]["tmp_name"], $target_file3))
    $sql.=", `otherdegree`='$OtherDegree'";
}
}
if($PersonalStatement!=''){
    $target_file4 = $target_dir . basename($PersonalStatementn);
    if (file_exists($target_dir.$PersonalStatementn)) {       
            // file already exists error
            $expld=explode('.', $PersonalStatementn);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(40,49).').'.$ext;
            if(move_uploaded_file($_FILES["PersonalStatement"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`personalstatement`='$newfilename'";                
        } else { 
    if(move_uploaded_file($_FILES["PersonalStatement"]["tmp_name"], $target_file4))
    $sql.=", `personalstatement`='$PersonalStatement'";
}
}
if($PersonalPhoto!=''){
    $target_file5 = $target_dir . basename($PersonalPhoton);
    if (file_exists($target_dir.$PersonalPhoton)) {       
            // file already exists error
            $expld=explode('.', $PersonalPhoton);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(50,59).').'.$ext;
            if(move_uploaded_file($_FILES["PersonalPhoto"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`personalphoto`='$newfilename'";                
        } else { 
    if(move_uploaded_file($_FILES["PersonalPhoto"]["tmp_name"], $target_file5))
    $sql.=", `personalphoto`='$PersonalPhoto'";
}
}
if($EnglishLangugaeTestScore!=''){
    $target_file6 = $target_dir . basename($EnglishLangugaeTestScoren);
    if (file_exists($target_dir.$EnglishLangugaeTestScoren)) {       
            // file already exists error
            $expld=explode('.', $EnglishLangugaeTestScoren);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(60,69).').'.$ext;
            if(move_uploaded_file($_FILES["EnglishLangugaeTestScore"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`englishLangugaetestscore`='$newfilename'";                
        } else {
    if(move_uploaded_file($_FILES["EnglishLangugaeTestScore"]["tmp_name"], $target_file6))
    $sql.=", `englishLangugaetestscore`='$EnglishLangugaeTestScore'";
}
}
if($PreentryexamResult!=''){
    $target_file7 = $target_dir . basename($PreentryexamResultn);
    if (file_exists($target_dir.$PreentryexamResultn)) {       
            // file already exists error
            $expld=explode('.', $PreentryexamResultn);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(70,79).').'.$ext;
            if(move_uploaded_file($_FILES["PreentryexamResult"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`preentryexamresult`='$newfilename'";                
        } else {
    if(move_uploaded_file($_FILES["PreentryexamResult"]["tmp_name"], $target_file7))
    $sql.=", `preentryexamresult`='$PreentryexamResult'";
}
}
if($EmiratesID!=''){
    $target_file8 = $target_dir . basename($EmiratesIDn);
    if (file_exists($target_dir.$EmiratesIDn)) {       
            // file already exists error
            $expld=explode('.', $EmiratesIDn);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(80,89).').'.$ext;
            if(move_uploaded_file($_FILES["EmiratesID"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`emiratesid`='$newfilename'";                
        } else {
    if(move_uploaded_file($_FILES["EmiratesID"]["tmp_name"], $target_file8))
    $sql.=", `emiratesid`='$EmiratesID'";
}
}
if($PassportId!=''){
    $target_file9 = $target_dir . basename($PassportIdn);
    if (file_exists($target_dir.$PassportIdn)) {       
            // file already exists error
            $expld=explode('.', $PassportIdn);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(90,99).').'.$ext;
            if(move_uploaded_file($_FILES["PassportId"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`passportid`='$newfilename'";                
        } else {
    if(move_uploaded_file($_FILES["PassportId"]["tmp_name"], $target_file9))
    $sql.=", `passportid`='$PassportId'";
}
}
if($DeansLetter!='') {
   $target_file10 = $target_dir . basename($DeansLettern);
   if (file_exists($target_dir.$DeansLettern)) {       
            // file already exists error
            $expld=explode('.', $DeansLettern);
            $ext=end($expld);
            array_pop($expld);
            $newfilename='';
            foreach ($expld as $key)
            $newfilename.= $key;
            $newfilename.='('.rand(100,109).').'.$ext;
            if(move_uploaded_file($_FILES["DeansLetter"]["tmp_name"], $target_dir.$newfilename))
            $sql.=",`deansletter`='$newfilename'";                
        } else {
   if(move_uploaded_file($_FILES["DeansLetter"]["tmp_name"], $target_file10))
   $sql.=",`deansletter`='$DeansLetter'";
}
}

$sql.=" WHERE `log_id`='$log_id'";

if(mysqli_query($con,$sql)){

}else{
    $invalid="Error";
}
}else{
    echo "out";
}