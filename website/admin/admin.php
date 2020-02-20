<?php
require_once('../inc/db_connect.php');
session_start();

if(!isset($username))
	{
	$username = filter_input(INPUT_POST,'username');
	}

if(!isset($password))
	{
	$password = filter_input(INPUT_POST,'password');
	}

$login = filter_input(INPUT_POST, 'login');

if(isset($login))  
      {  
           if(empty($username) || empty($password))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
		   
		   else
		   {
		     // Get the userName and passWord
				$query = 'SELECT username, password_
						  FROM login
						  WHERE username =:username';
				$statement = $db1->prepare($query);
				$statement->bindValue(':username', $username);
			    $statement->execute();
				$login= $statement->fetch();
				$count = $statement->rowCount();
				$statement->closeCursor();
				
				if($count > 0){
                 
				 $validPassword = password_verify($password , $login['password_']);
				 if($validPassword){
				 $_SESSION["username"] = $username;
			      header("location:inc/searchScreen.php");
				  }
				else{
					$message='<label>Wrong Password</label>';
				}
				}
				
				else{
				   $message = '<label>Wrong Data</label>'; 
				}
		   }
		   
	 }	   
if(isset($_SESSION["username"]))  
	{  
	echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
	}  
else  
	{
	header("location:../login.php");  
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
        <a href="#" class="w3-bar-item w3-button">Portfolio</a>
        <a href="#" class="w3-bar-item w3-button">Reporting</a>
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
