<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}

if(!isset($supplier_id)){
$supplier_id = filter_input(INPUT_POST, 'supplier_id', FILTER_VALIDATE_INT);



if($supplier_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');

$queryProducts = 'SELECT * FROM products
                  WHERE supplierID = :supplier_id';
                   
$statement1 = $db1->prepare($queryProducts);
$statement1->bindValue(':supplier_id', $supplier_id);
$statement1->execute();
$products = $statement1->fetchall();
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
	<h2>Products from Supplier ID: <?php echo $supplier_id?> </h2> 

		<table>
            <tr>
				<th>Product ID</th>
				<th>Suppler ID</th>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>List Price</th>
				<th>&nbsp</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productID']; ?></td>
				<td><?php echo $product['supplierID'];?></td>
				<td><?php echo $product['productCode'];?></td>
				<td><?php echo $product['productName'];?></td>
				<td><?php echo $product['listPrice'];?></td>
				<td><form action="updateProductForm.php"method="post">
					<input type="submit" value=" Update">
					<input type="hidden" name="product_id"
						value="<?php echo $product['productID'];?>">
					</form>
				</td>
                
            </tr>
            <?php endforeach; ?>
        </table><br>
		<form action="addProductForm.php" method="post">
			<input type="submit" value="Add New Product">

			<input type="hidden" name="supplier_id" value="<?php echo $supplier_id;?>">
		</form><br>
		<form action="viewSuppliers.php">
			<input type="submit" value="View All Products">
		</form>
	</main>

    <footer>
		<p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	