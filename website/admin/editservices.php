<?php
//BEGIN USER VERIFICATION
//BEGIN SESSION CODE
//get current time
$time = $_SERVER['REQUEST_TIME'];
//set the amount of time a session should live
$timeout_duration = 600;
//set parameters for session cookie storage
ini_set('session.gc_maxlifetime', $timeout_duration);
ini_set('session.cookie_lifetime', $timeout_duration);
session_start();
if(isset($_SESSION['LAST_ACTIVITY']) && 
	(($_SESSION['LAST_ACTIVITY'] + $timeout_duration) < $time))
{
	session_unset();
    session_destroy();
    session_start(); 
}
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
  }

$_SESSION['LAST_ACTIVITY'] = $time;
//END SESSION CODE
if(!isset($_SESSION["username"]))  
{  
	header("location:../login.php?msg=You+have+been+logged+out+due+to+inactivity");  
}
//END USER VERIFICATION
//set variables
if(!isset($submit)){$submit = filter_input(INPUT_POST,'submit');}
//end set variables
include_once('../inc/db_connect.php');
//Form field is used to select which service needs to be edited
if(!isset($typeofservice)){$typeofservice = filter_input(INPUT_POST, 'typeofservice');}
$form_field1 = '';
$form_field1 .= '<select name="typeofservice" onchange="javascript:this.form.submit()">';
$options = array();
$options['Projects'] = 'Projects';
$options['Add-ons'] = 'Add-ons';
$options['A_la_carte'] = 'A la carte';
if (! empty($options)) {
    foreach ($options as $option) {
        $selected = ($typeofservice == $option) ? 'selected="selected"' : '';
        $form_field1 .= '<option value="'.$option.'" ' . $selected . '>'.$option.'</option>';
    }
}
$form_field1 .= '</select>';
//end form field
// Get addons
if($typeofservice==='Add-ons'){
    if(filter_input(INPUT_POST, 'submit') === 'insert'){
        $addon_name = filter_input(INPUT_POST, 'addon_name');
        $addon_price = filter_input(INPUT_POST, 'addon_price');
        $addon_description = filter_input(INPUT_POST, 'addon_description');

        $insert = $db1->prepare('INSERT INTO add_ons (addon_name, addon_price, addon_description) VALUES
        (:addon_name, :addon_price, :addon_description)');
        $insert->bindParam(':addon_name', $addon_name);
        $insert->bindParam(':addon_price', $addon_price);
        $insert->bindParam(':addon_description', $addon_description);
        $insert->execute();

    }
    $query = 'SELECT addon_ID, addon_name, addon_price, addon_description
                FROM add_ons';
    $statement = $db1->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    
    $form_field2 = '';
    //start table and add headers
    $form_field2 .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
    if(!empty($rows)){
        foreach($rows as $row){
            $form_field2 .= '<tr><form action="" method="post">';
            $form_field2 .= '<td>'.$row['addon_ID'].'</td>
                            <td>'.$row['addon_name'].'</td>
                            <td>'.$row['addon_price'].'</td>
                            <td>'.$row['addon_description'].'</td>
                            <td>
                            <input type="submit" name="submit" value="edit">
                            <input type="hidden" name="typeofservice" value="Add-ons">
                            <input type="hidden" name="addon_ID" value="Add-ons">
                            <input type="hidden" name="addon_name" value="Add-ons">
                            <input type="hidden" name="addon_price" value="Add-ons">
                            <input type="hidden" name="addon_description" value="Add-ons">
                            </td>';
            $form_field2 .= '</form></tr>';
        }
    }
    //this adds the row to add a new row of data into the addon table
    $form_field2 .='<tr><form action="" method="post">
                        <td>ID<input type="hidden" name="typeofservice" value="Add-ons"></td>
                        <td><input type="text" name="addon_name"></td>
                        <td><input type="text" name="addon_price"></td>
                        <td><input type="text" name="addon_description"></td>
                        <td><input type="submit" name="submit" value="insert"></td>
                        </form>
                    </tr>';

    $form_field2 .= '</table>';
    if(filter_input(INPUT_POST,'submit') === 'edit'){
        $form_field3 = '';
        $addon_ID = filter_input(INPUT_POST, 'addon_ID');
        //start table and add headers
        $form_field3 .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
        foreach($rows as $row){
            if($row['addon_ID'] === $addon_ID){
                $form_field3 .= '<tr><form action="" method="post">';
                $form_field3 .= '<td>'.$row['addon_ID'].'</td>
                            <td>'.$row['addon_name'].'</td>
                            <td>'.$row['addon_price'].'</td>
                            <td>'.$row['addon_description'].'</td>
                            <td>
                            <input type="submit" name="submit" value="change">
                            <input type="hidden" name="typeofservice" value="Add-ons">
                            <input type="hidden" name="addon_ID" value="Add-ons">
                            <input type="hidden" name="addon_name" value="Add-ons">
                            <input type="hidden" name="addon_price" value="Add-ons">
                            <input type="hidden" name="addon_description" value="Add-ons">
                            </td>';
                $form_field3 .= '</form></tr>';
            }
            
        }
        $form_field3 .= '</table>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }
    </style>
</head>

<body>

    <!-- Page content -->
    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:10%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="#" class="w3-bar-item w3-button">Services</a>
        <a href="editportfolio.php" class="w3-bar-item w3-button">Portfolio</a>
        <a href="reporting.php" class="w3-bar-item w3-button">Reporting</a>
        <a href="../inc/logout.php" class="w3-bar-item w3-button">Logout</a>
        <a href="changepassword.php" class="w3-bar-item w3-button">Change Password</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:10%">
        <div class="w3-container w3-teal">
            <h1>Edit Services</h1>
        </div>
        <h3>This page can be used to edit the available services</h3>
        <h4>Please choose which type of service you would like to edit</h4>
        <form action="" method="post" >
        <?php echo $form_field1;?>
        </form>
        <?php if($typeofservice==="Add-ons"){ echo $form_field2; }?>
        </br>
        <?php if($submit==="edit"){ echo $form_field3; }?>
        

    </div>
    

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge"></footer>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>
</html>
