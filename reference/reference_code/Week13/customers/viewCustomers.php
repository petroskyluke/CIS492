<?php
require_once('../inc/db_connect.php');
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}

// Get all customers
$query = 'SELECT * FROM customers
                       ORDER BY customerID';
$statement = $db1->prepare($query);
$statement->execute();
$customers= $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<div style="clear: both">
	<h2 style="float: left; width: 50%; padding-top:2.8%;"><a href="../inc/searchScreen.php">Home</a></h2>
	<h2 style="float: right; width: 50%; text-align: right; padding-top:2.8%;"><a href="../inc/logout.php">Logout</a></h2>
</div>
<hr />
<!-- the head section -->
<head>
    <title>Trade Winds</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Customers</h1></header>
<main>

<form action="viewCustomers.php" method="post"
	id="search_customer_list">
	<label>Search by Last Name:</label>
	<input type="text" name="searchLName"></br>
	<input type="submit" value="Search">
</form>

<?php $searchLName=filter_input(INPUT_POST, 'searchLName');?>
<?php $check=false;?>
    <h1>Customer List</h1>


        <!-- display a list of customers -->
	
   <table>
			<tr>
			<th>Customer ID</th>
			<th>Company Name</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			</tr>
			<!--default search all names-->
			<?php foreach($customers as $customer): ?>
			<?php if($searchLName==null || $searchLName==''):?>	  
				<?php $check=true;?>
				<tr>
				<td><?php echo $customer['customerID']; ?></td>
				<td><?php echo $customer['company']; ?></td>
				<td><?php echo $customer['firstName']; ?></td>
				<td><?php echo $customer['lastName']; ?></td>
				<td><?php echo $customer['emailAddress']; ?></td>
				<td><form action="viewOrders.php"method="post">
					<input type="submit" value="Orders">
					<input type="hidden" name="customer_id"
						value="<?php echo $customer['customerID'];?>">
					</form>
				</td>
				<td><form action="updateCustomerForm.php"method="post">
					<input type="submit" value="Update">
					<input type="hidden" name="customer_id"
						value="<?php echo $customer['customerID'];?>">
					</form>
				</td>

				</tr>
			<!--search by specific name-->
			<?php elseif($searchLName==$customer['lastName']):?>
				<?php $check=true;?>
				<tr>
				<td><?php echo $customer['customerID']; ?></td>
				<td><?php echo $customer['emailAddress']; ?></td>
				<td><?php echo $customer['company']; ?></td>
				<td><?php echo $customer['firstName']; ?></td>
				<td><?php echo $customer['lastName']; ?></td>
				<td><form action="viewOrders.php"method="post">
					<input type="submit" value="Orders">
					<input type="hidden" name="customer_id"
						value="<?php echo $customer['customerID'];?>">
					</form>
				</td>
				<td><form action="updateCustomerForm.php"method="post">
					<input type="submit" value="Update">
					<input type="hidden" name="customer_id"
						value="<?php echo $customer['customerID'];?>">
					</form>
				</td>
				</tr>
			<?php endif;?>
			<?php endforeach; ?>
			<?php if($check==false):?>
				<p>Last name not found</p>
			<?php endif;?>
	</table>   
	<p><a href="addCustomerForm.php">Add New Customer</a></p>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
</footer>
</body>
</html>