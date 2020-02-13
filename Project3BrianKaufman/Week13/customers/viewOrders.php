<?php
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}
if(!isset($customer_id)){
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);

if($customer_id == null){
$error = "Error";
echo $error;
}

else {
require('../inc/db_connect.php');

$queryOrders = 'SELECT * FROM orders
                  WHERE customerID = :customer_id';
                   
$statement1 = $db1->prepare($queryOrders);
$statement1->bindValue(':customer_id', $customer_id);
$statement1->execute();
$orders = $statement1->fetchall();
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
	<h2>List of Orders from Customer ID: <?php echo $customer_id?> </h2> 

		<table>
            <tr>
				<th>Order ID</th>
				<th>Employee ID</th>
				<th>Order Date</th>
				<th>Ship Date </th>
				<th>Ship Amount</th>
				<th>Tax Amount</th>
				<th>Payment Type</th>
				<th>&nbsp;</th>
            </tr>

            <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order['orderID']; ?></td>
				<td><?php echo $order['employeeID'];?></td>
				<td><?php echo $order['orderDate'];?></td>
				<td><?php echo $order['shipDate'];?></td>
				<td><?php echo $order['shipAmount'];?></td>
				<td><?php echo $order['taxAmount'];?></td>
				<td><?php echo $order['paymentType'];?></td>
                <td><form action="viewOrderDetails.php"method="post">
					<input type="submit" value="Order Details">
					<input type="hidden" name="customer_id"
						value="<?php echo $customer_id;?>">
					<input type="hidden" name="order_id"
						value="<?php echo $order['orderID'];?>">
					</form>
				</td>
            </tr>
            <?php endforeach; ?>
        </table>
          
           <p><a href="viewCustomers.php">View All Customers</a></p>
	</main>

    <footer>
		<p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
    </footer>
</body>
</html>	