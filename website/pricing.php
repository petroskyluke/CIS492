<div class="w3-white" id="pricing">
    <!-- The Pricing Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:1000px">
            <h2 class="w3-wide">PRICING</h2>
            <p class="w3-opacity"><i>These are some prices filler text.</i></p>

                <?php
                //query all packages
                    $p_query = 'SELECT package_ID, package_name, package_price
                    FROM packages';
                    $p_statement = $db1->prepare($p_query);
                    $p_statement->execute();
                    $p_rows = $p_statement->fetchAll();
                    $p_statement->closeCursor();
                    //query all package features including their package_ID
                    $pf_query = 'SELECT package_features.package_feature_ID, package_features.package_feature_name, 
                    package_features.package_feature_desc, package_features.package_ID
                    FROM packages, package_features
                    WHERE packages.package_ID = package_features.package_ID';
                    $pf_statement = $db1->prepare($pf_query);
                    $pf_statement->execute();
                    $pf_rows = $pf_statement->fetchAll();
                    $pf_statement->closeCursor();
                    //display all addon rows
                    $addon_query = 'SELECT addon_ID, addon_name, addon_price, addon_description
                    FROM add_ons';
                    $addon_statement = $db1->prepare($addon_query);
                    $addon_statement->execute();
                    $addon_rows = $addon_statement->fetchAll();
                    $addon_statement->closeCursor();

                    //display all a-la-carte rows
                    $alc_query = 'SELECT a_la_carte_ID, a_la_carte_name, a_la_carte_price, a_la_carte_desc
                    FROM a_la_carte';
                    $alc_statement = $db1->prepare($alc_query);
                    $alc_statement->execute();
                    $alc_rows = $alc_statement->fetchAll();
                    $alc_statement->closeCursor();
                    //start html
                    $show_rows = '<div class="wrap">';
                    $show_rows .= '<form action="submitorder.php" method="post">';
                    $show_rows .= '<div class="grid-wrapper">';
                    //display all the packages and the package features pulled from the database
                    if(!empty($p_rows)){
                        foreach($p_rows as $p_row){
                            $show_rows .= '<div class="grid-card flex-card">';
                            $show_rows .= '<div class="flex-item-top">';
                            $show_rows .= '<h1>'.$p_row[1].'</h1>';
                            $show_rows .= '<h2>'.$p_row[2].'</h2>';
                            $show_rows .= '</div>';
                            $show_rows .= '<div class="flex-item">';
                            $show_rows .= '<ul>';
                            foreach($pf_rows as $pf_row){
                                if($pf_row['package_ID'] === $p_row['package_ID']){
                                    $show_rows .= '<li>'.$pf_row[1].'</li>';
                                }
                            }
                            $show_rows .= '</ul>';
                            $show_rows .= '</div>';
                        

                            //close flex card/grid card
                            $show_rows .= '</div>';
                        }
                    //close grid-wrapper
                    $show_rows .= '</div>';

                    //close grid-box
                    $show_rows .= '</div>';

                    //start displaying addons and a la carte
                    $show_rows .= '<div class="grid-wrapper">';

                    $show_rows .= '<div class="grid-box">';

                    $show_rows .= '<table>';
                    $show_rows .= '<p>Add On:</p>';
                    $rv=-1;
                    foreach($addon_rows as $addon_row){
                        //$rv+=1;
                        $show_rows .= '<tr>';
                        $show_rows .= '<td>'.$addon_row['addon_name'].'</td><td>'.$addon_row['addon_price'].'</td>';
                        $show_rows .= '</tr>';
                    }
                    $show_rows .= '</table>';

                    //close grid-box for a la carte
                    $show_rows .= '</div>';

                    $show_rows .= '<div class="grid-box">';

                    $show_rows .= '<table>';
                    $show_rows .= '<p>A LA Carte:</p>';
                    foreach($alc_rows as $alc_row){
                        $show_rows .= '<tr>';
                        $show_rows .= '<td><ul value="'.$alc_row['a_la_carte_name'].'"></td>';
                        $show_rows .= '<td>'.$alc_row['a_la_carte_name'].'</td><td>'.$alc_row['a_la_carte_price'].'</td>';
                        $show_rows .= '</tr>';
                    }
                    $show_rows .= '</table>';

                    //close grid-box for a la carte
                    $show_rows .= '</div>';

                    //close grid-wrapper for addons and a la carte
                    $show_rows .= '</div>';
                    }echo $show_rows;
                ?>
            </div>

        </div>
    </div>
 