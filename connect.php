<?php
// $con = mysqli_connect("localhost","demobwc_recidenc","&(3zBUuYFi#X","demobwc_aljalia_recidency_registration") or die("Connection error") ;//server
//$con = mysqli_connect("localhost","demobwc_work","Crg]!IW*eiwy","demobwc_work") or die("Connection error") ;//server
//$con = mysqli_connect("localhost","ajch_residency","ajchdxb@18","ajch_residency") or die("Connection error") ;//local
$con = mysqli_connect("localhost","root","","aljalia_recidency") or die("Connection error") ;//local
if(mysqli_connect_errno())
{
	echo "Failed to connect the database ". mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");

?>