<?php 
    $select_project=$_POST['projectselected'];
    $fname=$_POST['filevalue'];
    $pathToImages='../img/portfolio/'.$select_project.'/';
    $pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';

    $old = getcwd();
    chdir('../img/portfolio/'.$select_project);
    unlink($fname);
    chdir('thumbnails/');
    unlink($fname);
    chdir($old);
        
?>