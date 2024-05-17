<?php

# places the database type(mysql), db host(localhost), and db name(myfirstdatabase) all under one var for the PDO class to read
$dsn = "mysql:host=localhost;dbname=låne_system";
$dbusername = 'root';
$dbpassword = '';

try {

    # makes a pdo var containg a new PDO object with our above variables
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    # attr_errmode is used for error reporting and can have three values, errmode_exception, errmode_warning and errmode_silent
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}