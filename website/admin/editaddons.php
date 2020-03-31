<?php
//delete an addon row
if($submit === 'delete'){
    $alter = $db1->prepare('DELETE FROM add_ons
                            WHERE addon_ID = :addon_ID');
    $alter->bindParam(':addon_ID', $addon_ID);
    $alter->execute();
}
//edit an addon row
if($submit === 'change'){
    $alter = $db1->prepare('UPDATE add_ons
                            SET addon_name = :addon_name, addon_price = :addon_price, addon_description = :addon_description
                            WHERE addon_ID = :addon_ID');
    $alter->bindParam(':addon_ID', $addon_ID);
    $alter->bindParam(':addon_name', $addon_name);
    $alter->bindParam(':addon_price', $addon_price);
    $alter->bindParam(':addon_description', $addon_description);
    $alter->execute();
}
//add an addon row
if($submit === 'add'){
    $addon_name = filter_input(INPUT_POST, 'addon_name');
    $addon_price = filter_input(INPUT_POST, 'addon_price');
    $addon_description = filter_input(INPUT_POST, 'addon_description');

    $insert = $db1->prepare('INSERT INTO add_ons (addon_name, addon_price, addon_description) VALUES
    (:addon_name, :addon_price, :addon_description)');
    $insert->bindParam(':addon_name', $addon_name);
    $insert->bindParam(':addon_price', $addon_price);
    $insert->bindParam(':addon_description', $addon_description);
    $insert->execute();

}
//display all addon rows
$query = 'SELECT addon_ID, addon_name, addon_price, addon_description
            FROM add_ons';
$statement = $db1->prepare($query);
$statement->execute();
$rows = $statement->fetchAll();
$statement->closeCursor();

$show_rows = '';
//start table and add headers
$show_rows .= '<table><tr><th>ID</th><th>add-on name</th><th>add-on price</th><th>add-on description</th></tr>';
if(!empty($rows)){
    foreach($rows as $row){
        $show_rows .= '<tr><form action="" method="post">';
        $show_rows .= '<td>'.$row['addon_ID'].'</td>
                        <td>'.$row['addon_name'].'</td>
                        <td>'.$row['addon_price'].'</td>
                        <td>'.$row['addon_description'].'</td>
                        <td><input type="submit" name="submit" class="edit" value="edit"></td>
                        <td><input type="submit" name="submit" value="delete" class="delete" id="delete_btn"></td>

                        <input type="hidden" name="typeofservice" value="add-on">
                        <input type="hidden" name="addon_ID" value="'.$row['addon_ID'].'">
                        <input type="hidden" name="addon_name" value="'.$row['addon_name'].'">
                        <input type="hidden" name="addon_price" value="'.$row['addon_price'].'">
                        <input type="hidden" name="addon_description" value="'.$row['addon_description'].'">';
        $show_rows .= '</form></tr>';
    }
}

//this adds the row to add a new row of data into the addon table
$show_rows .='<tr><form action="" method="post">
                    <td>ID<input type="hidden" name="typeofservice" value="add-on"></td>
                    <td><input type="text" name="addon_name"></td>
                    <td><input type="text" name="addon_price"></td>
                    <td><input type="text" name="addon_description"></td>
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
        if($row['addon_ID'] === $addon_ID){
            $form_field3 .= '<tr><form action="" method="post">';
            $form_field3 .= '<td>'.$row['addon_ID'].'</td>
                        <td><input type="text" name="addon_name" value="'.$row['addon_name'].'"></td>
                        <td><input type="text" name="addon_price" value="'.$row['addon_price'].'"></td>
                        <td><input type="text" name="addon_description" value="'.$row['addon_description'].'"></td>
                        <td>
                        <input type="submit" name="submit" value="change">
                        <input type="hidden" name="typeofservice" value="add-on">
                        <input type="hidden" name="addon_ID" value="'.$row['addon_ID'].'">
                        </td>';
            $form_field3 .= '</form></tr>';
        }
        
    }
    $form_field3 .= '</table>';
}
?>