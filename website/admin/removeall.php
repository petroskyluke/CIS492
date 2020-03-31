<?php
$select_project=$_POST['project'];
$pathToImages='../img/portfolio/'.$select_project.'/';
$pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';

function createThumbs( $pathToImages, $pathToThumbs)
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
// call createThumb function and pass to it as parameters the path
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width.
// We are assuming that the path will be a relative path working
// both in the filesystem, and through the web for links
//createThumbs("upload/","upload/thumbs/",100);
createThumbs($pathToImages,$pathToThumbs);
?>