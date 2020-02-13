<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_ERROR);
	$dsn1='mysql:host=localhost;dbname=trade_winds';
	//$username1="root";
	//$password1="";
	$username1=filter_input(INPUT_POST,'employeeID');
	$password1=filter_input(INPUT_POST,'password');

	try{
		$db1=new PDO($dsn1, $username1, $password1);
		include('searchScreen.php');


	}
	catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "<p> Connection error! : $error_message </p>";
		echo"<p> ACCESS DENIED!</p>";
		echo "<p> $username1</p>";
	}

?>