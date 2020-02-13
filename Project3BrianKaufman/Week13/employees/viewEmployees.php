<?php
require_once('../inc/db_connect.php');
session_start();  
 
if(!isset($_SESSION["username"]))  
{  
	header("location:../index.php");  
}  
// Get all employees
$query = 'SELECT * FROM employees
                       ORDER BY employeeID';
$statement = $db1->prepare($query);
$statement->execute();
$employees= $statement->fetchAll();
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
<header><h1>Employees</h1></header>
<main>

<form action="viewEmployees.php" method="post"
	id="search_employee_list">
	<label>Search by Last Name:</label>
	<input type="text" name="searchLName"></br>
	<input type="submit" value="Search">
</form>

<?php $searchLName=filter_input(INPUT_POST, 'searchLName');?>
<?php $check=false;?>
    <h1>Employee List</h1>


        <!-- display a list -->
	
   <table>
			<tr>
			<th>EmployeeID</th>
			<th>Email</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			</tr>
			<!--default search all names-->
			<?php foreach($employees as $employee): ?>
			<?php if($searchLName==null || $searchLName==''):?>	  
				<?php $check=true;?>
				<tr>
				<td><?php echo $employee['employeeID']; ?></td>
				<td><?php echo $employee['emailAddress']; ?></td>
				<td><?php echo $employee['firstName']; ?></td>
				<td><?php echo $employee['lastName']; ?></td>
				<td><?php echo $employee['phoneNumber']; ?></td>


				</tr>
			<!--search by specific name-->
			<?php elseif($searchLName==$employee['lastName']):?>
				<?php $check=true;?>
				<tr>
				<td><?php echo $employee['employeeID']; ?></td>
				<td><?php echo $employee['emailAddress']; ?></td>
				<td><?php echo $employee['firstName']; ?></td>
				<td><?php echo $employee['lastName']; ?></td>
				<td><?php echo $employee['phoneNumber']; ?></td>
				
				</tr>
			<?php endif;?>
			<?php endforeach; ?>
			<?php if($check==false):?>
				<p>Last name not found</p>
			<?php endif;?>
	</table>  

</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
</footer>
</body>
</html>