<?php         
    $uploadOk=1;
    $files = array_filter($_FILES['filesToUpload']['name']);

    $select_option=$_POST['project'];
    //$target_dir = $select_option."/";
    $target_dir = "../img/portfolio/".$select_option."/";

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
?>
