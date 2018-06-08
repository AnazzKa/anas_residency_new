<?php
include 'connect.php';
if(isset($_REQUEST['id']) && isset($_REQUEST['ids']))
{
	$email_id=$_REQUEST['id'];
	$email_code=$_REQUEST['ids'];
	$result=mysqli_query($con,"SELECT * FROM `al_login` WHERE `email`='$email_id' AND `email_code`='$email_code'");
	if (mysqli_num_rows($result)==0)
	{
		echo "User Not Found";

	}
	else
	{
        mysqli_query($con,"UPDATE `al_login` SET status=1 WHERE `email`='$email_id' AND `email_code`='$email_code'");
		header('Location: email_verified.php'); 
	}
}