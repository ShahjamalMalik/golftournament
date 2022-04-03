<?php
/**
 * yearChange.php will be used to change the year on index.php
 * Include the database configuration file
 */
include_once 'connect.php'; 


/**
 * If post submit, get the information from the POST. Then insert that into the database
 * $selected is the information from the POST form/list 
 * 
 */
if(isset($_POST['submit'])){
    
        $selected = $_POST['selectYear'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO years (year_number) VALUES ("'.$selected.'")';
        try {
            $dbh->exec($sql);
            echo "Record added successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $sql3 = $dbh->prepare('SELECT * FROM years ORDER BY year_id DESC LIMIT 1');
        if($sql3->execute()) {
            $row = $sql3->fetch(PDO::FETCH_OBJ);
            $year_number = $row->year_number;
            echo $year_number;
        } else{
            //$row=$count->fetchAll();
            print_r($dbo->errorInfo()); 
        }
        
        
        header("Location: ../index.php");
}
