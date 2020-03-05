<?php
$uploadOk=1;
$files = array_filter($_FILES['filesToUpload']['name']);

$select_option=$_POST['project'];
//$target_dir = $select_option."/";
$target_dir = "portfolio/".$select_option."/";

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
        $newFilePath = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);

        //upload the file into temp dir
        if(move_uploaded_file($tmpFilePath,$newFilePath)){
            echo "yay";
        }
    }

}
/*$select_option=$_POST['project'];

$target_dir = "portfolio/".$select_option."/";
$target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$upload_response=null;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["filesToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $upload_response= "File is not an image.";
        $uploadOk = 0;
    }
}

//Check if file already exists
if (file_exists($target_file)) {
    $upload_response= "A file with this name already exists. ";
    //this will just add where the file already exists if you want to tell him this$upload_response.= $target_dir;
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $upload_response= "Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $upload_response.= "Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
        $upload_response= "The file ". basename( $_FILES["filesToUpload"]["name"]). " has been uploaded.";
    } else {
        $upload_response= "Sorry, there was an error uploading your file.";
        $upload_response.= $target_dir;
    }
}
echo $upload_response;*/
include'../admin/editportfolio.php';
?>