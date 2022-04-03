<?php
/**
 * connect.php is the database configuration/connection file. 
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=golf_tournament",
        "root",
        ""
    );
    
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

