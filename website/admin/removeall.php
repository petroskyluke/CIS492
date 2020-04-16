<?php
$select_project=$_POST['project'];
$pathToImages='../img/portfolio/'.$select_project.'/';
$pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';

function removeAll( $pathToImages, $pathToThumbs)
{
  // open the directory
  $dir = opendir( $pathToImages );
  // loop through it, looking for any/all JPG files:
    chdir($pathToImages);
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( (isset($info['extension'])) && (strtolower($info['extension']) == 'jpeg') || (strtolower($info['extension'])=='jpg') )
    {
        chdir('thumbnails/');
        unlink($fname);
        chdir('../');
        unlink($fname);
    }
  }
  // close the directory
  closedir( $dir );
}

removeAll($pathToImages,$pathToThumbs);
?>