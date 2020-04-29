<?php

require('inc/db_connect.php');

$package=filter_input(INPUT_POST,'package_sel');
$firstname=filter_input(INPUT_POST,'firstname');
$lastname=filter_input(INPUT_POST,'lastname');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$requested_date=filter_input(INPUT_POST,'date');
$address1=filter_input(INPUT_POST,'address1');
$address2=filter_input(INPUT_POST,'address2');
$city=filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$zip=filter_input(INPUT_POST,'zip');
$add_on = implode(', ',$_POST['addons']);
$ala_carte = implode(', ',$_POST['alacartez']);
$add_on_arr=filter_input(INPUT_POST,'addons');
$ala_carte_arr=filter_input(INPUT_POST,'alacartez');


if($package == null || $email == null || $phone == null ||
    $requested_date == null || $address1 == null || $city == null ||
    $state == null || $zip == null){
    $error = "Invalid data. Check all fields and try again.";
    echo $error;
    header("Location:index.php");
}

else{
    //Add to database
    $insertOrder = 'INSERT INTO order_form
                    (package_chosen, first_name, last_name, addon_boxes_selected, a_la_carte_boxes_selected, 
                    email, phone, requested_date, address1, address2, city, province_state, zip_code)
                    VALUES
                    (:package, :firstname, :lastname, :add_on, :ala_carte, :email, :phone, :requested_date, 
                    :address1, :address2, :city, :state, :zip)';
    $statement1 = $db1->prepare($insertOrder);
    $statement1->bindValue(':package', $package);
    $statement1->bindValue(':firstname', $firstname);
    $statement1->bindValue(':lastname', $lastname);
    $statement1->bindValue(':add_on', $add_on);
    $statement1->bindValue(':ala_carte', $ala_carte);
    $statement1->bindValue(':email', $email);
    $statement1->bindValue(':phone', $phone);
    $statement1->bindValue(':requested_date', $requested_date);
    $statement1->bindValue(':address1', $address1);
    $statement1->bindValue(':address2', $address2);
    $statement1->bindValue(':city', $city);
    $statement1->bindValue(':state', $state);
    $statement1->bindValue(':zip', $zip);
    $statement1->execute();
    $statement1->closeCursor();
}

//query package and package features for email
//query all packages
$p_query = 'SELECT package_ID, package_name, package_price
            FROM packages
            WHERE package_ID = :package_ID';
$p_statement = $db1->prepare($p_query);
$p_statement->bindValue(':package_ID', $package);
$p_statement->execute();
$p_rows = $p_statement->fetchAll();
$p_statement->closeCursor();

//query all package features including their package_ID
$pf_query = 'SELECT package_features.package_feature_ID, package_features.package_feature_name, 
                    package_features.package_feature_desc, package_features.package_ID
            FROM packages, package_features
            WHERE packages.package_ID = package_features.package_ID
            AND packages.package_ID = :package_ID';
$pf_statement = $db1->prepare($pf_query);
$pf_statement->bindValue(':package_ID', $package);
$pf_statement->execute();
$pf_rows = $pf_statement->fetchAll();
$pf_statement->closeCursor();
//create package to be displayed
if(!empty($p_rows)){
    foreach($p_rows as $p_row){
        $show_package = '<div style="
        border-radius: 1em;
        padding: 1em;
        background-color: #f5f4f3;
        border: solid 2px #808080;
        max-width: 250px;
        justify-content: center;
        flex-direction: column;">';
        $show_package .= '<div style="
        text-align: center;
        margin-left: auto;
        margin-right: auto;">';
        $show_package .= '<h1>'.$p_row[1].'</h1>';
        $show_package .= '<h2>'.$p_row[2].'</h2>';
        $show_package .= '</div>';
        $show_package .= '<div style="
        flex: 1;
        text-align: left;
        margin-left: auto;
        margin-right: auto;">';
        $show_package .= '<ul>';
        foreach($pf_rows as $pf_row){
            if($pf_row['package_ID'] === $p_row['package_ID']){
                $show_package .= '<li>'.$pf_row[1].'</li>';
            }
        }
        $show_package .= '</ul>';
        $show_package .= '</div>';

        //close flex card/grid card
        $show_package .= '</div>';
    }
}

//create variables to pass to send_email.php
$senderName = $email;
$recipient = 'pet5239@calu.edu';
$subject = 'New Service Request From '.$email;
$bodyText = 'Hydro Hawk Service Request!\r\nA new request for service has been submitted on hydrohawk.com with the following information\n
            package selection: '.$package.
            '\nadd-on selection(s): '.$add_on.
            '\na la carte selection(s): '.$ala_carte.
            '\nemail address: '.$email.
            '\nphone number: '.$phone.
            '\nprefered/requested date: '.$requested_date.
            '\naddress line 1: '.$address1.
            '\naddress line 2: '.$address2.
            '\ncity: '.$city.
            '\nstate: '.$state.
            '\nzip code: '.$zip.
$bodyHtml = '<h1>Hydro Hawk Service Request!</h1>
            <p>A new request for service has been submitted on hydrohawk.com with the following information</p>
            <div style="border:1px solid black;padding: 1em;margin-bottom:5px;">
            <h2>Contact Information:</h2>
            <p>Email: '.'<a href=mailto:'.$email.'?subject="Hydro Hawk">'.$email.'</a></p>
            <p>Phone number:'.$phone.'</p>
            <p>Requested/Prefered date:'.$requested_date.'</p>
            <p>Address line 1: '.$address1.'</p>
            <p>Address line 2: '.$address2.'</p>
            <p>City: '.$city.'</p>
            <p>State: '.$state.'</p>
            <p>Zipcode: '.$zip.'</p>
            </div>
            <div style="border: 1px solid black;">
            <h2>Order Information</h2>
            <p>Package selection: '.$package.'</p>
            '.$show_package.'
            <p>Add-on selection: '.$add_on.'</p>
            <p>A la carte selection: '.$ala_carte.'</p>
            </div>
            </br></br>
            <p>This email was sent through the
            <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
            interface using the <a href="https://github.com/PHPMailer/PHPMailer">
            PHPMailer</a> class.</p>';

include "send_email.php";
include "confirmation.php";
?>
