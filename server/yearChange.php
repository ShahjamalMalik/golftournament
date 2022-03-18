<?php
include_once 'connect.php'; 

if(isset($_POST['submit'])){
    
        $selected = $_POST['selectYear'];
        echo 'You have chosen: ' . $selected;
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO years (year_number) VALUES ("'.$selected.'")';
        try {
    
            // sql to delete a record
    
            // use exec() because no results are returned
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
