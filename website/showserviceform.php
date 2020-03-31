<?php

include_once 'inc/db_connect.php';

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

//display all addon rows
$addon_query = 'SELECT addon_ID, addon_name, addon_price, addon_description
            FROM add_ons';
$addon_statement = $db1->prepare($addon_query);
$addon_statement->execute();
$addon_rows = $addon_statement->fetchAll();
$addon_statement->closeCursor();

//display all a-la-carte rows
$alc_query = 'SELECT a_la_carte_ID, a_la_carte_name, a_la_carte_price, a_la_carte_desc
            FROM a_la_carte';
$alc_statement = $db1->prepare($alc_query);
$alc_statement->execute();
$alc_rows = $alc_statement->fetchAll();
$alc_statement->closeCursor();




//start html
$show_rows = '<div class="wrap">';
$show_rows .= '<form action="" method="post">';
$show_rows .= '<div class="grid-box">';
$show_rows .= '<div class="grid-wrapper">';

//display all the packages and the package features pulled from the database
if(!empty($p_rows)){
    foreach($p_rows as $p_row){
        $show_rows .= '<div class="grid-card flex-card">';
        $show_rows .= '<div class="flex-item-top">';
        $show_rows .= '<h1>'.$p_row[1].'</h1>';
        $show_rows .= '<h2>'.$p_row[2].'</h2>';
        $show_rows .= '</div>';
        $show_rows .= '<div class="flex-item">';
        $show_rows .= '<ul>';
        foreach($pf_rows as $pf_row){
            if($pf_row['package_ID'] === $p_row['package_ID']){
                $show_rows .= '<li>'.$pf_row[1].'</li>';
            }
        }
        $show_rows .= '</ul>';
        $show_rows .= '</div>';
        
        $show_rows .= '<label class="btn-container">';
        $show_rows .= '<div class="">';
        $show_rows .= '<input type="radio" name="package_sel" value="pppp">';
        $show_rows .= '<span class="checkmark flex-col"></span>';
        $show_rows .= '</div>';
        $show_rows .= '</label>';

        //close flex card/grid card
        $show_rows .= '</div>';
    }
}

//close grid-wrapper
$show_rows .= '</div>';

//close grid-box
$show_rows .= '</div>';

//this is the end of the packages being displayed

//start displaying addons and a la carte
$show_rows .= '<div class="grid-wrapper">';

$show_rows .= '<div class="grid-box">';

$show_rows .= '<table>';
$show_rows .= '<p>Add On:</p>';
foreach($addon_rows as $addon_row){
    $show_rows .= '<tr>';
    $show_rows .= '<td><input type="checkbox" name="addons" value="'.$addon_row['addon_name'].'"></td>';
    $show_rows .= '<td>'.$addon_row['addon_name'].' $'.$addon_row['addon_price'].'</td>';
    $show_rows .= '</tr>';
}
$show_rows .= '</table>';

//close grid-box for a la carte
$show_rows .= '</div>';

$show_rows .= '<div class="grid-box">';

$show_rows .= '<table>';
$show_rows .= '<p>A LA Carte:</p>';
foreach($alc_rows as $alc_row){
    $show_rows .= '<tr>';
    $show_rows .= '<td><input type="checkbox" name="alacartez" value="'.$alc_row['a_la_carte_name'].'"></td>';
    $show_rows .= '<td>'.$alc_row['a_la_carte_name'].' $'.$alc_row['a_la_carte_price'].'</td>';
    $show_rows .= '</tr>';
}
$show_rows .= '</table>';

//close grid-box for a la carte
$show_rows .= '</div>';

//close grid-wrapper for addons and a la carte
$show_rows .= '</div>';

$show_rows .= '<div class="grid-box">
<input class="w3-input w3-border" type="text" placeholder="Email*" required></br>
<input class="w3-input w3-border" type="text" placeholder="Phone #*" required></br>
<input class="w3-input w3-border" type="text" placeholder="Date/Date Range*" required></br>
<input class="w3-input w3-border" type="text" placeholder="Service Address*" required>
</div>
<input type="submit" name="submit" class="w3-button w3-block w3-dark-grey w3-padding-16 w3-section w3-right">
<button class="w3-button w3-red w3-section" onclick="document.getElementById(\'ticketModal\').style.display=\'none\'">Cancel <i class="fa fa-remove"></i></button>
</form>';

//end of addons being displayed

//close wrap
$show_rows .= '</div>';

echo $show_rows;
?>