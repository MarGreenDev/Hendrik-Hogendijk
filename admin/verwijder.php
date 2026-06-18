<?php
include '../includes/connection.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE from reviews  WHERE id = '$id'";
    $result = $conn->query($query);

    if (!$result) {
        die("query failed" . $e->getMessage());
    }else{
        header('location:index.php?delete_msg= je hebt met succes een review verwijderd');
    }
}

?>