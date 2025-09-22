<?php
//important de faire le block 'try catch' au cas ou on a une erreur
$dsn = 'mysql:host=localhost;dbname=bdd_club;charset=utf8';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
