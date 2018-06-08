<?php
include('session-handle.php');
if(!isset($_SESSION['userid']))
{
include('logout.php');
}
else if($_SESSION['userid']=="")
{
include('logout.php');
}

