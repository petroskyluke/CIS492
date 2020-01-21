<?php
require_once('inc/db_connect.php');
session_start(); 

if(!isset($username)){
$username = filter_input(INPUT_POST,'username');
}

if(!isset($password)){
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
				$query = 'SELECT emailAddress, password
						  FROM employees
						  WHERE emailAddress =:emailAddress';
				$statement = $db1->prepare($query);
				$statement->bindValue(':emailAddress', $username);
			    $statement->execute();
				$login= $statement->fetch();
				$count = $statement->rowCount();
				$statement->closeCursor();
				
				if($count > 0){
                 
				 $validPassword = password_verify($password , $login['password']);
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

?>


<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
	<title>Welcome Screen</title>
	<link rel="stylesheet" href="css/main.css">
</head>

<!-- the body section -->
<body>
<header</header>
<main>
<h1 align ="center">Welcome to Trade Winds!</h1>
<h2 align="center">Please Sign In</h2>
<p></p>
<nav align="center">

<?php if(isset($message)){
	echo '<label class="text-danger">'.$message.'</label>';
}
?>

<form method="post">
<label>Username</label>
<input type="text" name="username"/>
<br/>
<label>Password</label>
<input type="password" name="password"/>
<br/>
<input type="submit" name="login" value="Login"/>
</form>

<nav>


</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
</footer>
</body>

</html>