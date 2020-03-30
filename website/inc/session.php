<?php
//BEGIN USER VERIFICATION
//BEGIN SESSION CODE
//get current time
$time = $_SERVER['REQUEST_TIME'];
//set the amount of time a session should live
$timeout_duration = 600;
//set parameters for session cookie storage
ini_set('session.gc_maxlifetime', $timeout_duration);
ini_set('session.cookie_lifetime', $timeout_duration);
session_start();
if(isset($_SESSION['LAST_ACTIVITY']) && 
	(($_SESSION['LAST_ACTIVITY'] + $timeout_duration) < $time))
{
	session_unset();
    session_destroy();
    session_start(); 
}
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
  }

$_SESSION['LAST_ACTIVITY'] = $time;
//END SESSION CODE
if(!isset($_SESSION["username"]))  
{  
	header("location:../login.php?msg=You+have+been+logged+out+due+to+inactivity");  
}
//END USER VERIFICATION
?>