<?php
include_once '../includes/connection.php';



$id = $_POST['id'];
$naam = $_POST['naam'];
$bericht = $_POST['bericht'];

$stmt = $conn->prepare("
    UPDATE reviews
    SET naam = ?, bericht = ?
    WHERE id = ?
");

$stmt->execute([$naam, $bericht, $id]);

header('location:index.php')
?>