<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}

if(!isset($supplier_id)){
$supplier_id = filter_input(INPUT_POST, 'supplier_id');

if($supplier_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');
//select supplier info
$querySuppliers = 'SELECT * FROM suppliers
                  WHERE supplierID = :supplier_id';
                   
$statement1 = $db1->prepare($querySuppliers);
$statement1->bindValue(':supplier_id', $supplier_id);
$statement1->execute();
$supplier = $statement1->fetch();
$statement1->closeCursor();


}
}


?>


<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Trade Winds</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Suppliers</h1></header>
	

    <main>
		<h2>Supplier to Update: <?php echo $supplier_id?> </h2> 
		 <form action="updateSupplier.php" method="post"
              id="update_supplier_form">

            <label>Company:</label>
             <input type="text" name="supCompany" value="<?php echo $supplier["company"];?>" ><br>

            <label>First Name:</label>
            <input type="text" name="supFirstName" value="<?php echo $supplier["firstName"];?>" ><br>

            <label>Last Name:</label>
            <input type="text" name="supLastName" value="<?php echo $supplier["lastName"];?>"><br>

            <label>Email Address:</label>
            <input type="text" name="supEmail" value="<?php echo $supplier["emailAddress"];?>"><br>	

			<label>Phone Number:</label>
			<input type="text" name="supPhoneNumber" value="<?php echo $supplier["phoneNumber"];?>"><br>

			<label>Address:</label>
			<input type="text" name="supAddress" value="<?php echo $supplier["address"];?>"><br>

			<label>City:</label>
			<input type="text" name="supCity" value="<?php echo $supplier["city"];?>"><br>

			<label>State:</label>
			<input type="text" name="supState" value="<?php echo $supplier["state"];?>"><br>

			<label>Zip:</label>
			<input type="text" name="supZipCode" value="<?php echo $supplier["zipCode"];?>"><br>
			
			<input type="hidden" name="supID" value="<?php echo $supplier["supplierID"];?>" ><br>

			
            <input type="submit" value="Update Supplier">
         </form><br>
		<form action="viewSuppliers.php">
			<input type="submit" value="Back">
		</form>
			 
	</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	