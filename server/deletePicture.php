<?php 
/**
 * deletePicture.php will be used to delete the picture from the photos.php gallery
 */

/**
 * Include the database configuration file
 */
include_once 'connect.php'; 
$errorMessage;
/**
 * If delete from post, get the id that was selected from the post as well and set it to $idToDelete, if not set the $errorMessage
 * $sql will be the SQL query to delete the image.
 * execute the query, if not set the $errorMessage to the error message
 * $errorMessage will be used for error handling
 */
if(isset($_POST['delete'])){ 
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $idToDelete = $_POST['delete'];
    $sql = 'DELETE FROM images WHERE picture_id="'.$idToDelete.'"';
    try {
    
        // sql to delete a record

        // use exec() because no results are returned
        $dbh->exec($sql);
        $errorMessage = "Record deleted successfully";
      } catch(PDOException $e) {
        $errorMessage = $sql . "<br>" . $e->getMessage();
    }

} else {
    $errorMessage = 'Error in retrieving info';
}


header("Location: ../photos.php");



