<?php

if (isset($_POST["naam"]) && isset($_POST["email"]) && isset($_POST["phone-number"]) && isset($_POST["message"])) {
    echo "Yes, alles is ingevuld";
    $email = $_POST["email"];
    $message = $_POST["message"];

    $message = wordwrap($message, 70);
    mail("hendrikhogendijkhovenier@gmail.com", "verzonden door $email", "$message");
    echo "er is een mail verzonden";
    header("location:contact.php");
} else {
    header("location:contact.php?error=1");
}
?>