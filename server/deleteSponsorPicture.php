<?php 
/**
 * deleteSponsorPicture.php will be used to delete a sponsor from the gallery on sponsors.php
 */
/**
 *  Include the database configuration file 
 */  
include_once 'connect.php'; 

    
    //$fileName = '../' . $filePath;
    //echo $filePath;
/**
 * Same as deletePicture.php but instead it'll be the sponsor_id being used for the query
 */
if(isset($_POST['delete'])){ 
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$idToDelete = $_POST['delete'];
    $idToDelete = $_POST['delete'];
    $sql2 = 'SELECT file_path FROM sponsor_logos WHERE sponsor_id="'.$idToDelete.'"';
    $stmt = $dbh->prepare($sql2); 
    $stmt->execute();
    $row = $stmt->fetch();
    $PathToFileToDelete = '../' . $row[0];

    unlink($PathToFileToDelete);
    $sql = 'DELETE FROM sponsor_logos WHERE sponsor_id="'.$idToDelete.'"';
    
    try {
    
        // sql to delete a record

        // use exec() because no results are returned
        $dbh->exec($sql);
        echo "Record deleted successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

} else {
    echo 'Error in retrieving info';
}


header("Location: ../sponsors.php");