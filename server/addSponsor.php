<?php
include_once 'connect.php'; 



$sponsorName = $_POST["sponsor"];
$sponsorDescription = $_POST["sponsorDescription"];
$sponsorWebsite = $_POST["sponsorWebsite"];

$target_dir = "../images/sponsors/";
$send_target_dir = "images/sponsors/";
$send_target_file = $send_target_dir . basename($_FILES["sponsorLogo"]["name"]);
$target_file = $target_dir . basename($_FILES["sponsorLogo"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["sponsorLogo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["sponsorLogo"]["tmp_name"], $target_file)) {
        echo "This is the target file ". $send_target_dir . " ";
        $insert = "INSERT into sponsor_logos (file_path, sponsor_name, sponsor_description, sponsor_link) VALUES (?, ?, ?, ?)";
        $stmt = $dbh->prepare($insert);
        $stmt->execute([$send_target_file, $sponsorName, $sponsorDescription, $sponsorWebsite]);

        
      // Insert image file name into database
      
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


header("Location: ../sponsors.php");
