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
// Get addons
if($typeofservice==='add-on'){
    //delete an addon row
    if($submit === 'delete'){
        $alter = $db1->prepare('DELETE FROM add_ons
                                WHERE addon_ID = :addon_ID');
        $alter->bindParam(':addon_ID', $addon_ID);
        $alter->execute();
    }
    //edit an addon row
    if($submit === 'change'){
        $alter = $db1->prepare('UPDATE add_ons
                                SET addon_name = :addon_name, addon_price = :addon_price, addon_description = :addon_description
                                WHERE addon_ID = :addon_ID');
        $alter->bindParam(':addon_ID', $addon_ID);
        $alter->bindParam(':addon_name', $addon_name);
        $alter->bindParam(':addon_price', $addon_price);
        $alter->bindParam(':addon_description', $addon_description);
        $alter->execute();
    }
    //add an addon row
    if($submit === 'add'){
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
    //display all addon rows
    $query = 'SELECT addon_ID, addon_name, addon_price, addon_description
                FROM add_ons';
    $statement = $db1->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    
    $show_rows = '';
    //start table and add headers
    $show_rows .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
    if(!empty($rows)){
        foreach($rows as $row){
            $show_rows .= '<tr><form action="" method="post">';
            $show_rows .= '<td>'.$row['addon_ID'].'</td>
                            <td>'.$row['addon_name'].'</td>
                            <td>'.$row['addon_price'].'</td>
                            <td>'.$row['addon_description'].'</td>
                            <td><input type="submit" name="submit" value="edit"></td>
                            <td><input type="submit" name="submit" value="delete" class="delete" id="delete_btn"></td>

                            <input type="hidden" name="typeofservice" value="add-on">
                            <input type="hidden" name="addon_ID" value="'.$row['addon_ID'].'">
                            <input type="hidden" name="addon_name" value="'.$row['addon_name'].'">
                            <input type="hidden" name="addon_price" value="'.$row['addon_price'].'">
                            <input type="hidden" name="addon_description" value="'.$row['addon_description'].'">';
            $show_rows .= '</form></tr>';
        }
    }

    //this adds the row to add a new row of data into the addon table
    $show_rows .='<tr><form action="" method="post">
                        <td>ID<input type="hidden" name="typeofservice" value="add-on"></td>
                        <td><input type="text" name="addon_name"></td>
                        <td><input type="text" name="addon_price"></td>
                        <td><input type="text" name="addon_description"></td>
                        <td><input type="submit" name="submit" value="add"></td>
                        </form>
                    </tr>';

    $show_rows .= '</table>';
    if(filter_input(INPUT_POST,'submit') === 'edit'){
        $form_field3 = '';
        $addon_ID = filter_input(INPUT_POST, 'addon_ID');
        //start table and add headers
        $form_field3 .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
        foreach($rows as $row){
            if($row['addon_ID'] === $addon_ID){
                $form_field3 .= '<tr><form action="" method="post">';
                $form_field3 .= '<td>'.$row['addon_ID'].'</td>
                            <td><input type="text" name="addon_name" value="'.$row['addon_name'].'"></td>
                            <td><input type="text" name="addon_price" value="'.$row['addon_price'].'"></td>
                            <td><input type="text" name="addon_description" value="'.$row['addon_description'].'"></td>
                            <td>
                            <input type="submit" name="submit" value="change">
                            <input type="hidden" name="typeofservice" value="add-on">
                            <input type="hidden" name="addon_ID" value="'.$row['addon_ID'].'">
                            </td>';
                $form_field3 .= '</form></tr>';
            }
            
        }
        $form_field3 .= '</table>';
    }
}
if($typeofservice==='a_la_carte'){
    //delete an a-la-carte row query
    if(filter_input(INPUT_POST,'submit') === 'delete'){
        $alter = $db1->prepare('DELETE FROM a_la_carte
                                WHERE a_la_carte_ID = :alct_ID');
        $alter->bindParam(':alct_ID', $alct_ID);
        $alter->execute();
    }
    //edit an a-la-carte row query
    if(filter_input(INPUT_POST,'submit') === 'change'){
        $alter = $db1->prepare('UPDATE a_la_carte
                                SET a_la_carte_name = :alct_name, a_la_carte_price = :alct_price, a_la_carte_desc = :alct_description
                                WHERE a_la_carte_ID = :alct_ID');
        $alter->bindParam(':alct_ID', $alct_ID);
        $alter->bindParam(':alct_name', $alct_name);
        $alter->bindParam(':alct_price', $alct_price);
        $alter->bindParam(':alct_description', $alct_description);
        $alter->execute();
    }
    //add an a-la-carte row query
    if(filter_input(INPUT_POST, 'submit') === 'add'){
        
        $insert = $db1->prepare('INSERT INTO a_la_carte (a_la_carte_name, a_la_carte_price, a_la_carte_desc) VALUES
        (:alct_name, :alct_price, :alct_description)');
        $insert->bindParam(':alct_name', $alct_name);
        $insert->bindParam(':alct_price', $alct_price);
        $insert->bindParam(':alct_description', $alct_description);
        $insert->execute();
    }
    //display all a-la-carte rows
    $query = 'SELECT a_la_carte_ID, a_la_carte_name, a_la_carte_price, a_la_carte_desc
                FROM a_la_carte';
    $statement = $db1->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    
    $show_rows = '';
    //start table and add headers
    $show_rows .= '<table><tr><th>ID</th><th>a la carte name</th><th>a la carte price</th><th>a la carte description</th></tr>';
    if(!empty($rows)){
        foreach($rows as $row){
            $show_rows .= '<tr><form action="" method="post">';
            $show_rows .= '<td>'.$row['a_la_carte_ID'].'</td>
                            <td>'.$row['a_la_carte_name'].'</td>
                            <td>'.$row['a_la_carte_price'].'</td>
                            <td>'.$row['a_la_carte_desc'].'</td>
                            <td><input type="submit" name="submit" value="edit"></td>
                            <td><input type="submit" name="submit" value="delete" class="delete" id="delete_btn"></td>

                            <input type="hidden" name="typeofservice" value="a_la_carte">
                            <input type="hidden" name="alct_ID" value="'.$row['a_la_carte_ID'].'">
                            <input type="hidden" name="alct_name" value="'.$row['a_la_carte_name'].'">
                            <input type="hidden" name="alct_price" value="'.$row['a_la_carte_price'].'">
                            <input type="hidden" name="alct_description" value="'.$row['a_la_carte_desc'].'">';
            $show_rows .= '</form></tr>';
        }
    }
    //this adds insert row to the showrows string
    $show_rows .='<tr><form action="" method="post">
                        <td>ID<input type="hidden" name="typeofservice" value="a_la_carte"></td>
                        <td><input type="text" name="alct_name"></td>
                        <td><input type="text" name="alct_price"></td>
                        <td><input type="text" name="alct_description"></td>
                        <td><input type="submit" name="submit" value="add"></td>
                        </form>
                    </tr>';
    $show_rows .= '</table>';


    if(filter_input(INPUT_POST,'submit') === 'edit'){
        $form_field3 = '';
        $addon_ID = filter_input(INPUT_POST, 'addon_ID');
        //start table and add headers
        $form_field3 .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
        foreach($rows as $row){
            if($row['a_la_carte_ID'] === $alct_ID){
                $form_field3 .= '<tr><form action="" method="post">';
                $form_field3 .= '<td>'.$row['a_la_carte_ID'].'</td>
                            <td><input type="text" name="alct_name" value="'.$row['a_la_carte_name'].'"></td>
                            <td><input type="text" name="alct_price" value="'.$row['a_la_carte_price'].'"></td>
                            <td><input type="text" name="alct_description" value="'.$row['a_la_carte_desc'].'"></td>
                            <td>
                            <input type="submit" name="submit" value="change">
                            <input type="hidden" name="typeofservice" value="a_la_carte">
                            <input type="hidden" name="alct_ID" value="'.$row['a_la_carte_ID'].'">
                            </td>';
                $form_field3 .= '</form></tr>';
            }
            
        }
        $form_field3 .= '</table>';
    }
}
if($typeofservice==='packages'){
    
    //delete package feature if page is told
    if($db_action==='pf'&&$submit==='delete'){
        $delete = $db1->prepare('DELETE FROM package_features
                                WHERE package_feature_ID = :package_feature_ID');
        $delete->bindParam(':package_feature_ID', $package_feature_ID);
        $delete->execute();
    }

    //alter package feature if page is told
    if($db_action==='pf'&&$submit==='edit'){
        $alter = $db1->prepare('UPDATE package_features
                                SET package_feature_name = :package_feature_name
                                WHERE package_feature_ID = :package_feature_ID');
        $alter->bindParam(':package_feature_ID', $package_feature_ID);
        $alter->bindParam(':package_feature_name', $package_feature_name);
        $alter->execute();
    }
    //add a package feature
    if($db_action==='pf'&&$submit==='add'){
        $insert = $db1->prepare('INSERT INTO package_features (package_feature_name, package_ID) VALUES
        (:package_feature_name, :package_ID)');
        $insert->bindParam(':package_feature_name', $package_feature_name);
        $insert->bindParam(':package_ID', $package_ID);
        $insert->execute();
    }
    
    //query all packages
    $p_query = 'SELECT package_ID, package_name, package_price
                FROM packages';
    $p_statement = $db1->prepare($p_query);
    $p_statement->execute();
    $p_rows = $p_statement->fetchAll();
    $p_statement->closeCursor();

    //query all package features including their package_ID
    $pf_query = 'SELECT package_features.package_feature_ID, package_features.package_feature_name, 
                        package_features.package_feature_desc, package_features.package_ID
                FROM packages, package_features
                WHERE packages.package_ID = package_features.package_ID';
    $pf_statement = $db1->prepare($pf_query);
    $pf_statement->execute();
    $pf_rows = $pf_statement->fetchAll();
    $pf_statement->closeCursor();

    $show_rows = '<div class="wrap">';
    $show_rows .= '<div class="grid-box">';
    $show_rows .= '<div class="grid-wrapper">';
    if($submit!=='edit'&&$submit!=='delete'&&$submit!=='add'){
        if(!empty($p_rows)){
            foreach($p_rows as $p_row){
                $show_rows .= '<div class="grid-card flex-card">';
                $show_rows .= '<div class="flex-item-top">';
                $show_rows .= '<h1>'.$p_row[1].'</h1>';
                $show_rows .= '<h2>'.$p_row[2].'</h2>';
                $show_rows .= '</div>';
                $show_rows .= '<p>Package features</p>';
                $show_rows .= '<div class="flex-item">';
                $show_rows .= '<ul>';
                foreach($pf_rows as $pf_row){
                    if($pf_row['package_ID'] === $p_row['package_ID']){
                        $show_rows .= '<li>'.$pf_row[1].'</li>';
                    }
                }
                $show_rows .= '</ul>';
                $show_rows .= '</div>';

                $show_rows .= '<div class="pf">';
                $show_rows .= '<form action="" method="post">';
                $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
                $show_rows .= '<input type="hidden" name="package_ID" value="'.$p_row[0].'">';
                $show_rows .= '<input type="submit" name="submit" value="edit">';
                $show_rows .= '</form>';
                $show_rows .= '</div>';
                
                //close flex card/grid card
                $show_rows .= '</div>';
            }
        }
    }
    if($submit!=='edit'&&$submit!=='add a new card!'&&$submit!=='delete'&&$submit!=='add'){
        //add the always present add new package div
        $show_rows .= '<div class="grid-card flex-card">';
        $show_rows .= '<div class="flex-item">';
        $show_rows .= '<form action="" method="post">';
        $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
        $show_rows .= '<input type="submit" name="submit" value="add a new card!">';
        $show_rows .= '</form>';
        $show_rows .= '</div>';
        $show_rows .= '</div>';
        //this is the end of the add new package div
    }
    if($submit==='edit'||$submit==='delete'||$submit==='add'){
        foreach($p_rows as $p_row){
            if($p_row['package_ID']===$package_ID){

                //show the card as a form to be edited
                $show_rows .= '<div class="grid-card flex-card">';
                $show_rows .= '<div class="flex-item-top">';
                $show_rows .= '<h1><input type="text" name="package_name" value="'.$p_row[1].'"></h1>';
                $show_rows .= '<h2><input type="text" name="package_price" value="'.$p_row[2].'"></h2>';
                $show_rows .= '</div>';
                $show_rows .= '<p>Package features</p>';
                $show_rows .= '<div class="flex-item">';
                $show_rows .= '';

                foreach($pf_rows as $pf_row){
                    if($pf_row['package_ID'] === $p_row['package_ID']){
                        $show_rows .= '<form action="" method="post">';
                        $show_rows .= '<input type="text" name="package_feature_name" value="'.$pf_row[1].'">';
                        $show_rows .= '<input type="hidden" name="package_feature_ID" value="'.$pf_row[0].'">';
                        $show_rows .= '<input type="hidden" name="package_ID" value="'.$pf_row[3].'">';
                        $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
                        $show_rows .= '<input type="hidden" name="db_action" value="pf">';
                        $show_rows .= '<input type="submit" name="submit" value="edit">';
                        $show_rows .= '<input type="submit" name="submit" value="delete">';
                        $show_rows .= '</form>';
                    }
                }
                //add a new package feature row
                $show_rows .= '<form action="" method="post">';
                $show_rows .= '<input type="text" name="package_feature_name" value="">';
                $show_rows .= '<input type="hidden" name="package_ID" value="'.$package_ID.'">';
                $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
                $show_rows .= '<input type="hidden" name="db_action" value="pf">';
                $show_rows .= '<input type="submit" name="submit" value="add">';
                $show_rows .= '</form>';
                //end new package feature row
                        
                $show_rows .= '';
                $show_rows .= '</div>';

                $show_rows .= '<div class="pf">';
                $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
                $show_rows .= '<input type="hidden" name="package_ID" value="'.$package_ID.'">';
                $show_rows .= '<input type="submit" name="submit" value="change">';
                $show_rows .= '</div>';
                
                //close flex card/grid card
                $show_rows .= '</div>';
            }
        }
    }

    $show_rows .= '</div>';
    $show_rows .= '</div>';
    $show_rows .= '</div>';

    $back_button ='<form action="" method="post">
                    <input type="hidden" name="typeofservice" value="packages">
                    <input type="submit" name="submit" value="back">
                    </form>';
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
    <!-- Sidebar -->
    <div class="sidebar w3-light-grey w3-bar-block">
        <h3><a href="admin.php" class="w3-bar-item w3-button">Menu</a></h3>
        <a href="#" class="w3-bar-item w3-button selected">Services</a>
        <a href="editportfolio.php" class="w3-bar-item w3-button">Portfolio</a>
        <a href="reporting.php" class="w3-bar-item w3-button">Reporting</a>
        <a href="../inc/logout.php" class="w3-bar-item w3-button">Logout</a>
        <a href="changepassword.php" class="w3-bar-item w3-button">Change Password</a>
    </div>

    <!-- Page Content -->
    <div class="content">
        <div class="w3-container w3-teal">
            <h1>Edit Services</h1>
        </div>
        <h3>This page can be used to edit the available services</h3>
        <h4>Please choose which type of service you would like to edit</h4>
        <?php echo $form_field1;
        if($typeofservice==="packages"&&($submit==="edit"||$submit==="delete"||$submit==="add")){echo $back_button;}
        if($typeofservice==="add-on"||$typeofservice==="a_la_carte"||$typeofservice==="packages"){ echo $show_rows; }?>
        </br>
        <?php if($submit==='edit'&&$typeofservice!=="packages"){ echo $form_field3; }?>
        

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
