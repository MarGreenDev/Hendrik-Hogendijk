<?php

session_start();
require_once '../includes/connection.php';

if (isset($_POST[''])) {
    $email = $_POST[''];
    $password = $_POST[''];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);

    $result = $stmt->fetch();

    if ($result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: admin.php");
        }
        exit();
    }

    $_SESSION['login_error'] = 'incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();

}

?>