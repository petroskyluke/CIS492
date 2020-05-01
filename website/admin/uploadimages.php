<?php      
$select_project=$_POST['project'];
//echo $select_project;
$pathToImages="../img/portfolio/".$select_project."/";
//echo $pathToImages;
$pathToThumbs="../img/portfolio/".$select_project."/thumbnails/";
$thumbWidth=1000;
$uploadOk=1;
$files = array_filter($_FILES['filesToUpload']['name']);


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
        $newFilePath = $pathToImages . basename($_FILES["filesToUpload"]["name"][$i]);

        //upload the file into temp dir
        if(move_uploaded_file($tmpFilePath,$newFilePath)){
            //echo "yay";
            $fname=$files[$i];
            createThumbs($pathToImages,$pathToThumbs,$thumbWidth,$fname);
        }
    }

}
//create thumbnails upon successful upload
function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth, $fname ){

// open the directory
$dir = opendir( $pathToImages );
// loop through it, looking for any/all JPG files:
//while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);

    if ( (isset($info['extension'])) && (strtolower($info['extension']) == 'jpeg') || (strtolower($info['extension'])=='jpg')||(strtolower($info['extension'])=='png')){
        // continue only if this is a JPEG image
        if ( (isset($info['extension'])) && (strtolower($info['extension']) == 'jpeg') || (strtolower($info['extension'])=='jpg'))
        {
            //echo "Creating thumbnail for {$fname} <br />";
            // load image and get image size
            $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
        }
        elseif((isset($info['extension'])) &&(strtolower($info['extension'])=='png')){
            $img = imagecreatefrompng( "{$pathToImages}{$fname}" );
        }
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
    
//}
  // close the directory
  closedir( $dir );
}
?>
