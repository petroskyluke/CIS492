<?php
include('../inc/session.php');
//set variables
if(!isset($submit)){$submit = filter_input(INPUT_POST,'submit');}

//package features variables
if(!isset($package_feature_ID)){$package_feature_ID = filter_input(INPUT_POST,'package_feature_ID');}
if(!isset($package_feature_name)){$package_feature_name = filter_input(INPUT_POST,'package_feature_name');}

//package variables
if(!isset($db_action)){$db_action = filter_input(INPUT_POST,'db_action');}

if(!isset($package_ID)){$package_ID = filter_input(INPUT_POST,'package_ID');}
if(!isset($package_name)){$package_name = filter_input(INPUT_POST,'package_name');}
if(!isset($package_price)){$package_price = filter_input(INPUT_POST,'package_price');}

//addon variables
if(!isset($addon_ID)){$addon_ID = filter_input(INPUT_POST,'addon_ID');}
if(!isset($addon_name)){$addon_name = filter_input(INPUT_POST,'addon_name');}
if(!isset($addon_price)){$addon_price = filter_input(INPUT_POST,'addon_price');}
if(!isset($addon_description)){$addon_description = filter_input(INPUT_POST,'addon_description');}

//a-la-carte variables
if(!isset($alct_ID)){$alct_ID = filter_input(INPUT_POST,'alct_ID');}
if(!isset($alct_name)){$alct_name = filter_input(INPUT_POST,'alct_name');}
if(!isset($alct_price)){$alct_price = filter_input(INPUT_POST,'alct_price');}
if(!isset($alct_description)){$alct_description = filter_input(INPUT_POST,'alct_description');}


//end set variables

include_once('../inc/db_connect.php');

//Form field is used to select which service needs to be edited
if(!isset($typeofservice)){$typeofservice = filter_input(INPUT_POST, 'typeofservice');}
$form_field1 = '<form action="" method="post">';
$form_field1 .= '<select name="typeofservice" onchange="javascript:this.form.submit()">';
$options = array();
if($typeofservice === null){
    $options['blank'] = '';
}
$options['packages'] = 'packages';
$options['add-on'] = 'add-on';
$options['a_la_carte'] = 'a_la_carte';
if (! empty($options)) {
    foreach ($options as $option) {
        $selected = ($typeofservice == $option) ? 'selected="selected"' : '';
        $form_field1 .= '<option value="'.$option.'" ' . $selected . '>'.$option.'</option>';
    }
}
$form_field1 .= '</select></form>';
//end form field

if($typeofservice==='add-on'){
    include 'editaddons.php';
}
elseif($typeofservice==='a_la_carte'){
    include 'editalacarte.php';
}
elseif($typeofservice==='packages'){
    include 'editpackages.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- Page content -->
    <?php include_once('admin_sidebar.php');?>

    <!-- Page Content -->
    <div class="content">
        <div class="w3-container w3-teal">
            <h1>Edit Services</h1>
        </div>
        <h3>This page can be used to edit the available services</h3>
        <h4>Please choose which type of service you would like to edit</h4>
        <?php echo $form_field1;
        if($typeofservice==="packages"&&($submit==="edit"||$submit==="delete"||$submit==="add"||$submit==="change name/price")){echo $back_button;}
        if($typeofservice==="add-on"||$typeofservice==="a_la_carte"||$typeofservice==="packages"){ echo $show_rows; }?>
        </br>
        <?php if($submit==='edit'&&$typeofservice!=="packages"){ echo $form_field3; }?>
        

    </div>
    

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
