<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}
if(!isset($customer_id)){
$customer_id = filter_input(INPUT_POST, 'customer_id');

if($customer_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');
//select customer info
$queryCustomers = 'SELECT * FROM customers
                  WHERE customerID = :customer_id';
                   
$statement1 = $db1->prepare($queryCustomers);
$statement1->bindValue(':customer_id', $customer_id);
$statement1->execute();
$customer = $statement1->fetch();
$statement1->closeCursor();
//select address info
$queryAddresses = 'SELECT * FROM addresses
				   WHERE customerID = :customer_id';
$statement2 = $db1->prepare($queryAddresses);
$statement2->bindValue(':customer_id', $customer_id);
$statement2->execute();
$address=$statement2->fetch();
$statement2->closeCursor();

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
    <header><h1>Customers</h1></header>
	

    <main>
		<h2>Customer to Update: <?php echo $customer_id?> </h2> 
          <form action="updatecustomer.php" method="post"
              id="update_customer_form">

            <label>Company:</label>
             <input type="text" name="custCompany" value="<?php echo $customer["company"];?>" ><br>

            <label>Email Address:</label>
            <input type="text" name="custEmail" value="<?php echo $customer["emailAddress"];?>" ><br>

            <label>First Name:</label>
            <input type="text" name="custFirstName" value="<?php echo $customer["firstName"];?>"><br>

            <label>Last Name:</label>
            <input type="text" name="custLastName" value="<?php echo $customer["lastName"];?>"><br>
			
			<input type="hidden" name="custID" value="<?php echo $customer["customerID"];?>" ><br>
			
			
			<label>Address Line 1:</label>
			<input type="text" name="addLine1" value="<?php echo $address["line1"];?>"><br>

			<label>Address Line 2:</label>
			<input type="text" name="addLine2" value="<?php echo $address["line2"];?>"><br>

			<label>City:</label>
			<input type="text" name="addCity" value="<?php echo $address["city"];?>"><br>

			<label>State:</label>
			<input type="text" name="addState" value="<?php echo $address["state"];?>"><br>

			<label>Zip Code:</label>
			<input type="text" name="addZipCode" value="<?php echo $address["zipCode"];?>"><br>

			<label>Phone Number:</label>
			<input type="text" name="addPhoneNumber" value="<?php echo $address["phone"];?>"><br>


			
            <label>&nbsp;</label>
            <input type="submit" value="Update Customer"><br>
           </form>
		   
	 
	</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	