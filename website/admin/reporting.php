<?php
include('../inc/session.php');


include_once('../inc/db_connect.php');

//Form field is used to select which service needs to be edited
if(!isset($typeofreport)){$typeofreport = filter_input(INPUT_POST, 'typeofreport');}
$form_field1 = '<form action="" method="post">';
$form_field1 .= '<select name="typeofreport" onchange="javascript:this.form.submit()">';
$options = array();
if($typeofreport === null){
    $options['blank'] = '';
}
$options['packages'] = 'Packages';
$options['phone-number'] = 'Phone Number';
$options['city'] = 'City';
if (! empty($options)) {
    foreach ($options as $option) {
        $selected = ($typeofreport == $option) ? 'selected="selected"' : '';
        $form_field1 .= '<option value="'.$option.'" ' . $selected . '>'.$option.'</option>';
    }
}
$form_field1 .= '</select></form>';
//end form field


//Form field is ued to search


if($typeofreport==='Phone Number'){
    include 'displayphone.php';
}
elseif($typeofreport==='City'){
    include 'displaycity.php';
}
elseif($typeofreport==='Packages'){
    include 'displaypackage.php';
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
            <h1>Reports</h1>
        </div>
        <h3>This page can be used to view order data.</h3>
        <h4>Please choose which type of data you would like to view.</h4>
        <?php echo $form_field1;
        //echo $form_field2;
        echo $show_rows;
        if($typeofreport==="Packages"||$typeofreport=="City"||$typeofreport=="Phone Number"){echo $search;}
        if($typeofreport==="Phone Number"||$typeofreport==="City"||$typeofreport==="Packages"){ echo $show_rows; }?>
        </br>
        <?php //if($submit==='edit'&&$typeofreport!=="packages"){ echo $form_field3; }?>
        

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
