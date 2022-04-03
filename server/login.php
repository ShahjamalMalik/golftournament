<?php 
    /**
     * login.php will be used to login as the admin
     * start the session so we can access our session variables that are active in the session
     * $errorArray will be used to pass error messages to JS/jQuery 
     * Include the database configuration file 
     */

    session_start();
    $errorArray = [];
    include_once 'connect.php'; 
    

    /**
     * Get the information from the POST 
     */
    $emailClean = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
    $passwordClean = filter_var($_POST['adminPassword'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);

    /**
     * Query to get the admin using the admin email
     * $total will be the amount of rows returned
     */
    $result = $dbh->query("SELECT * FROM admins WHERE admin_email='$emailClean' ") ;
    $total=$result->rowCount();
    /**
     * If $total is less than one, error message
     * If not, do a while loop as long as $row has results, if the password verify passed, set the session id to 1 and set the session adminHide to hidden for error handling/authentication purposes. If not, error message.
     */
    if($total<1){
        array_push($errorArray, 'That admin is not in the system');
        echo json_encode($errorArray);
    } else{
        while ($row = $result->fetch()) {
            if(password_verify($passwordClean, $row['admin_pass'])){
                $_SESSION['id']=1;
                $_SESSION['adminHide'] = 'hidden';
               array_push($errorArray, 'SUCCESS');
               echo json_encode($errorArray);
            }else{
                array_push($errorArray, 'Wrong Password');

                echo json_encode($errorArray);
            }
        }
    }
    
?>