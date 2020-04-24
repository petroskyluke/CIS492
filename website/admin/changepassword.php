<?php
include '../inc/session.php';
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

                    <div class="container">
                        <button type="button" class="cancelbtn" onClick="javascript:history.go(-1)">Cancel</button>
                    </div>
                </form>
				</div>
        </div>
	</div>

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
