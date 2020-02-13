 <?php require_once('../inc/db_connect.php');
 session_start();  
 
 if(isset($_SESSION["username"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>'; 
      
	  
 }  
 else  
 {  
      header("location:../index.php");  
 }
 ?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
	<title>Welcome Screen</title>
	<link rel="stylesheet" href="../css/main.css">
</head>

<!-- the body section -->
<body>
<header</header>
<main>
<aside>
	<a href="../inc/logout.php"<p>Logout</p></a>
</aside><br style="line-height:0px;" />
<h1 align ="center" style="padding-top: 0px;">Welcome to Trade Winds!</h1>
<h2 align="center">Please select what you are searching for.</h2>
<p></p>
<nav align="center">
<ul>
	<li><a href="../customers/viewCustomers.php">Search Customers</a></li>
	<li><a href="../suppliers/viewSuppliers.php">Search Suppliers</a></li>
	<li><a href="../employees/viewEmployees.php">Search Employees</a></li>
	</ul>


<nav>



</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Trade Winds&#9784;&#9780; </p>
</footer>
</body>

</html>