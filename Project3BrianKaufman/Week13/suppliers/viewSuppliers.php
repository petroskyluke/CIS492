<?php
require_once('../inc/db_connect.php');
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}   

// Get all suppliers
$query = 'SELECT * FROM suppliers
                       ORDER BY supplierID';
$statement = $db1->prepare($query);
$statement->execute();
$suppliers= $statement->fetchAll();
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
<header><h1>Suppliers</h1></header>

<main>

<form action="viewSuppliers.php" method="post"
	id="search_supplier_list">
	<label>Search by Last Name:</label>
	<input type="text" name="searchLName"></br>
	<label>and/or</label></br>
	<label>Search by Company Name:</label>
	<input type="text" name="searchCompany"></br>
	<input type="submit" value="Search">
</form>

<?php $searchLName=filter_input(INPUT_POST, 'searchLName');?>
<?php $searchCompany=filter_input(INPUT_POST, 'searchCompany');?>
<?php $check=false;?>
    <h1>Supplier List</h1>


        <!-- display a list of suppliers -->
	
   <table>
			<tr>
			<th>ID</th>
			<th>Company</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>City</th>
			<th>&nbsp;</th>
			</tr>
			<!--default search all names-->
			<?php foreach($suppliers as $supplier): ?>
			<?php if(($searchLName==null || $searchLName=='') && ($searchCompany==null || $searchCompany=='')):?>	  
				<?php $check=true;?>
				<tr>
				<td><?php echo $supplier['supplierID']; ?></td>
				<td><?php echo $supplier['company']; ?></td>
				<td><?php echo $supplier['firstName']; ?></td>
				<td><?php echo $supplier['lastName']; ?></td>
				<td><?php echo $supplier['emailAddress']; ?></td>
				<td><?php echo $supplier['phoneNumber'];?></td>
				<td><?php echo $supplier['address'];?></td>
				<td><?php echo $supplier['city'];?></td>
				<td><form action="viewProducts.php"method="post">
					<input type="submit" value="Products">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				<form action="updateSupplierForm.php"method="post">
					<input type="submit" value=" Update">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				</td>

				</tr>
			<!--search by specific name-->
			<?php elseif($searchLName==$supplier['lastName'] && ($searchCompany==null || $searchCompany=='')):?>
				<?php $check=true;?>
				<tr>
				<td><?php echo $supplier['supplierID']; ?></td>
				<td><?php echo $supplier['company']; ?></td>
				<td><?php echo $supplier['firstName']; ?></td>
				<td><?php echo $supplier['lastName']; ?></td>
				<td><?php echo $supplier['emailAddress']; ?></td>
				<td><?php echo $supplier['phoneNumber'];?></td>
				<td><?php echo $supplier['address'];?></td>
				<td><?php echo $supplier['city'];?></td>
				<td><form action="viewProducts.php"method="post">
					<input type="submit" value="Products">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				<form action="updateSupplierForm.php"method="post">
					<input type="submit" value="Update">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				</td>
				</tr>
			<?php elseif($searchCompany==$supplier['company'] && ($searchLName==null || $searchLName=='')):?>
				<?php $check=true;?>
				<tr>
				<td><?php echo $supplier['supplierID']; ?></td>
				<td><?php echo $supplier['company']; ?></td>
				<td><?php echo $supplier['firstName']; ?></td>
				<td><?php echo $supplier['lastName']; ?></td>
				<td><?php echo $supplier['emailAddress']; ?></td>
				<td><?php echo $supplier['phoneNumber'];?></td>
				<td><?php echo $supplier['address'];?></td>
				<td><?php echo $supplier['city'];?></td>
				<td><form action="viewProducts.php"method="post">
					<input type="submit" value="Products">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				<form action="updateSupplierForm.php"method="post">
					<input type="submit" value="Update">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				</td>
				</tr>
			<?php elseif($searchCompany==$supplier['company'] && $searchLName==$supplier['lastName']):?>
				<?php $check=true;?>
				<tr>
				<td><?php echo $supplier['supplierID']; ?></td>
				<td><?php echo $supplier['company']; ?></td>
				<td><?php echo $supplier['firstName']; ?></td>
				<td><?php echo $supplier['lastName']; ?></td>
				<td><?php echo $supplier['emailAddress']; ?></td>
				<td><?php echo $supplier['phoneNumber'];?></td>
				<td><?php echo $supplier['address'];?></td>
				<td><?php echo $supplier['city'];?></td>
				<td><form action="viewProducts.php"method="post">
					<input type="submit" value="Products">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				<form action="updateSupplierForm.php"method="post">
					<input type="submit" value="Update">
					<input type="hidden" name="supplier_id"
						value="<?php echo $supplier['supplierID'];?>">
					</form>
				</td>
				</tr>
			<?php endif;?>
			
			<?php endforeach; ?>

			<?php if($check==false):?>
				<p>No results found.</p>
			<?php endif;?>

	</table>   
	<p><a href="addSupplierForm.php">Add New Supplier</a></p>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
</footer>
</body>
</html>