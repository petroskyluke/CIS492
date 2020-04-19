<?php
$to = "petroskyluke@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: @lukepiano13@gmail.com" . "\r\n" .
"CC: pet5239@calu.edu";

mail($to,$subject,$txt,$headers);
?>