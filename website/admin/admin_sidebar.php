<?php
    //get the requested resource location
    $uri = $_SERVER['REQUEST_URI']; 
    
    //create array for each sidebar navigation button
    $array = array("Menu"=>"", "Services"=>"", "Portfolio"=>"", "Reporting"=>"", "Logout"=>"", "Change Password"=>"");
    
    //depending on uri, set specific array element to "selected"
    if($uri === "/admin/admin.php"){
        $array["Menu"] = "selected";
    }
    elseif($uri === "/admin/editservices.php"){
        $array["Services"] = "selected";
    }
    elseif($uri === "/admin/editportfolio.php"){
        $array["Portfolio"] = "selected";
    }
    elseif($uri === "/admin/reporting.php"){
        $array["Reporting"] = "selected";
    }
    elseif($uri === "/admin/changepassword.php"){
        $array["Change Password"] = "selected";
    }
?>
<!-- Sidebar -->
<div class="sidebar w3-light-grey w3-bar-block">
    <h3><a href="admin.php" class="w3-bar-item w3-button <?php if(isset($array["Menu"])){echo $array["Menu"];}?>">Menu</a></h3>
    <a href="editservices.php" class="w3-bar-item w3-button <?php if(isset($array["Services"])){echo $array["Services"];}?>">Services</a>
    <a href="editportfolio.php" class="w3-bar-item w3-button <?php if(isset($array["Portfolio"])){echo $array["Portfolio"];}?>">Portfolio</a>
    <a href="reporting.php" class="w3-bar-item w3-button <?php if(isset($array["Reporting"])){echo $array["Reporting"];}?>">Reporting</a>
    <a href="../inc/logout.php" class="w3-bar-item w3-button">Logout</a>
    <a href="changepassword.php" class="w3-bar-item w3-button <?php if(isset($array["Change Password"])){echo $array["Change Password"];}?>">Change Password</a>
</div>