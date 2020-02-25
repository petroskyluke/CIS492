<?php
session_start(); 

if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}



//fetch inputs
$username=($_SESSION["username"]);
$newPassword=filter_input(INPUT_POST, 'newPassword');
$confirmPassword=filter_input(INPUT_POST,'confirmPassword');

//validate inputs
if ($newPassword === null || $confirmPassword === null) {
    $error = "Invalid product data. Check all fields and try again.";
    echo $error;
}
else if($newPassword != $confirmPassword){
    $error = "Passwords do not match. Please enter them and try again.";
    echo $error;
}

else {
    $newPassword=password_hash($newPassword,PASSWORD_DEFAULT);
    require_once('../inc/db_connect.php');

	 $updatePassword = 'UPDATE login
                        SET password_ = :newPassword
				        WHERE username =:username';
				 
    $statement = $db1->prepare($updatePassword);
    $statement->bindValue(':newPassword', $newPassword);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
   
    // Display the Product List page
     session_destroy();
     echo("<script>alert('Password change successful!')</script>");
     echo("<script>window.location = '../login.php';</script>");
     //include("../login.php");
     //header("location:../login.php");
}	
?>