<?php 
    /**
     * logout.php will be used from the admin.php page to logout as an admin
     * Start the session, set the session id's to 0 and to hidden for logout/authentication purposes then redirect to the homepage
     */
    
    session_start();
    $_SESSION['id'] = 0;
    $_SESSION['adminHide'] = 'hidden';
    echo $_SESSION['id'];
    echo $_SESSION['adminHide'];
    header("Location: ../index.php");

?>