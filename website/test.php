<?php

$package=filter_input(INPUT_POST,'package_sel');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$date=filter_input(INPUT_POST,'date');
$address1=filter_input(INPUT_POST,'address1');
$address2=filter_input(INPUT_POST,'address2');
$city=filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$zip=filter_input(INPUT_POST,'zip');

echo $package;echo nl2br ("\n");

foreach($_POST['addons'] as $item){
    echo $item;echo nl2br("\n");
}
foreach($_POST['alacartez'] as $ala){
    echo $ala;echo nl2br("\n");
}




echo $email;echo nl2br ("\n");

echo $phone;echo nl2br ("\n");

echo $date;echo nl2br ("\n");

echo $address1;echo nl2br ("\n");

echo $address2;echo nl2br ("\n");

echo $city;echo nl2br ("\n");

echo $state;echo nl2br ("\n");

echo $zip;echo nl2br ("\n");

?>
