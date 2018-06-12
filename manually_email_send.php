<?php
$email='raqeebmohammad@yahoo.com';
$email_code='44024';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = 'residency@residency.aljalilachildrens.ae'; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set('SMTP', "smtp.mail.yahoo.com");
ini_set('smtp_port', "465");
        $to = 'anas@nextgbl.com';
        $subject = "Email Verification: Al Jalila Children's Paediatric Residency Programme";
        $message = '<html><body>';
        $message .= '<h4 style="color:#115E6E;">Thank you for registering for Al Jalila Residency programme. Please click the below link to verify your email address.</h4>';
        $message .= '<p><a href="http://residency.aljalilachildrens.ae/verify.php?id='.$email.'&ids='.$email_code.'">click here</a></p>'; 
        $message .= '</body></html>';
        

// Sending email
        if(mail($to, $subject, $message, $headers)){
echo "send";
        }