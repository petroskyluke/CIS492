<?php

//Get all

$query = 'SELECT * FROM order_form
          ORDER BY city';
$statement = $db1->prepare($query);
$statement->execute();
$orders= $statement->fetchAll();
$statement->closeCursor();

$show_rows = '';
//start table and add headers
$show_rows .= '<table><tr><th>City</th><th>Address</th><th>State</th><th>Zip</th>';
if(!empty($orders)){
    foreach($orders as $order){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$order['city'].'</td>
                        <td>'.$order['address1'].' '.$order['address2'].'</td>
                        <td>'.$order['province_state'].'</td>
                        <td>'.$order['zip_code'].'</td>';
        $show_rows .= '</form></tr>';
    }
}

$search ='<form action="reporting.php" method="post">
                <input type="hidden" name="typeofservice" value="packages">
                <input type="text" name="search" value="">
                <input type="submit" name="submit" value="Search">
                </form>';
//$form_field2="yay";
?>