<?php

session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
];

session_unset();

function showError($error)
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}


include '../includes/connection.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="houder">
        <div class="login-form">
            <div class="modal">
                <form action="login_register.php" method="post">
                    <h2>inloggen</h2>
                    <?php showError($errors['login']);?>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login" class="btn btn-edit">login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>