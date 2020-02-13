<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}
if(!isset($customer_id)){
	$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
if(!isset($order_id)){
	$order_id=filter_input(INPUT_POST, 'order_id',FILTER_VALIDATE_INT);
}

if($customer_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');

$queryItems = 'SELECT * FROM orderItems, products, suppliers
                  WHERE orderID = :order_id
				  AND orderItems.productID = products.productID
				  AND products.supplierID = suppliers.supplierID';
                   
$statement1 = $db1->prepare($queryItems);
$statement1->bindValue(':order_id', $order_id);
$statement1->execute();
$orderItems = $statement1->fetchall();
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
    <header><h1>Orders</h1></header>	

    <main>
	<h2>Order Details of Customer ID: <?php echo $customer_id?> Order ID: <?php echo $order_id?> </h2> 

		<table>
            <tr>
				<th>Item ID</th>
				<th>Product ID</th>
				<th>Company</th>
				<th>Item Price</th>
				<th>Quantity</th>
				<th>Product Name</th>
            </tr>

            <?php foreach ($orderItems as $orderItem) : ?>
            <tr>
                <td><?php echo $orderItem['itemID']; ?></td>
				<td><?php echo $orderItem['productID'];?></td>
				<td><?php echo $orderItem['company'];?></td>
				<td><?php echo $orderItem['itemPrice'];?></td>
				<td><?php echo $orderItem['quantity'];?></td>
				<td><?php echo $orderItem['productName'];?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
	<p><a href="viewCustomers.php">View All Orders</a></p>
	</main>

    <footer>
		<p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	