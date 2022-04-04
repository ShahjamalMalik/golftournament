<?php 
    /**
     * register.php will be used to register as the admin
     * session_start() needs to be used for us to use session variables
     * $errorArray will be used to pass error messages to JS/jQuery 
     * Include the database configuration file 
     */
    session_start();
    $errorArray = [];
    include_once 'connect.php'; 

    $emailClean = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);

    $passwordClean = filter_var($_POST['adminPassword'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
    $passwordClean = password_hash($passwordClean, PASSWORD_BCRYPT);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = 'SELECT admin_id FROM admins WHERE admin_email="'.$emailClean.'"';
    $stmt = $dbh->prepare($sql2); 
    $stmt->execute();
    $row = $stmt->fetch();
    if(!empty($row)){
      array_push($errorArray, 'Email already exists !');
    }else{
      try {
        $sql = "INSERT INTO admins (admin_email, admin_pass) VALUES ('$emailClean', '$passwordClean')";
        // use exec() because no results are returned
        $dbh->exec($sql);
        array_push($errorArray, 'Registration completed successfully !');

      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }

    }

  
    echo json_encode($errorArray);
?>