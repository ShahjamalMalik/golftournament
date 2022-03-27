<?php 
    session_start();
    $errorArray = [];
    include_once 'connect.php'; 

    $emailClean = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);

    $passwordClean = filter_var($_POST['adminPassword'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
    $passwordClean = password_hash($passwordClean, PASSWORD_BCRYPT);
    try {
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO admins (admin_email, admin_pass) VALUES ('$emailClean', '$passwordClean')";
        // use exec() because no results are returned
        $dbh->exec($sql);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
?>