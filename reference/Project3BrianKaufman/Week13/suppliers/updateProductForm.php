<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}

if(!isset($product_id)){
$product_id = filter_input(INPUT_POST, 'product_id');

if($product_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');
//select product info
$queryProducts = 'SELECT * FROM products
                  WHERE productID = :product_id';
                   
$statement1 = $db1->prepare($queryProducts);
$statement1->bindValue(':product_id', $product_id);
$statement1->execute();
$product = $statement1->fetch();
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
    <header><h1>Products</h1></header>
	

    <main>
		<h2>Product to Update: <?php echo $product_id?> </h2> 
         <form action="updateProduct.php" method="post"
              id="update_product_form">

            <label>Supplier ID:</label>
             <input type="text" name="supplierID" value="<?php echo $product["supplierID"];?>" ><br>

            <label>Product Code:</label>
            <input type="text" name="productCode" value="<?php echo $product["productCode"];?>" ><br>

            <label>Product Name:</label>
            <input type="text" name="productName" value="<?php echo $product["productName"];?>"><br>

            <label>List Price:</label>
            <input type="text" name="listPrice" value="<?php echo $product["listPrice"];?>"><br>	

						
			<input type="hidden" name="prodID" value="<?php echo $product["productID"];?>" ><br>

			
            <input type="submit" value="Update Product">
         </form><br>
		<form action="viewSuppliers.php">
			<input type="submit" value="View Suppliers">
		</form>
		   
	 
	</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	