<?php 
    $select_project=$_POST['projectselected'];
    //$fname=$_POST['coverset'];
    $fname="20160916_132849.jpg";
    echo $fname;
    $pathToImages='../img/portfolio/'.$select_project.'/';
    $pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';

    $dir = opendir($pathToImages);
    unlink($fname);
    $dir = opendir($pathToThumbs);
    unlink($fname);
    closedir($dir);
?>








<?php /*
    $select_project=$_POST['projectselected'];
    $fname=$_POST['coverset'];
    $pathToImages='../img/portfolio/'.$select_project.'/';
    $pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';

    $wow="myyum";
    echo $wow;
            $old = getcwd();
            echo $old;
            echo "<br/>";
            chdir('../img/portfolio/'.$select_project.'/');
            echo $fname;
            unlink($fname);
            chdir($old);
            chdir('../img/portfolio/'.$select_project.'thumbnails/');
            unlink($fname);
            chdir($old);
            
            
            //unlink("../img/portfolio/$select_project$_POST['coverset']);
            //unlink("../img/portfolio/".$select_project/$_POST['coverset']);
        */
        ?>