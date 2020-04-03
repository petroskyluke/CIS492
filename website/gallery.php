<div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project1.jpg" alt="Project 1" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 1</b></p>
                            <p class="w3-opacity">Fri 27 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" name="project" id="project1" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project2.jpg" alt="Project 2" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 2</b></p>
                            <p class="w3-opacity">Sat 28 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project2" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project3.jpg" alt="Project 3" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 3</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project3" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project4.jpg" alt="Project 4" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 4</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project4" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project5.jpg" alt="Project 5" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 5</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project5" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project6.jpg" alt="Project 6" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 6</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project6" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                </div>
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

