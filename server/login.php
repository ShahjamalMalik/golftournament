<?php 
    session_start();
    $errorArray = [];
    include_once 'connect.php'; 
    
    $emailClean = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);

    $passwordClean = filter_var($_POST['adminPassword'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
    $result = $dbh->query("SELECT * FROM admins WHERE admin_email='$emailClean' ") ;
    $total=$result->rowCount();
    if($total<1){
        array_push($errorArray, 'That admin is not in the system');
        echo json_encode($errorArray);
    } else{
        while ($row = $result->fetch()) {
            //echo 'Yes we have a match and the email is '.$row['admin_email'];
            if(password_verify($passwordClean, $row['admin_password'])){
                $_SESSION['id']=$row['admin_id'];
                echo '<br/>The Session ID is '.$_SESSION['id'];
                header("Location: ../index.php");
            }else{
                array_push($errorArray, 'Wrong Password');

                echo $errorArray;
            }
        }
    }
    
?>