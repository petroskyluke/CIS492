<?php

require('../inc/db_connect.php');

//fetch the text box values

$supplier_id = filter_input(INPUT_POST, 'supplier_id');
$prodProductCode = filter_input(INPUT_POST, 'prodProductCode');
$prodProductName = filter_input(INPUT_POST, 'prodProductName');
$prodListPrice = filter_input(INPUT_POST, 'prodListPrice');


//Validate values
if ($prodListPrice == null || $prodProductCode == null || $prodProductName == null ||
    $prodListPrice == null) {
    $error = "Invalid  data. Check all fields and try again.";
    echo $error;
    include('addSupplierForm.php');	
}

	
	//Alt way to check for duplicate
else {	  
	$checkDup = 'SELECT productCode FROM products
					  WHERE productCode = :prodProductCode';
                   
	$statement1 = $db1->prepare($checkDup);
	$statement1->bindValue(':prodProductCode', $prodProductCode);
	$statement1->execute();
	$exists = $statement1->fetch();
	$statement1->closeCursor();

	if($exists==''){
	// Add the product to the database  
	$insertProducts = 'INSERT INTO products
	   				   (supplierID, productCode, productName, listPrice)
					   VALUES
					   (:supplier_id, :prodProductCode, :prodProductName, :prodListPrice)';
	$statement2 = $db1->prepare($insertProducts);
		
	$statement2->bindValue(':supplier_id', $supplier_id);
	$statement2->bindValue(':prodProductCode', $prodProductCode);
	$statement2->bindValue(':prodProductName', $prodProductName);
	$statement2->bindValue(':prodListPrice', $prodListPrice);
		
	$statement2->execute();
	$statement2->closeCursor();
	echo "Product Successfully Added.";
	include('viewSuppliers.php');

	}
	else{
		$error = "Duplicate product code.";
		echo $error;
		include('addProductForm.php');
	}		
		
}		
?>