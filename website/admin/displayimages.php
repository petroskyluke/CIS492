<form method="post">

                <h1>Current images in <?php echo $_POST['project'];?>:</h1>

                <div id="imageList" class="w3-row">
                <?php
                    $select_project=$_POST['project'];
                    $files = scandir('../img/portfolio/'.$select_project.'/thumbnails');
                    foreach($files as $file) {
                        if($file !== "." && $file !== "..") { 
                            echo "<div id='individualPicture' class='w3-quarter w3-container' style='max-height:300px' />";   
                            echo "<img src='../img/portfolio/$select_project/thumbnails/$file' style='width:100%; height:250px; object-fit:cover' />"; 
                            echo "<input type='submit' value='Remove' name='submit' formaction='delete.php' />";
                            echo "<input type='submit' value='Set Cover' name='submit' formaction='' />";
                            echo "<input type='hidden' value='$file' name='coverset'/>";
                            echo $file;
                            $file=0;
                            echo "<input type='hidden' value='$select_project' name='projectselected'/>";
                            echo "</div>";

                        }
                    }
                ?>
                </div>
</form>
