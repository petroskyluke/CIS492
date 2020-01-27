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
        <h1>Add Customer</h1>
        <form action="addCustomer.php" method="post"
              id="add_customer_form">

            
            <label>First Name:</label>
            <input type="text" name="fName"><br>

            <label>Last Name:</label>
            <input type="text" name="lName"><br>

			<label>Company:</label>
			<input type="text" name="company"><br>

            <label>Email:</label>
            <input type="text" name="email"><br>
			
			<label>Password:</label>
			<input type="password" name="password"><br>
			
			<label> Address Line1:</label>
            <input type="text" name="line1"><br>
			
			<label>Address Line2:</label>
            <input type="text" name="line2"><br>
			
			<label>City:</label>
            <input type="text" name="city"><br>
			
			<label>State:</label>
            <input type="text" name="state"><br>
			
			<label>Zipcode:</label>
            <input type="text" name="zipcode"><br>
			
			<label>Phone:</label>
            <input type="text" name="phone"><br>
			
			

			
			<label>&nbsp;</label>
            <input type="submit" value="Add Customer"><br>
        </form>
        <p><a href="viewCustomers.php">View Customer List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>