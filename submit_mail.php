<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];
$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id'");
$rt=mysqli_query($con,"SELECT COUNT(*)AS 'cnt' FROM `al_registration` WHERE `status`=1");
if(mysqli_num_rows($re)>0)
{
  $result=mysqli_fetch_object($re);
  
  
  if($result->first_name==''|| $result->last_name==''|| $result->nationality==''|| $result->passport_no==''|| $result->marital_status==''|| $result->email==''|| $result->gender==''|| $result->place_of_birth==''|| $result->date_of_birth==''|| $result->mobile_no==''|| $result->final_grade==''|| $result->university_name==''|| $result->enter_mark==''|| $result->graduation_year==''|| $result->medical_degree==''|| $result->pre_entry_exam==''|| $result->enter_score==''|| $result->english_langauge_proficiency==''|| $result->enter_marks==''|| $result->middle_name=='' || $result->cv=='' || $result->medical=='' ||$result->medicaldegreecertificate=='' || $result->personalstatement=='' || $result->personalphoto=='' ||$result->englishlangugaetestscore=='' || $result->preentryexamresult=='' || $result->emiratesid=='' || $result->passportid=='' || $result->deansletter=='')
  {
    header('Location: application_form.php');
  }
  else
  {
    if(file_exists($result->directory_name.'/'.$result->cv))
      {
        $_SESSION['cv_flg']=1;
      }
      else
        {
          $_SESSION['cv_flg']=0;
        }
    if(file_exists($result->directory_name.'/'.$result->medical))
     {
        $_SESSION['med_flg']=1;
      }
      else
        {
          $_SESSION['med_flg']=0;
        } 
    if(file_exists($result->directory_name.'/'.$result->medicaldegreecertificate)) 
       {
        $_SESSION['deg_flg']=1;
      }
      else
        {
          $_SESSION['deg_flg']=0;
        }
    if(file_exists($result->directory_name.'/'.$result->personalstatement)) 
       {
        $_SESSION['sta_flg']=1;
      }
      else
        {
          $_SESSION['sta_flg']=0;
        }
    if( file_exists($result->directory_name.'/'.$result->personalphoto))
       {
        $_SESSION['per_flg']=1;
      }
      else
        {
          $_SESSION['per_flg']=0;
        }
    if( file_exists($result->directory_name.'/'.$result->englishlangugaetestscore)) 
     {
        $_SESSION['eng_flg']=1;
      }
      else
        {
          $_SESSION['eng_flg']=0;
        } 
    if( file_exists($result->directory_name.'/'.$result->preentryexamresult))  
       {
        $_SESSION['pre_flg']=1;
      }
      else
        {
          $_SESSION['pre_flg']=0;
        }
    if(file_exists($result->directory_name.'/'.$result->emiratesid)) 
     {
        $_SESSION['emi_flg']=1;
      }
      else
        {
          $_SESSION['emi_flg']=0;
        } 
    if(file_exists($result->directory_name.'/'.$result->passportid)) 
     {
        $_SESSION['pas_flg']=1;
      }
      else
        {
          $_SESSION['pas_flg']=0;
        } 
    if(file_exists($result->directory_name.'/'.$result->deansletter))
       {
        $_SESSION['dea_flg']=1;
      }
      else
        {
          $_SESSION['dea_flg']=0;
        }

    if($_SESSION['cv_flg']==1 && 
      $_SESSION['med_flg']==1 && 
      $_SESSION['deg_flg']==1 && 
      $_SESSION['sta_flg']==1 && 
      $_SESSION['per_flg']==1 && 
      $_SESSION['eng_flg']==1 && 
      $_SESSION['pre_flg']==1 && 
      $_SESSION['emi_flg']==1 && 
      $_SESSION['pas_flg']==1 && 
      $_SESSION['dea_flg']==1 )
    {
      $refd=mysqli_fetch_object($rt);
    $email=$result->email;
    $first_name=$result->first_name;
    $middle_name=$result->middle_name;
    $last_name=$result->last_name;
    $email=$result->email;
    $date_of_birth=$result->date_of_birth;
    $L=explode("-", $date_of_birth);
    $mobile_no=$result->mobile_no;
    $refernce_no="AJCHPRP-";
    $refernce_no.=date("Y");
    $refernce_no.="/";
    $refernce_no.=$last_name;
    $refernce_no.="-";
    $refernce_no.=$L[0];
    $date_submission=date('Y/m/d H:i:s');

    $sql="UPDATE `al_registration` SET `status`=1,`reference_no`='$refernce_no',`date_submission`='$date_submission' WHERE `log_id`='$log_id'";
    if(mysqli_query($con,$sql)){
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $from = 'noreply@residency.aljalilachildrens.ae';
     // Create email headers
      $headers .= 'From: '.$from."\r\n".
      'Reply-To: '.$from."\r\n" .
      'X-Mailer: PHP/' . phpversion();
      ini_set('SMTP', "relay-hosting.secureserver.net");
      ini_set('smtp_port', "25");

      $to = $email;
      $subject = "Application Submitted: Al Jalila Children's Paediatric Residency Programme";
      $message = '<html><body>';
      $message .= '<h4 style="color:#000">Congratulations! Your application is on its way. Successful applicants will be contacted in due time. If you have questions in the meantime, please email us on residency@ajch.ae </h4>';
      $message .= '</body></html>';


      $messagenew = '<html><body>';
      $messagenew .='
      <div style="background:#f2f2f2; padding:30px; font-family:calibri; font-size:12px; color:#666666; padding-top:60px">
      <div style="width:600px; margin:0 auto; background:#fff;  padding:20px; position:relative; border-radius:10px;">
      <div style="position:absolute; left: 240px; top: -50px;"><a href="#" style="color:#666; font-size:32px; text-decoration:none; font-family:tahoma">Successful Form Submission -- Al Jalila Children\'s Residency Programme</a></div>
      <div style="padding-top:20px; padding-bottom:20px">
      <div style="padding-bottom:15px; border-top:dashed 1px #e5e5e5; padding-top:20px;">
      <div style="float:left; width:160px">Full Name</div>
      <div style="float:left; width:400px; color:#999">'.$first_name.' '.$middle_name.' '.$last_name.'</div>
      <br clear="all">
      </div>
      <div style="padding-bottom:15px;">
      <div style="float:left; width:160px">Mobile</div>
      <div style="float:left; width:400px; color:#999">'.$mobile_no.'</div>
      <br clear="all" />
      </div>
      <div style="padding-bottom:15px;">
      <div style="float:left; width:160px">Email</div>
      <div style="float:left; width:400px; color:#999">'.$email.'</div>
      <br clear="all" />
      </div>
      <div style="padding-bottom:15px;">
      <div style="float:left; width:160px">DOB</div>
      <div style="float:left; width:400px; color:#999">'.$date_of_birth.'</div>
      <br clear="all" />
      </div>

      </div>
      </div>
      </div>
      ';
      $messagenew .= '</body></html>';
      if(mail($to, $subject, $message, $headers)){
        if(mail('residency@ajch.ae','Successful Form Submission',$messagenew,$headers))
          $invalid = "Registration Complted Please Login ";
      } else{
       $invalid= 'Unable to send email. Please try again.';
     }
     header('Location: success.php?s');
     echo "<script>window.location('success.php')</script>";exit;

   }
    

    }
    else{
     header('Location: application_form_2.php?er');
    }
    

 }


}