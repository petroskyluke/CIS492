<?php

require('../inc/db_connect.php');



//fetch the text box values

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$password = password_hash($password, PASSWORD_DEFAULT);
$fName = filter_input(INPUT_POST, 'fName');
$lName = filter_input(INPUT_POST, 'lName');
$company= filter_input(INPUT_POST, 'company'); 
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zipCode = filter_input(INPUT_POST, 'zipCode');
$phone = filter_input(INPUT_POST, 'phone');




//check for unique index validation
        $queryCheckEmail = 'SELECT COUNT(*) FROM suppliers 
	                      WHERE emailAddress =:email';
		$stmt = $db1->prepare( $queryCheckEmail);
		$stmt->bindValue(':email', $email);
        $stmt->execute();
        $countEmail = $stmt->fetchColumn();

//Validate values
if ($fName == null || $lName == null || $company == null ||
    $email == null || $password ==null || $address == null ||
    $city == null || $state == null||  $zipCode == null || $phone== null ) {
    $error = "Invalid  data. Check all fields and try again.";
    echo $error;
    include('addSupplierForm.php');	
}
	
else if ($countEmail>0) { 
	echo "Please provide a unique email Address. This address exists";
    include('addSupplierForm.php');
}
	
	//Insert new supplier
else {	  
    
	// Add the product to the database  
	$queryInsertSupplier = 'INSERT INTO suppliers
	   					 (company, firstName, lastName, emailAddress, password, phoneNumber, address, city, state, zipCode)
						  VALUES
						 (:company, :fName, :lName, :email, :password, :phone, :address, :city, :state, :zipCode)';
		$statement2 = $db1->prepare($queryInsertSupplier);
		
		$statement2->bindValue(':company', $company);
		$statement2->bindValue(':fName', $fName);
		$statement2->bindValue(':lName', $lName);
		$statement2->bindValue(':email', $email);
		$statement2->bindValue(':password', $password);
		$statement2->bindValue(':phone', $phone);
		$statement2->bindValue(':address', $address);
		$statement2->bindValue(':city', $city);
		$statement2->bindValue(':state', $state);
		$statement2->bindValue(':zipCode', $zipCode);
	    $statement2->execute();
		$statement2->closeCursor();


		
		include('viewSuppliers.php');
		
}



		
?>
