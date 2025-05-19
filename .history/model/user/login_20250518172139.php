<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

     $stmt = $db->prepare("SELECT user_password FROM table_admin WHERE admin_mail=:admin_mail");
    // Vérifie le mail donné $_post["admin_mail"] avec celui de la BDD ":admin_mail"
    $stmt->bindValue(":admin_mail", $_POST["admin_mail"]);
    $stmt->execute();