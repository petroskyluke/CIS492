<?php
include('../inc/session.php');
include_once('../inc/db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hydro Hawk Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }
    </style>
</head>

<!-- Sidebar -->
<?php include('admin_sidebar.php');?>

<!-- Page Content -->
<div class="content">
    <div class="w3-container w3-teal">
        <h1>View Reports</h1>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">

    <h3>Select which report you would like to view:</h3>
    <label for="report"></label>

    <select id="report" name="report" required>
        <option disabled selected value> -- select report -- </option>
        <option value="package" id="package">Package</option>
        <option value="phonenumber" id="phonenumber">Phone Number</option>
        <option value="city" id="city">City</option>
    </select>

    
    <h3>Search:</h3>
        <label for="search"></label>
        <input type="text" id="search" name="search" value="">
        <input type="submit" value="Search" name="submit" formaction=""><br><br>

    </form>

    <!--search but in php-->
    <?php if(isset($_POST['report']) && $_POST['report']==='phonenumber'){
    include 'displayphone.php';
    }
    elseif(isset($_POST['report']) && $_POST['report']==='city'){
        include 'displaycity.php';
    }
    elseif(isset($_POST['report']) && $_POST['report']==='package'){
        include 'displaypackage.php';
    }
    ?>

    <?php //set cover image?>
    <?php if ((!empty($_POST['submit']))&&($_POST['submit']=='Cover')){
        include 'cover.php';

    }
    ?>
    <script>
    //$select_project = project123456 . selected selects it
        document.getElementById("<?php echo $selected_report?>").selected="true";
        $var='<?php echo $search;?>';
        document.getElementById("search").value=$var;

    </script>

</div>


</body>
</html>
