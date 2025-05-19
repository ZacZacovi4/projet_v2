<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT user_id, user_password, role_id, user_first_name FROM users WHERE user_email=:email");
    // Vérifie le mail donné $_post["admin_mail"] avec celui de la BDD ":admin_mail"
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["user_password"])) {
        // $_SESSION["user"] = [
        //     "id" => $user["user_id"],
        //     "role" => $user["role_id"],
        //     "first_name" => $user["user_first_name"],
        // ];
        $_SESSION["id"] => $user["user_id"];
        $_SESSION["role"] => $user["role_id"];
        $_SESSION["first_name"] => $user["user_first_name"];
        redirect("index.php?page=menu");
    } else {
        $error = "Identifiant ou mot de passe incorrect";
    }
}

