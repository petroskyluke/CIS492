<?php
//create a new package card!
if($submit==='add a new card!'){
    $insert = $db1->prepare('INSERT INTO packages (package_name, package_price) VALUES
                            ("name", "price")');
    $insert->execute();
}

//delete a package card and its package features
if($submit==='delete'&&$db_action==='p'){
    //must delete all package features associated with package first
    $delete_pf = $db1->prepare('DELETE FROM package_features
                            WHERE package_ID = :package_ID');
    $delete_pf->bindParam(':package_ID', $package_ID);
    $delete_pf->execute();

    //once package features are removed, delete package
    $delete_p = $db1->prepare('DELETE FROM packages
                            WHERE package_ID = :package_ID');
    $delete_p->bindParam(':package_ID', $package_ID);
    $delete_p->execute();
}

if($submit==="change name/price"){
    $alter = $db1->prepare('UPDATE packages
                            SET package_name = :package_name, package_price = :package_price
                            WHERE package_ID = :package_ID');
    $alter->bindParam(':package_ID', $package_ID);
    $alter->bindParam(':package_name', $package_name);
    $alter->bindParam(':package_price', $package_price);
    $alter->execute();
}

//delete package feature
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

//display all the packages and the package features pulled from the database
if(($submit!=='edit'&&$submit!=='delete'&&$submit!=='add'&&$submit!=='change name/price')||($db_action==='p'&&$submit==='delete')){
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
            $show_rows .= '<input type="hidden" name="db_action" value="p">';
            $show_rows .= '<input type="submit" name="submit" class="edit" value="edit">';
            $show_rows .= '<input type="submit" name="submit" value="delete" class="delete" onclick="return confirm(\'are you sure you want to delete package:'.$p_row['package_name'].'?\');">';
            $show_rows .= '</form>';
            $show_rows .= '</div>';
            
            //close flex card/grid card
            $show_rows .= '</div>';
        }
    }
    //add the always present add new package div
    $show_rows .= '<div class="grid-card flex-card">';
    $show_rows .= '<div class="flex-item">';
    $show_rows .= '<form action="" method="post">';
    $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
    $show_rows .= '<input type="submit" name="submit" class="add" value="add a new card!">';
    $show_rows .= '</form>';
    $show_rows .= '</div>';
    $show_rows .= '</div>';
    //this is the end of the add new package div
}
//edit the package 
if(($submit==='edit'||$submit==='delete'||$submit==='add'||$submit==='change name/price')&&!($db_action==='p'&&$submit==='delete')){
    foreach($p_rows as $p_row){
        if($p_row['package_ID']===$package_ID){

            //show the card as a form to be edited
            $show_rows .= '<div class="grid-card flex-card">';
            $show_rows .= '<div class="flex-item-top">';
            $show_rows .= '<form action="" method="post">';
            $show_rows .= '<h1><input type="text" name="package_name" value="'.$p_row[1].'"></h1>';
            $show_rows .= '<h2><input type="text" name="package_price" value="'.$p_row[2].'"></h2>';
            $show_rows .= '<input type="submit" name="submit" value="change name/price">';
            $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
            $show_rows .= '<input type="hidden" name="package_ID" value="'.$p_row[0].'">';
            $show_rows .= '</form>';
            $show_rows .= '</div>';
            $show_rows .= '<p>Package features</p>';
            $show_rows .= '<div class="flex-item">';

            foreach($pf_rows as $pf_row){
                if($pf_row['package_ID'] === $p_row['package_ID']){
                    $show_rows .= '<form action="" method="post">';
                    $show_rows .= '<input type="text" name="package_feature_name" value="'.$pf_row[1].'">';
                    $show_rows .= '<input type="hidden" name="package_feature_ID" value="'.$pf_row[0].'">';
                    $show_rows .= '<input type="hidden" name="package_ID" value="'.$pf_row[3].'">';
                    $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
                    $show_rows .= '<input type="hidden" name="db_action" value="pf">';
                    $show_rows .= '<input type="submit" name="submit" class="edit" value="edit">';
                    $show_rows .= '<input type="submit" name="submit" class="delete" value="delete">';
                    $show_rows .= '</form>';
                }
            }
            //add a new package feature row
            $show_rows .= '<form action="" method="post">';
            $show_rows .= '<input type="text" name="package_feature_name" value="">';
            $show_rows .= '<input type="hidden" name="package_ID" value="'.$package_ID.'">';
            $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
            $show_rows .= '<input type="hidden" name="db_action" value="pf">';
            $show_rows .= '<input type="submit" name="submit" class="add" value="add">';
            $show_rows .= '</form>';
            //end new package feature row
                    
            $show_rows .= '';
            $show_rows .= '</div>';

            $show_rows .= '<div class="pf">';
            $show_rows .= '<input type="hidden" name="typeofservice" value="packages">';
            $show_rows .= '<input type="hidden" name="package_ID" value="'.$package_ID.'">';
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
?>