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
 * We will get the picture_path back using the id we got from the form. 
 * $sql will be the SQL query to delete the image and then do an unlink using that variable
 * execute the query, if not set the $errorMessage to the error message
 * $errorMessage will be used for error handling
 */
if(isset($_POST['delete'])){ 
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $idToDelete = $_POST['delete'];

    $sql2 = 'SELECT picture_path FROM images WHERE picture_id="'.$idToDelete.'"';
    $stmt = $dbh->prepare($sql2); 
    $stmt->execute();
    $row = $stmt->fetch();
    $PathToFileToDelete = $row[0];

    unlink($PathToFileToDelete);

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



