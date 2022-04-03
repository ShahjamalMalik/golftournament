<?php 
/**
 * addPicture.php will be used to add pictures to the photos.php gallery
 */
/**
 * Include the database configuration file 
 */

include_once 'connect.php'; 

/**
 * $dateTime is a variable that will be the current date
 */
$dateTime = date("Y/m/d");
if(isset($_POST['submit'])){ 
    /**
     * $targetDir and $targetDir are different because we're using the variables depending on what part of the directory we are at 
     * $allowTypes is an array of allowed image extensions
     * $statusMsg will be the error message (we might not end up using this)
     * $fileNames will filter through our array of uploaded images that we got from our post to get the file names
     */
    $targetDir = "../uploads/"; 
    $targetDirSend="uploads/";
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    /**
     * If $fileNames is not empty, do a forEach loop of all the files that were uploaded
     * $fileName will be the name of the file
     * $targetFilePath and targetFilePathSend will be where they are being sent respectively to what was explained above regarding the difference
     * $fileType will then check if the file type is valid, and if it is upload the file to the folder as well as insert to SQL, if not give us an error message $errorUpload and $errorUploadType
     */
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
            $targetFilePathSend = $targetDirSend . $fileName;
             
            
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                   
                    $insertValuesSQL .= "('".$dateTime."', '".$targetFilePathSend."'),"; 
                    
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        
        
         
        /**
         * These will be the variables used for error handling
         */
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         

        /**
         * If insertValuesSQL is not empty, get rid of the commas and insert these values into the database. 
         * $statusMsg will be used for error handling
         */
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $dbh->query("INSERT INTO images (picture_uploadDate, picture_path) VALUES $insertValuesSQL"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    }
    /**
     * Redirect to gallery
     */
    header("Location: ../photos.php");
} 
 
?>