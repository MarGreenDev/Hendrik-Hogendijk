<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $bericht = $_POST['bericht'];

    $stmt = $conn->prepare("INSERT INTO reviews (naam, bericht) VALUES (:naam, :bericht)");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':bericht', $bericht);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>