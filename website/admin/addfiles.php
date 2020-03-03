<?php
require('../inc/db_connect.php');



//fetch the text box values

$myfile = filter_input(INPUT_GET, 'myfile');



//check for unique index validation
        $queryCheckEmail = 'SELECT COUNT(*) FROM customers 
	                      WHERE emailAddress =:email';
		$stmt = $db1->prepare( $queryCheckEmail);
		$stmt->bindValue(':email', $email);
        $stmt->execute();
        $countEmail = $stmt->fetchColumn();

//Validate values
if ($fName == null || $lName == null || $company == null ||
    $email == null || $password ==null || $line1 == null ||
    $city == null || $state == null||  $zipCode == null || $phone== null ) {
    $error = "Invalid  data. Check all fields and try again.";
    echo $error;
     include('addCustomerForm.php');	
}
	
else if ($countEmail>0) { 
	echo "Please provide a unique email Address. This address exists";
    include('addCustomerForm.php');
}
	
	//Insert new customer , new Address, update customer
else {	  
    
	// Add the product to the database  
	$queryInsertCustomer = 'INSERT INTO customers
	   					 (company, emailAddress, password, firstName, lastName)
						  VALUES
						 (:company, :email, :password, :fName , :lName)';
		$statement2 = $db1->prepare($queryInsertCustomer);
		
		$statement2->bindValue(':company', $company);
		$statement2->bindValue(':email', $email);
		$statement2->bindValue(':password', $password);
		$statement2->bindValue(':fName', $fName);
		$statement2->bindValue(':lName', $lName);
	    $statement2->execute();
        $lastCust = $db1->lastInsertId();
		$statement2->closeCursor();


		// Add the ship address to the address table 
		$queryInsertAddress = 'INSERT INTO addresses
					 (customerID, line1, line2, city, state, zipCode, phone)
				  VALUES
					 (:customerID, :line1, :line2, :city, :state, :zipCode, :phone)';
		$statement3 = $db1->prepare($queryInsertAddress);
		
		$statement3->bindValue(':customerID', $lastCust);
		$statement3->bindValue(':line1', $line1);
		$statement3->bindValue(':line2', $line2);
		$statement3->bindValue(':city', $city);
		$statement3->bindValue(':state', $state);
		$statement3->bindValue(':zipCode', $zipCode);
		$statement3->bindValue(':phone', $phone);
		$statement3->execute();
		$statement3->closeCursor();
		
		include('viewCustomers.php');
		
}



		
?>
