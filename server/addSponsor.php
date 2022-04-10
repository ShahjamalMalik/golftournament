<?php
/**
 * addSponsor.php will be used to add a sponsor to the gallery on sponsors.php 
 */

/**
 * Include the database configuration file
 */
include_once 'connect.php'; 

/**
 * sponsorName, sponsorDescription, and sponsorWebsite is the information we are receiving from the form.  
 */
$sponsorName = $_POST["sponsor"];
$sponsorDescription = $_POST["sponsorDescription"];
$sponsorWebsite = $_POST["sponsorWebsite"];
/**
 * Final thing to implement (error handling)
 */
$errorMessageAddSponsorReason;
$errorArray = [];

/**
 * Target directory files that we're going to use to do our checks.
 */
$target_dir = "../images/sponsors/";
$target_file = $target_dir . basename($_FILES["sponsorLogo"]["name"]);
/**
 * Because this is in another directory than the home directory, the "send" variables are going to be what we actually use for the SQL statement 
 */
$send_target_dir = "images/sponsors/";
$send_target_file = $send_target_dir . basename($_FILES["sponsorLogo"]["name"]);

/**
 * $uploadOk is a variable that will be used in the final if statement to see if the file was uploaded or not\
 * $imageFileType is the variable that will let us know if this is an image or not
 */
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
/**
 * Check if image file is a actual image or fake image
 * if a submit was had, if getimagesize doesn't return false then continue with the upload, if not don't.
 */ 
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["sponsorLogo"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errorMessageAddSponsorReason = "File is not an image.";
    array_push($errorArray, $errorMessageAddSponsorReason);
    echo json_encode($errorArray);
    $uploadOk = 0;
  }
}

/**
 * If the file exists, don't upload 
 */
if (file_exists($target_file)) {
    $errorMessageAddSponsorReason = "Sorry, file already exists.";
    array_push($errorArray, $errorMessageAddSponsorReason);
    echo json_encode($errorArray);
    $uploadOk = 0;    
}

/**
 * If imageFileType is not any of these extensions, don't upload. 
 */
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $errorMessageAddSponsorReason = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  array_push($errorArray, $errorMessageAddSponsorReason);
  echo json_encode($errorArray);
  $uploadOk = 0;
}


/**
 * We want to check if the upload checks have all passed, if not don't upload the file
 */
if ($uploadOk == 0) {
    $errorMessageAddSponsorReason = "Sorry, your file was not uploaded.";
    array_push($errorArray, $errorMessageAddSponsorReason);
    echo json_encode($errorArray);
  /**
   * If uploadOk is not equal to 1, upload the file
   */
  } else {
    /**
     * This is what will put the file into the actual directory
     */
    if (move_uploaded_file($_FILES["sponsorLogo"]["tmp_name"], $target_file)) {
       /**
        * This is the SQL statement that we will execute for the DB; insert image into the DB 
        */
        $insert = "INSERT into sponsor_logos (file_path, sponsor_name, sponsor_description, sponsor_link) VALUES (?, ?, ?, ?)";
        $stmt = $dbh->prepare($insert);
        $stmt->execute([$send_target_file, $sponsorName, $sponsorDescription, $sponsorWebsite]);

        
      
      
    } else {
      /**
       * If move_uploaded_file($_FILES["sponsorLogo"]["tmp_name"], $target_file) is false
       */
      $errorMessageAddSponsorReason = "Sorry, there was an error uploading your file.";
      //echo $errorMessageAddSponsorReason;
      array_push($errorArray, $errorMessageAddSponsorReason);
      echo json_encode($errorArray);
    }
}


//header("Location: ../sponsors.php");
