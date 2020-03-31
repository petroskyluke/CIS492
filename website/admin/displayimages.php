<form method="post">

    <h1>Current images in <?php echo $_POST['project'];?>:</h1>

    <div id="imageList" class="w3-row">
    <?php
        $images_displayed=true;
        $select_project=$_POST['project'];
        $files = scandir('../img/portfolio/'.$select_project.'/thumbnails');
        foreach($files as $file) {
            if($file !== "." && $file !== "..") { 
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
