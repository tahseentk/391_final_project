<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location:homepage_of_user.php");
ob_end_flush(); 
include 'homepage_of_user.php';
//include 'homepage_of_user.php';
exit();
?>