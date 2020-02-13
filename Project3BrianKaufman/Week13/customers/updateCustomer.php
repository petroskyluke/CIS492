<?php


//fetch inputs
$custCompany= filter_input(INPUT_POST, 'custCompany');
$custEmail = filter_input(INPUT_POST, 'custEmail');
$custFirstName = filter_input(INPUT_POST, 'custFirstName');
$custLastName = filter_input(INPUT_POST, 'custLastName');
$custID = filter_input(INPUT_POST, 'custID', FILTER_VALIDATE_INT);

$addLine1 = filter_input(INPUT_POST, 'addLine1');
$addLine2 = filter_input(INPUT_POST, 'addLine2');
$addCity = filter_input(INPUT_POST, 'addCity');
$addState = filter_input(INPUT_POST, 'addState');
$addZipCode = filter_input(INPUT_POST, 'addZipCode');
$addPhoneNumber = filter_input(INPUT_POST, 'addPhoneNumber');

//validate inputs
if ($custCompany === null || $custEmail === null ||$custFirstName === null ||$custLastName === null ||$custID === null ||
	$addLine1 === null || $addCity === null || $addState === null ||$addZipCode === null ||$addPhoneNumber === null) {
    $error = "Invalid product data. Check all fields and try again.";
    echo $error;
}

else {
    require_once('../inc/db_connect.php');

	 $updateCustomers = 'UPDATE customers
                 SET company = :custCompany, emailAddress = :custEmail,
				 firstName =:custFirstName, lastName =:custLastName
				 WHERE customerID =:custID';
				 
    $statement = $db1->prepare($updateCustomers);
	$statement->bindValue(':custID', $custID);
	$statement->bindValue(':custCompany', $custCompany);
    $statement->bindValue(':custEmail', $custEmail);
    $statement->bindValue(':custFirstName', $custFirstName);
    $statement->bindValue(':custLastName', $custLastName);
    $statement->execute();
    $statement->closeCursor();
     
	$updateAddresses = 'UPDATE addresses
						SET line1 = :addLine1, line2 = :addLine2, city = :addCity,
						state = :addState, zipCode = :addZipCode, phone = :addPhoneNumber
						WHERE customerID =:custID';
	$statement2=$db1->prepare($updateAddresses);
	$statement2->bindValue(':custID', $custID);
	$statement2->bindValue(':addLine1', $addLine1);
	$statement2->bindValue(':addLine2', $addLine2);
	$statement2->bindValue(':addCity', $addCity);
	$statement2->bindValue(':addState', $addState);
	$statement2->bindValue(':addZipCode', $addZipCode);
	$statement2->bindValue(':addPhoneNumber', $addPhoneNumber);
	$statement2->execute();
	$statement2->closeCursor();

    // Display the Product List page
	 echo "Update successful!";
    include('viewCustomers.php');
}	


 
 
?>