<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordConf = $_POST['confirmation_password'];

    if (
        empty($firstName) ||
        empty($lastName) ||
        empty($email) ||
        empty($password) ||
        empty($passwordConf) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !($password === $passwordConf)
    ) {
        echo ('problème');
        exit();
    }

    try {
        $sql = 'INSERT INTO users
        (user_first_name, user_last_name, user_email, user_password, role_id) VALUES (:user_first_name, :user_last_name, :user_email, :user_password, :role_id)';
        $stmt = $db->prepare($sql);
        $params = [
            ':user_first_name' => $firstName,
            ':user_last_name' => $lastName,
            ':user_email' => $email,
            ':user_password' => password_hash($password, PASSWORD_DEFAULT),
            ':role_id' => 3
        ];
        $stmt->execute($params);
    } catch (PDOException $e) {
        exit();
    }
    redirect('index.php?page=login');
}
