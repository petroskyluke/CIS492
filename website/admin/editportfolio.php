<?php
include('../inc/session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
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

<!-- Sidebar -->
<?php include('admin_sidebar.php');?>

<!-- Page Content -->
<div class="content">
    <div class="w3-container w3-teal">
        <h1>Edit Portfolio</h1>
    </div>
    
    <form action="/uploadimages.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">

    <h3>Select which project you would like to work on:</h3>
    <label for="project"></label>

    <select id="project" name="project" required>
        <option disabled selected value> -- select project -- </option>
        <option value="project1" id="project1">Project 1</option>
        <option value="project2" id="project2">Project 2</option>
        <option value="project3" id="project3">Project 3</option>
        <option value="project4" id="project4">Project 4</option>
        <option value="project5" id="project5">Project 5</option>
        <option value="project6" id="project6">Project 6</option>
    </select>

    
    <h3>Select files to upload into this project:</h3>
        <label for="filesToUpload"></label>
        <input type="file" id="filesToUpload" name="filesToUpload[]" multiple accept="image/*" ><br><br>
        <input type="submit" value="Upload Images" name="submit" formaction=""><br><br>
        <input type="submit" value="Show Images" id="show" name="submit" formaction="">
        <input type="submit" value="Remove All" name="submit" formaction="">

    </form>


    <!--display images-->
    <?php if ((!empty($_POST['project'])) && ($_POST['submit']=='Show Images')){
        include 'displayimages.php';
    }
    ?>

    <?php //upload images ?>
    <?php if ((!empty($_POST['submit']))&&($_POST['submit']=='Upload Images')){
        include 'uploadimages.php';
        include 'displayimages.php';

    }
    ?>

    <?php //delete all images ?>
    <?php if ((!empty($_POST['submit']))&&($_POST['submit']=='Remove All')){
        include 'removeall.php';
        include 'displayimages.php';

    }
    ?>
    <?php //delete individual images ?>
    <?php if ((!empty($_POST['submit']))&&($_POST['submit']=='Remove')){
        include 'delete.php';
        include 'displayimages.php';

    }
    ?>
    <script>
        document.getElementById("<?php echo $select_project?>").selected="true";
    </script>

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
