<?php

require './PhpMailer/class.phpmailer.php';
try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled
	$body             = file_get_contents('contactusmailbody.php');
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "smtp.yahoo.com"; // SMTP server
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPDebug = 4;
	//$mail->Username   = "name@domain.com";     // SMTP server username
	//$mail->Password   = "password";            // SMTP server password
	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("name@domain.com","First Last");
	$mail->From       = "name@domain.com";
	$mail->FromName   = "First Last";
	$to = "anaska582@hotmail.com";
	$mail->AddAddress($to);
	$mail->Subject  = "First PHPMailer Message";
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>