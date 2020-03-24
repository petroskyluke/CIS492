
<!--<div class="row"> 
  <div class="column">
    <img src="/w3images/wedding.jpg" style="width:100%">
    <img src="/w3images/rocks.jpg" style="width:100%">
    <img src="/w3images/falls2.jpg" style="width:100%">
    <img src="/w3images/paris.jpg" style="width:100%">
    <img src="/w3images/nature.jpg" style="width:100%">
    <img src="/w3images/mist.jpg" style="width:100%">
    <img src="/w3images/paris.jpg" style="width:100%">
  </div>-
  
  <div id="showProject" class="w3-modal">
        <span onclick="document.getElementById('showProject').style.display='none'" class="w3-display-container">
        </span>
        <div class="w3-content w3-display-container" style="max-width:800px">

            <img class="myPortfolio" src="img/portfolio/project6.jpg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/project5.jpg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/project4.jpg" style="width:100%">
            <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
            </div>
        </div>
    </div>-->


<!DOCTYPE html>
<html lang="en">
<head>
<style>



</style>
</head>
<body>

<h1>Current images in <?php echo $_POST['project'];?>:</h1>

<div id="imageList">
<?php
    $select_project=$_POST['project'];
    $files = scandir('portfolio/'.$select_project.'/');
    foreach($files as $file) {
        if($file !== "." && $file !== "..") {    
            echo "<img src='portfolio/$select_project/$file' style='width:25%' />";
        }
    }

?>
</div>
</body>
</html>