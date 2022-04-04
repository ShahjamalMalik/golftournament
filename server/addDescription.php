<?php
/**
 * addDescription.php will be used to add or change description of a photo
 */

/**
 * Include the database configuration file
 */
include_once 'connect.php'; 
$errorArray = [];
$errorMessage = "";
$description= filter_var($_POST['addPicDescription'], FILTER_SANITIZE_SPECIAL_CHARS );

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST["add"];

$sql = "UPDATE images SET picture_description='$description' WHERE picture_id='$id'";
try{
    $dbh->exec($sql);
    $errorMessage = "Record updated successfully";
    array_push($errorArray, 'SUCCESS');
  } catch(PDOException $e) {
    $errorMessage = $sql . "<br>" . $e->getMessage();
}
echo json_encode($errorArray);

header("Location: ../photos.php");

