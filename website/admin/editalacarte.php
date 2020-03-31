<?php
//delete an a-la-carte row query
if(filter_input(INPUT_POST,'submit') === 'delete'){
    $alter = $db1->prepare('DELETE FROM a_la_carte
                            WHERE a_la_carte_ID = :alct_ID');
    $alter->bindParam(':alct_ID', $alct_ID);
    $alter->execute();
}
//edit an a-la-carte row query
if(filter_input(INPUT_POST,'submit') === 'change'){
    $alter = $db1->prepare('UPDATE a_la_carte
                            SET a_la_carte_name = :alct_name, a_la_carte_price = :alct_price, a_la_carte_desc = :alct_description
                            WHERE a_la_carte_ID = :alct_ID');
    $alter->bindParam(':alct_ID', $alct_ID);
    $alter->bindParam(':alct_name', $alct_name);
    $alter->bindParam(':alct_price', $alct_price);
    $alter->bindParam(':alct_description', $alct_description);
    $alter->execute();
}
//add an a-la-carte row query
if(filter_input(INPUT_POST, 'submit') === 'add'){
    
    $insert = $db1->prepare('INSERT INTO a_la_carte (a_la_carte_name, a_la_carte_price, a_la_carte_desc) VALUES
    (:alct_name, :alct_price, :alct_description)');
    $insert->bindParam(':alct_name', $alct_name);
    $insert->bindParam(':alct_price', $alct_price);
    $insert->bindParam(':alct_description', $alct_description);
    $insert->execute();
}
//display all a-la-carte rows
$query = 'SELECT a_la_carte_ID, a_la_carte_name, a_la_carte_price, a_la_carte_desc
            FROM a_la_carte';
$statement = $db1->prepare($query);
$statement->execute();
$rows = $statement->fetchAll();
$statement->closeCursor();

$show_rows = '';
//start table and add headers
$show_rows .= '<table><tr><th>ID</th><th>a la carte name</th><th>a la carte price</th><th>a la carte description</th></tr>';
if(!empty($rows)){
    foreach($rows as $row){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$row['a_la_carte_ID'].'</td>
                        <td>'.$row['a_la_carte_name'].'</td>
                        <td>'.$row['a_la_carte_price'].'</td>
                        <td>'.$row['a_la_carte_desc'].'</td>
                        <td><input type="submit" name="submit" class="edit" value="edit"></td>
                        <td><input type="submit" name="submit" value="delete" class="delete" id="delete_btn"></td>

                        <input type="hidden" name="typeofservice" value="a_la_carte">
                        <input type="hidden" name="alct_ID" value="'.$row['a_la_carte_ID'].'">
                        <input type="hidden" name="alct_name" value="'.$row['a_la_carte_name'].'">
                        <input type="hidden" name="alct_price" value="'.$row['a_la_carte_price'].'">
                        <input type="hidden" name="alct_description" value="'.$row['a_la_carte_desc'].'">';
        $show_rows .= '</form></tr>';
    }
}
//this adds insert row to the showrows string
$show_rows .='<tr><form action="" method="post">
                    <td>ID<input type="hidden" name="typeofservice" value="a_la_carte"></td>
                    <td><input type="text" name="alct_name"></td>
                    <td><input type="text" name="alct_price"></td>
                    <td><input type="text" name="alct_description"></td>
                    <td><input type="submit" name="submit" class="add" value="add"></td>
                    </form>
                </tr>';
$show_rows .= '</table>';


if(filter_input(INPUT_POST,'submit') === 'edit'){
    $form_field3 = '';
    $addon_ID = filter_input(INPUT_POST, 'addon_ID');
    //start table and add headers
    $form_field3 .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
    foreach($rows as $row){
        if($row['a_la_carte_ID'] === $alct_ID){
            $form_field3 .= '<tr><form action="" method="post">';
            $form_field3 .= '<td>'.$row['a_la_carte_ID'].'</td>
                        <td><input type="text" name="alct_name" value="'.$row['a_la_carte_name'].'"></td>
                        <td><input type="text" name="alct_price" value="'.$row['a_la_carte_price'].'"></td>
                        <td><input type="text" name="alct_description" value="'.$row['a_la_carte_desc'].'"></td>
                        <td>
                        <input type="submit" name="submit" value="change">
                        <input type="hidden" name="typeofservice" value="a_la_carte">
                        <input type="hidden" name="alct_ID" value="'.$row['a_la_carte_ID'].'">
                        </td>';
            $form_field3 .= '</form></tr>';
        }
        
    }
    $form_field3 .= '</table>';
}
?>