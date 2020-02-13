<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
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

    <main>
        <h1>Add Supplier</h1>
        <form action="addSupplier.php" method="post"
              id="add_supplier_form">

            <label>Company:</label>
			<input type="text" name="company"><br>

            <label>First Name:</label>
            <input type="text" name="fName"><br>

            <label>Last Name:</label>
            <input type="text" name="lName"><br>			

            <label>Email:</label>
            <input type="text" name="email"><br>
			
			<label>Password:</label>
			<input type="password" name="password"><br>
			
			<label> Address:</label>
            <input type="text" name="address"><br>
			
			<label>City:</label>
            <input type="text" name="city"><br>
			
			<label>State:</label>
            <input type="text" name="state"><br>
			
			<label>Zipcode:</label>
            <input type="text" name="zipCode"><br>
			
			<label>Phone:</label>
            <input type="text" name="phone"><br>
			
			

			
            <br><input type="submit" value="Add Supplier">
        </form><br>
		<form action="viewSuppliers.php">
			<input type="submit" value="View Supplier List">
		</form> 
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>