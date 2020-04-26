<?php
//Get all
$query = 'SELECT * FROM order_form
          ORDER BY package_chosen';
$statement = $db1->prepare($query);
$statement->execute();
$orders= $statement->fetchAll();
$statement->closeCursor();

$search=filter_input(INPUT_POST,'search');
$selected_report=$_POST['report'];

//start table and add headers
$show_rows = '<table><tr><th>Package</th><th>Add-Ons</th><th>Carte Items</th><th>Phone</th>
                <th>Date</th><th>Address</th><th>City</th></tr>';

foreach($orders as $order){
    if((!empty($orders))&&($search==null || $search=='')){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$order['package_chosen'].'</td>
                        <td>'.$order['addon_boxes_selected'].'</td>
                        <td>'.$order['a_la_carte_boxes_selected'].'</td>
                        <td>'.$order['phone'].'</td>
                        <td>'.$order['requested_date'].'</td>
                        <td>'.$order['address1'].' '.$order['address2'].'</td>
                        <td>'.$order['city'].'</td>';
        $show_rows .= '</form></tr>';
        $show_rows .= "<input type='hidden' value='$search' name='search'/>";
        $show_rows .= "<input type='hidden' value='$selected_report' name='reportselected'/>";

    }
    elseif((!empty($orders))&&($search==$order['package_chosen'])){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$order['package_chosen'].'</td>
                        <td>'.$order['addon_boxes_selected'].'</td>
                        <td>'.$order['a_la_carte_boxes_selected'].'</td>
                        <td>'.$order['phone'].'</td>
                        <td>'.$order['requested_date'].'</td>
                        <td>'.$order['address1'].' '.$order['address2'].'</td>
                        <td>'.$order['city'].'</td>';
        $show_rows .= '</form></tr>';
        $show_rows .= "<input type='hidden' value='$search' name='search'/>";
        $show_rows .= "<input type='hidden' value='$selected_report' name='reportselected'/>";

    }
}
echo $show_rows;

?>
