<?php 
    session_start();
    $_SESSION['id'] = 0;
    $_SESSION['adminHide'] = 'hidden';
    echo $_SESSION['id'];
    echo $_SESSION['adminHide'];
    header("Location: ../index.php");

?>