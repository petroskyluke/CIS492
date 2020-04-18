<?php

require('inc/db_connect.php');

$package=filter_input(INPUT_POST,'package_sel');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$requested_date=filter_input(INPUT_POST,'date');
$address1=filter_input(INPUT_POST,'address1');
$address2=filter_input(INPUT_POST,'address2');
$city=filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$zip=filter_input(INPUT_POST,'zip');
$add_on = implode(',',$_POST['addons']);
$ala_carte = implode(',',$_POST['alacartez']);


if($package == null || $email == null || $phone == null ||
    $requested_date == null || $address1 == null || $city == null ||
    $state == null || $zip == null){
    $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else{
    //Add to database
    $insertOrder = 'INSERT INTO order_form
                    (package_chosen, addon_boxes_selected, a_la_carte_boxes_selected, email, phone, 
                    requested_date, address1, address2, city, province_state, zip_code)
                    VALUES
                    (:package, :add_on, :ala_carte, :email, :phone, :requested_date, :address1, :address2, :city, :state, :zip)';
    $statement1 = $db1->prepare($insertOrder);
    $statement1->bindValue(':package', $package);
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
    echo "ツ";echo nl2br("\n");
}




echo $package;echo nl2br ("\n");
foreach($_POST['addons'] as $item){
    echo $item;echo nl2br("\n");
}
foreach($_POST['alacartez'] as $ala){
    echo $ala;echo nl2br("\n");
}
echo $email;echo nl2br ("\n");
echo $phone;echo nl2br ("\n");
echo $requested_date;echo nl2br ("\n");
echo $address1;echo nl2br ("\n");
echo $address2;echo nl2br ("\n");
echo $city;echo nl2br ("\n");
echo $state;echo nl2br ("\n");
echo $zip;echo nl2br ("\n");
echo $add_on;echo nl2br("\n");
echo $ala_carte;echo nl2br("\n");
?>
