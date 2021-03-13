<?php
session_start();
include 'utility.php';
$Util = new Utility();

if($Util->check() == false) {
	header('location:login.php');
}
$n=$_SESSION['uid'];
$m=$_SESSION['uname'];
?>