<form method="post">

    <h1>Current images in <?php echo $_POST['project'];?>:</h1>

    <div id="imageList" class="w3-row">
    <?php
        $select_project=$_POST['project'];
        $files = scandir('../img/portfolio/'.$select_project.'/thumbnails');
        foreach($files as $file) {
            if(pathinfo($file, PATHINFO_FILENAME) == "!cover") { 
                echo "<div id='individualPicture' class='w3-quarter w3-container' style='max-height:315px' />";   
                echo "<img src='../img/portfolio/$select_project/thumbnails/$file' style='width:100%; height:250px; object-fit:cover' />"; 
                echo "<form method='post'/>";
                    echo "<input type='hidden' value='$file' name='filevalue' />";
                    echo "<input type='submit' disabled value='Current Cover' name='submit' formaction='cover.php' />";
                    echo "<input type='hidden' value='$select_project' name='projectselected'/>";

                echo "</form>";
                echo "</div>";

            }
            elseif($file !== "." && $file !== "..") { 
                echo "<div id='individualPicture' class='w3-quarter w3-container' style='max-height:315px' />";   
                echo "<img src='../img/portfolio/$select_project/thumbnails/$file' style='width:100%; height:250px; object-fit:cover' />"; 
                echo "<form method='post'/>";
                    echo "<input type='submit' value='Remove' name='submit' formaction='' />";
                    echo "<input type='hidden' value='$file' name='filevalue' />";
                    echo "<input type='submit' value='Cover' name='submit' formaction='' />";
                    echo "<input type='hidden' value='$select_project' name='projectselected'/>";

                echo "</form>";
                echo "</div>";

            }
        }
    ?>
    
    </div>
</form>
