<?php

try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=your database here",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

echo "Connected to the database";

