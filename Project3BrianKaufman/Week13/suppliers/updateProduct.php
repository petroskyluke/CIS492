<?php


//fetch inputs 
$prodID= filter_input(INPUT_POST, 'prodID');
$supplierID = filter_input(INPUT_POST, 'supplierID');
$productCode = filter_input(INPUT_POST, 'productCode');
$productName = filter_input(INPUT_POST, 'productName');
$listPrice = filter_input(INPUT_POST, 'listPrice');


//validate inputs
if ($prodID === null || $supplierID === null ||$productCode === null ||$productName === null || 
	$listPrice === null) {
    $error = "Invalid product data. Check all fields and try again.";
    echo $error;
}

else {
    require_once('../inc/db_connect.php');

	 $updateProduct = 'UPDATE products
                 SET supplierID = :supplierID, productCode = :productCode, productName =:productName,
				 listPrice =:listPrice
				 WHERE productID =:prodID';
				 
    $statement = $db1->prepare($updateProduct);
	$statement->bindValue(':prodID', $prodID);
	$statement->bindValue(':supplierID', $supplierID);
	$statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':listPrice', $listPrice);
    $statement->execute();
    $statement->closeCursor();
     
	 
	 // Display the Product List page
	 echo "Update successful!";
    include('viewSuppliers.php');
}	


 
 
?>