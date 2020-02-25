<?php
//BEGIN SESSION CODE
//get current time
$time = $_SERVER['REQUEST_TIME'];
//set the amount of time a session should live
$timeout_duration = 20;
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
    $_SESSION['msg'] = 'YOU HAVE BEEN LOGGED OUT DUE TO INACTIVITY';
}
$_SESSION['LAST_ACTIVITY'] = $time;
//END SESSION CODE
session_start(); 

if(!isset($_SESSION["username"]))  
{  
	header("location:../login.php?msg=You+have+been+logged+out+due+to+inactivity");  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yencik Photography</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/login.css">
	<style>
		body {
			font-family: "Lato", sans-serif
		}
</style>
</head>

<body>

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px; margin-top:5px">
	
        <div class="w3-container">
				<div class="w3-container center" m>
                <form action="updatepassword.php" method="post">

                    <div class="container">
                        <label for="password"><b>New Password</b></label>
                        <input type="password" placeholder="Enter New Password" name="newPassword" required>

                        <label for="password"><b>Confirm Password</b></label>
                        <input type="password" placeholder="Confirm Password" name="confirmPassword" required>

                        <input type="submit" name="changePassword" value="Change Password"/>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="cancelbtn">Cancel</button>
                    </div>
                </form>
				</div>
        </div>
	</div>
        
        <!-- Footer 
        <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge"></footer>-->

        <script>
            // Used to toggle the menu on small screens when clicking on the menu button
            function myFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

        </script>
</body>
</html>
