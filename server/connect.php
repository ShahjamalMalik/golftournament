<?php
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=golft_tournament", //FIX THIS (should be golf_tournament)
        "root",
        ""
    );
    
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

