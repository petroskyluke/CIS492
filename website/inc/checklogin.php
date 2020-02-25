<?php
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
           require_once('db_connect.php');

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
				 $message ='<h3>Login Success, Welcome '.$_SESSION["username"].'</h3';
                 header("Location: ../admin/admin.php");
				  }
				else{
                    $message='<label>Wrong Password</label>';
                    header("Location: ../login.php?msg=Incorrect+password");
                    
				}
				}
				
				else{
                   $message = '<label>Wrong Username</label>'; 
                   header("Location: ../login.php?msg=Incorrect+username");
				}
		   }
		   
	 }	   
/*if(isset($_SESSION["username"]))  
	{  
    echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
    echo'<aside>
    <a href="../inc/logout.php"<p>Logout</p></a>
    <a href="changepassword.php"<p>Change Password</p></a>
    </aside>';
	}  
else  
	{
    echo'<p>Login incorrect.</p>';
    echo("<script>alert('Login Unsuccessful!')</script>");
    echo("<script>window.location = '../login.php';</script>");  
	}*/
?>