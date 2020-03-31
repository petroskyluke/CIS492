<!--gallery-->
<div id="showProject" class="w3-modal"><?php
    $select_project='project3';
    $files = scandir('img/portfolio/'.$select_project.'/thumbnails');

    echo "<div class='w3-content w3-display-container' style='max-width:800px'/>";
    foreach($files as $file) {
        if($file !== "." && $file !== "..") { 
            echo "<img class='myPortfolio' src='img/portfolio/$select_project/thumbnails/$file' style='width:100%' />";

        }
    }
    echo "<div class='w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle' style='width:100%' />";
    echo "<div class='w3-left w3-hover-text-khaki' onclick='plusDivs(-1)'>&#10094;</div>";
    echo "<div class='w3-right w3-hover-text-khaki' onclick='plusDivs(1)'>&#10095;</div>";
    echo "</div>";
    echo "</div>";
?>
</div>

