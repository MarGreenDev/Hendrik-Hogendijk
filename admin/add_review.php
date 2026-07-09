<?php
include '../includes/connection.php';

if (isset($_POST['bevestigen'])) {
    $naam = $_POST['naam'];
    $bericht = $_POST['bericht'];

    $stmt = $conn->prepare("INSERT INTO reviews (naam, bericht) VALUES (:naam, :bericht)");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':bericht', $bericht);
    $stmt->execute();

    header('Location: admin.php');
    exit;
}
?>