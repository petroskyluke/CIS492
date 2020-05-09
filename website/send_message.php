<?php

require('inc/db_connect.php');

$name=filter_input(INPUT_POST,'Name');
$phone=filter_input(INPUT_POST,'Phone');
$email=filter_input(INPUT_POST,'Email');
$message=filter_input(INPUT_POST,'Message');


//create variables to pass to send_email.php
$recipient = 'hydrohawkllc@gmail.com';
$subject = 'New message from '.$email;
$bodyText = 'Hydro Hawk Message!\r\nA new message has been sent from '.$name.
            ' on hydrohawkllc.com with the following information\n
            Name: '.$name.'\n
            Phone number: '.$phone.'\n
            Email: '.$email.'\n
            Message:\n'.$message;
            
$bodyHtml = '<h1>Hydro Hawk Message!</h1>
            <p>A new message has been sent from <strong>'.$name.'</strong> on hydrohawkllc.com with the following information</p>
            <div style="border:1px solid black;padding: 1em;margin-bottom:5px;">
            <h2>Contact Information:</h2>
            <p>Name: '.$name.'</p>
            <p>Email: '.'<a href=mailto:'.$email.'?subject=Hydro%20Hawk%20Photography>'.$email.'</a></p>
            <p>Phone number:'.$phone.'</p>
            <div style="border:1px solid black;padding: 1em;margin-bottom:5px;">
            <p>Message:</p>
            <p>'.$message.'</p>
            </div>
            </div>
            </br></br>
            <p>This email was sent through the
            <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
            interface using the <a href="https://github.com/PHPMailer/PHPMailer">
            PHPMailer</a> class.</p>';

include "send_email.php";
include "confirmation.php";
?>
