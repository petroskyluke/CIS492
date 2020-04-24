<?php
for($i=1; $i<=6; $i++){?>
    <!--gallery-->
    <?php $showProject='showProject'.$i;?>
    <?php $myPortfolio='myPortfolio'.$i;?>
    <div id="<?php echo $showProject?>" class="w3-modal"><?php
        $first=1;
        $select_project='project'.$i;
        $select_pro='project'.$i;
        //echo $select_pro;
        //echo $i;
        $files = scandir('img/portfolio/'.$select_project.'/thumbnails');

        echo "<div class='w3-content w3-display-container' style='max-width:800px'/>";
        foreach($files as $file) {
            if($file !== "." && $file !== ".." && $file !=="!cover.jpg") { 
                if($first==1){
                    echo "<img class='$myPortfolio' src='img/portfolio/$select_project/thumbnails/$file' onload='plusDivs(0,$i)' style='width:100%; display:block' />";
                    $first=2;

                }
                else{
                    echo "<img class='$myPortfolio' src='img/portfolio/$select_project/thumbnails/$file' onload='plusDivs(0,$i)' style='width:100%; display:none' />";
                }
            }
        }
        echo "<div class='w3-center w3-section w3-large w3-text-white w3-display-bottommiddle w3-hide-small' style='width:100%' />";
        echo "<div style='padding:25%' class='w3-left-align w3-half w3-hover-opacity w3-hide-small' onclick='plusDivs(-1,$i)'>&#10094;</div>";
        echo "<div style='padding:25%' class='w3-right-align w3-half w3-hover-text-khaki w3-hide-small' onclick='plusDivs(1,$i)'>&#10095;</div>";
        echo"</div>";


        echo "<div class='w3-center w3-section w3-large w3-text-white w3-display-bottommiddle w3-hide-medium w3-hide-large' style='width:100%; display:flex' />";
        echo "<div style='padding:20%; width:50%; float:left' class='w3-left-align w3-hover-text-khaki w3-hide-medium w3-hide-large' onclick='plusDivs(-1,$i)'>&#10094;</div>";
        echo "<div style='padding:20%; width:50%; float:left' class='w3-right-align w3-hover-text-khaki w3-hide-medium w3-hide-large' onclick='plusDivs(1,$i)'>&#10095;</div>";
        echo "</div>";
        echo "</div>";
    ?>
    </div><?php
}
?>


