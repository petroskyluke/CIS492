<?php
//BEGIN USER VERIFICATION
//BEGIN SESSION CODE
//get current time
$time = $_SERVER['REQUEST_TIME'];
//set the amount of time a session should live
$timeout_duration = 600;
//set parameters for session cookie storage
ini_set('session.gc_maxlifetime', $timeout_duration);
ini_set('session.cookie_lifetime', $timeout_duration);
session_start();
if(isset($_SESSION['LAST_ACTIVITY']) && 
	(($_SESSION['LAST_ACTIVITY'] + $timeout_duration) < $time))
{
	session_unset();
    session_destroy();
    session_start(); 
}
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
  }

$_SESSION['LAST_ACTIVITY'] = $time;
//END SESSION CODE
if(!isset($_SESSION["username"]))  
{  
	header("location:../login.php?msg=You+have+been+logged+out+due+to+inactivity");  
}
//END USER VERIFICATION

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }

        .mySlides img {
            width: auto;
            height: 800px;
            max-height: 800px;
        }
    </style>
</head>


    <!-- Page content -->
    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:10%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="editservices.php" class="w3-bar-item w3-button">Services</a>
        <a href="editportfolio.php" class="w3-bar-item w3-button">Portfolio</a>
        <a href="#" class="w3-bar-item w3-button">Reporting</a>
        <a href="../inc/logout.php" class="w3-bar-item w3-button">Logout</a>
        <a href="changepassword.php" class="w3-bar-item w3-button">Change Password</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:10%">
        <div class="w3-container w3-teal">
            <h1>Edit Portfolio</h1>
        </div>
        
        <form action="../img/uploads.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="submit">

        <h3>Select which project you would like to work on:</h3>
        <label for="project"></label>

        <select id="project" name="project" required>
            <option disabled selected value> -- select project -- </option>
            <option value="project1">Project 1</option>
            <option value="project2">Project 2</option>
            <option value="project3">Project 3</option>
            <option value="project4">Project 4</option>
            <option value="project5">Project 5</option>
            <option value="project6">Project 6</option>
        </select>

        
        <h3>Select files to upload into this project:</h3>
            <label for="filesToUpload"></label>
            <input type="file" id="filesToUpload" name="filesToUpload[]" multiple accept="image/*" ><br><br>
            <input type="submit" value="Upload Images" name="submit" formaction=""><br><br>
            <input type="submit" value="Show Images" name="submit" formaction="">

        </form>

        <!--display images-->
        <?php if ((!empty($_POST['project'])) && ($_POST['submit']=='Show Images')){?>
            <form>

                <h1>Current images in <?php echo $_POST['project'];?>:</h1>

                <div id="imageList" class="w3-row">
                <?php
                    $select_project=$_POST['project'];
                    $files = scandir('../img/portfolio/'.$select_project.'/');
                    foreach($files as $file) {
                        if($file !== "." && $file !== "..") { 
                            echo "<div id='individualPicture' class='w3-quarter w3-container' style='max-height:300px' />";   
                            echo "<img src='../img/portfolio/$select_project/$file' style='width:100%; height:250px; object-fit:cover' />"; 
                            echo "<input type='submit' value='Remove' name='submit' />";
                            echo "<input type='submit' value='Set Cover' name='submit' formaction='' />";
                            echo "<input type='hidden' value='$file' name='coverset'/>";
                            echo "</div>";
                        }
                    }
                ?>
                </div>
            </form>
        <?php } ?>

        <!--delete images-->
        <?php if ((!empty($_POST['coverset'])) && ($_POST['submit']=='Remove')){
            unlink("../img/portfolio/".$select_project/$_POST['coverset']);
        }
        ?>

        <?php //upload images ?>
        <?php if ((!empty($_POST['submit']))&&($_POST['submit']=='Upload Images')){
        
            $uploadOk=1;
            $files = array_filter($_FILES['filesToUpload']['name']);

            $select_option=$_POST['project'];
            //$target_dir = $select_option."/";
            $target_dir = "../img/portfolio/".$select_option."/";

            $total=count($_FILES['filesToUpload']['name']);
            for($i=0; $i<$total; $i++){
                //get temp file path
                $tmpFilePath = $_FILES['filesToUpload']['tmp_name'][$i];

                $check = getimagesize($_FILES['filesToUpload']['tmp_name'][$i]);
                if($check !== false){
                    $uploadOk = 1;
                }else{
                    $uploadOk = 0;
                    break;
                }

                //make sure we have file path
                if($tmpFilePath !=""){
                    //setup new file path
                    $newFilePath = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);

                    //upload the file into temp dir
                    if(move_uploaded_file($tmpFilePath,$newFilePath)){
                        echo "yay";
                    }
                }

            }
        }
        ?>
    </div>
    

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge"></footer>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
