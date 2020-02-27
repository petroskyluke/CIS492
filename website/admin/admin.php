<?php
//BEGIN USER VERIFICATION
//BEGIN SESSION CODE
//get current time
$time = $_SERVER['REQUEST_TIME'];
//set the amount of time a session should live
$timeout_duration = 60;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }

        .mySlides img {
            width: auto;
            height: 800px;
            max-height: 800px;
        }
    </style>
</head>

<body>

    <!-- Page content -->
    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="#" class="w3-bar-item w3-button">Services</a>
        <a href="editportfolio.php" class="w3-bar-item w3-button">Portfolio</a>
        <a href="#" class="w3-bar-item w3-button">Reporting</a>
        <a href="../inc/logout.php" class="w3-bar-item w3-button">Logout</a>
        <a href="changepassword.php" class="w3-bar-item w3-button">Change Password</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">

        <div class="w3-container w3-teal">
            <h1>My Page</h1>
        </div>

        <img src="img_car.jpg" alt="Car" style="width:100%">

        <div class="w3-container">
            <h2>Sidebar Navigation Example</h2>
            <p>The sidebar with is set with "style="width:25%".</p>
            <p>The left margin of the page content is set to the same value.</p>
        </div>

    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge"></footer>

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

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
