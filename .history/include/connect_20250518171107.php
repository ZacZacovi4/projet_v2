<?php
//important de faire le block 'try catch' au cas ou on a un erreur
$dsn = 'mysql:host=localhost;dbname=bdd_club;charset=utf8';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (Exception $e) {
    die($e->getMessage());
}
