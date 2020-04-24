<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yencik Photography</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/login.css">
	<style>
		body {
			font-family: "Lato", sans-serif
		}
</style>
</head>

<body>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">YENCIK PHOTOGRAPHY</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">LOG IN</a>
            <a href="index.php#contact" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">CONTACT</a>
            <a href="index.php#about" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">ABOUT</a>
            <a href="index.php#portfolio" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">PORTFOLIO</a>
            <a href="index.php#services" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">SERVICES</a>

        </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="index.php#services" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SERVICES</a>
        <a href="index.php#portfolio" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PORTFOLIO</a>
        <a href="index.php#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ABOUT</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">LOG IN</a>
    </div>

    

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px; margin-top:46px">

    </br>
	
        <div class="w3-container">
				<div class="w3-container center">
                <?php
                if(!isset($msg)){$msg = filter_input(INPUT_GET,'msg');}
                if(isset($msg)){echo $msg;}
                ?>
                <form action="inc/checklogin.php" method="post">
                <h2 class="w3-center">Admin Login</h2>

                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                        <input type="submit" name="login" value="Login"/>
                    </div>
                </form>
                <form> 
                    <div class="container"> 
                        <button type="submit" class="cancelbtn" formaction="index.php">Cancel</button> 
                    </div> 
                </form> 
				</div>
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

        </script>
</body>
</html>
