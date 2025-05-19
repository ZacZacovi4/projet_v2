<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT user_id, user_password, role_id FROM users WHERE user_email=:email");
    // Vérifie le mail donné $_post["admin_mail"] avec celui de la BDD ":admin_mail"
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["user_password"])) {
        session_start();
        $_SESSION["user"] = [
            "id" => $user["user_id"],
            "role" => $user["role_id"],
        ];
        var_dump($_SESSION);
        exit();
        redirect("index.php?page=home");
    } else {
        echo "Identifiant ou mot de passe incorrect";
    }
}

