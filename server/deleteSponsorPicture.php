<?php 
// Include the database configuration file 
include_once 'connect.php'; 


if(isset($_POST['delete'])){ 
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $idToDelete = $_POST['delete'];
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