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
$show_rows .= '<div class="w3-center">';
$show_rows .= '<h2>Fill out the form with desired service(s) and contact information</h2>';
$show_rows .= '</div>';
$show_rows .= '<form action="test.php" method="post">';
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
        $show_rows .= '<input type="radio" name="package_sel" value="'.$p_row["package_ID"].'">';
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
$rv=-1;
foreach($addon_rows as $addon_row){
	//$rv+=1;
    $show_rows .= '<tr>';
    $show_rows .= '<td><input type="checkbox" name="addons[]" value="'.$addon_row['addon_name'].'"></td>';
    $show_rows .= '<td>'.$addon_row['addon_name'].'</td><td>'.$addon_row['addon_price'].'</td>';
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
    $show_rows .= '<td><input type="checkbox" name="alacartez[]" value="'.$alc_row['a_la_carte_name'].'"></td>';
    $show_rows .= '<td>'.$alc_row['a_la_carte_name'].'</td><td>'.$alc_row['a_la_carte_price'].'</td>';
    $show_rows .= '</tr>';
}
$show_rows .= '</table>';

//close grid-box for a la carte
$show_rows .= '</div>';

//close grid-wrapper for addons and a la carte
$show_rows .= '</div>';

$show_rows .= '<div class="grid-box w3-padding-large">
<p>Contact Information</p>
<label for="email">Email</label>
<input class="w3-input w3-border w3-margin" type="text" name="email" placeholder="johnapplessed@gmail.com" required>
<label for="phone">Phone Number</label>
<input class="w3-input w3-border w3-margin" type="tel" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
<label for="date">Prefered Service Date (subject to availability)</label>
<input class="w3-input w3-border w3-margin" type="date" name="date" min="'.date("Y-m-d").'"placeholder="Prefered Date of service" required>
<label for="address1">Address Line 1</label>
<input class="w3-input w3-border w3-margin" type="text" name="address1" placeholder="Service Address line 1*" required>
<label for="address2">Address Line 2</label>
<input class="w3-input w3-border w3-margin" type="text" name="address2" placeholder="Service Address line 2*">
<label for="city">City</label>
<input class="w3-input w3-border w3-margin" type="text" name="city" placeholder="Service city*" required>
<label for="state">State</label>

<select class="w3-input w3-border w3-margin" name="state" placeholder="Service state*" required>
    <option hidden disabled selected value> -- select an option -- </option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>				

<label for="zip">Zipcode</label>
<input class="w3-input w3-border w3-margin" type="number" name="zip" placeholder="Service Zipcode*" required>
</div>
<input type="submit" name="submit" class="w3-button w3-block w3-dark-grey w3-padding-16 w3-section w3-right">
<button class="w3-button w3-red w3-section" onclick="document.getElementById(\'ticketModal\').style.display=\'none\'">Cancel <i class="fa fa-remove"></i></button>
</form>';

//end of addons being displayed

//close wrap
$show_rows .= '</div>';

echo $show_rows;
?>