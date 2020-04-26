<?php
//Get all
$query = 'SELECT * FROM order_form
          ORDER BY city';
$statement = $db1->prepare($query);
$statement->execute();
$orders= $statement->fetchAll();
$statement->closeCursor();

$search=filter_input(INPUT_POST,'search');
$selected_report=$_POST['report'];

//start table and add headers
$show_rows = '<table><tr><th>City</th><th>Address</th><th>State</th><th>Zip</th>';

foreach($orders as $order){
    if(!empty($orders)&&$search==null||$search==''){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$order['city'].'</td>
                        <td>'.$order['address1'].' '.$order['address2'].'</td>
                        <td>'.$order['province_state'].'</td>
                        <td>'.$order['zip_code'].'</td>';
        $show_rows .= '</form></tr>';
        $show_rows .= "<input type='hidden' value='$search' name='search'/>";
        $show_rows .= "<input type='hidden' value='$selected_report' name='reportselected'/>";
    }
    elseif(!empty($orders)&&$search==$order['city']){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$order['city'].'</td>
                        <td>'.$order['address1'].' '.$order['address2'].'</td>
                        <td>'.$order['province_state'].'</td>
                        <td>'.$order['zip_code'].'</td>';
        $show_rows .= '</form></tr>';
        $show_rows .= "<input type='hidden' value='$search' name='search'/>";
        $show_rows .= "<input type='hidden' value='$selected_report' name='reportselected'/>";
    }
}
echo $show_rows;

?>