<?php
session_start();
include('session-handle.php');
//include('ChkLogout.php');
include './connect.php';
if(isset($_SESSION['userid']))
{
  $log_id=$_SESSION['userid'];

 
if(isset($_POST['fld'])&& isset($_POST['text']))
{
	$fld=mysqli_real_escape_string($con,$_POST['fld']);
	$text=mysqli_real_escape_string($con,$_POST['text']);
	$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id'");
	if(mysqli_num_rows($re)>0)
	{
		$res="UPDATE `al_registration` SET `$fld`='$text'  WHERE `log_id`='$log_id'";
		if(mysqli_query($con,$res))
			echo "update";
		else
			echo 'error';
	}
	else{
		echo "inner f if";
		$current_date = date('Y/m/d H:i:s');
		$email=$_SESSION['email'];
		$re=mysqli_query($con,"INSERT INTO `al_registration`( `log_id`,`$fld`,`entry_date`,`gender`,`email`) VALUES ('$log_id','$text','$current_date','Male','$email')");
	}
}else{
	echo "outer if";
}
}
else{
 	echo "out";
}
