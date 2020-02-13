<?php


//fetch inputs from updateSupplierForm
$supCompany= filter_input(INPUT_POST, 'supCompany');
$supFirstName = filter_input(INPUT_POST, 'supFirstName');
$supLastName = filter_input(INPUT_POST, 'supLastName');
$supEmail = filter_input(INPUT_POST, 'supEmail');
$supPhoneNumber = filter_input(INPUT_POST, 'supPhoneNumber');
$supAddress = filter_input(INPUT_POST, 'supAddress');
$supCity = filter_input(INPUT_POST, 'supCity');
$supState = filter_input(INPUT_POST, 'supState');
$supZipCode = filter_input(INPUT_POST, 'supZipCode');
$supID = filter_input(INPUT_POST, 'supID', FILTER_VALIDATE_INT);


//validate inputs
if ($supCompany === null || $supEmail === null ||$supPhoneNumber === null ||$supAddress === null || 
	$supCity === null || $supState === null ||$supZipCode === null ||$supID === null) {
    $error = "Invalid product data. Check all fields and try again.";
    echo $error;
}

else {
    require_once('../inc/db_connect.php');

	 $updateSuppliers = 'UPDATE suppliers
                 SET company = :supCompany, firstName = :supFirstName, lastName =:supLastName,
				 emailAddress =:supEmail, phoneNumber =:supPhoneNumber, address =:supAddress,
				 city = :supCity, state = :supState, zipCode = :supZipCode
				 WHERE supplierID =:supID';
				 
    $statement = $db1->prepare($updateSuppliers);
	$statement->bindValue(':supID', $supID);
	$statement->bindValue(':supCompany', $supCompany);
	$statement->bindValue(':supFirstName', $supFirstName);
    $statement->bindValue(':supLastName', $supLastName);
    $statement->bindValue(':supEmail', $supEmail);
    $statement->bindValue(':supPhoneNumber', $supPhoneNumber);
    $statement->bindValue(':supAddress', $supAddress);
    $statement->bindValue(':supCity', $supCity);
    $statement->bindValue(':supState', $supState);
    $statement->bindValue(':supZipCode', $supZipCode);
    $statement->execute();
    $statement->closeCursor();
     

	 // Display the Product List page
	 echo "Update successful!";
    include('viewSuppliers.php');
}	


 
 
?>