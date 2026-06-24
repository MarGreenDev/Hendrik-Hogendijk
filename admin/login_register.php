<?php

session_start();
require_once '../includes/connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];

            header("Location: admin.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();

}

?>