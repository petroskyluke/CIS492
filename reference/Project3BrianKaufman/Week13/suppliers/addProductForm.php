<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}
if(!isset($supplier_id)){
	$supplier_id=filter_input(INPUT_POST,'supplier_id',FILTER_VALIDATE_INT);
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
        <h1>Add Product</h1>
        <form action="addProduct.php" method="post"
              id="add_customer_form">

            <label>Supplier ID:</label>
			<!-- i tried making this readonly without luck, because it could be changed in inspection
			so insead the first input only shows the number, it can be changed though inspection view, but does nothing -->
			<input type="text" name="showSupID" value="<?php echo $supplier_id?>" readonly="readonly"><br>
			<input type="hidden" name="supplier_id" value="<?php echo $supplier_id?>"

            <label>Product Code:</label>
            <input type="text" name="prodProductCode"><br>

            <label>Product Name:</label>
            <input type="text" name="prodProductName"><br>			

            <label>List Price:</label>
            <input type="text" name="prodListPrice"><br>

			
            <br><input type="submit" value="Add Product">
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