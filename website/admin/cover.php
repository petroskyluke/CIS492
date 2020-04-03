<?php 
    $select_project=$_POST['projectselected'];
    $fname=$_POST['filevalue'];
    $fparts = pathinfo($fname);
    $fextension = $fparts['extension'];
    $cname='!cover.'.$fextension;
    $allowed_extensions = array("!cover.gif", "!cover.png", "!cover.jpg", "!cover.JPG", "!cover.jpeg");
    //(pathinfo($file, PATHINFO_FILENAME) == "!cover")



    chdir('../img/portfolio/'.$select_project);
    foreach($allowed_extensions as $file){
        if(file_exists($file)){
            unlink($file);
        }
    }
    copy($fname,$cname);
    //rename($fname,$cname);
    chdir('thumbnails/');
    foreach($allowed_extensions as $file){
        if(file_exists($file)){
            unlink($file);
        }
    }
    copy($fname,$cname);
    //rename($fname,$cname);
            
            
        
?>