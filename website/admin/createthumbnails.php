<?php

$select_project=$_POST['project'];
echo $select_project;
$pathToImages='../img/portfolio/'.$select_project.'/';
echo $pathToImages;
$pathToThumbs='../img/portfolio/'.$select_project.'/thumbnails/';
$thumbWidth=1000;

function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth )
{
    echo "<br/>";
    $round=0;
    $round2=0;

  // open the directory
  $dir = opendir( $pathToImages );
  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $round+=10;
    echo $round;
    echo $fname;
    echo "<br/>";
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( (isset($info['extension'])) && (strtolower($info['extension']) == 'jpeg') || (strtolower($info['extension'])=='jpg') )
    {
      echo "Creating thumbnail for {$fname} <br />";
    $round2+=1;
    echo $round2;
    echo "<br/>";
      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      $tname=$fname;
      imagejpeg( $tmp_img, "{$pathToThumbs}{$tname}" );
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
createThumbs($pathToImages,$pathToThumbs,$thumbWidth);
?>