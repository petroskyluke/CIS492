<?php
	$dsn1='mysql:host=localhost;dbname=dres_db';
	$username1='root';
	$password1='';


	try{
		$db1=new PDO($dsn1, $username1, $password1);

	}
	catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "<p> Connection error! : $error_message </p>";
	}

?>