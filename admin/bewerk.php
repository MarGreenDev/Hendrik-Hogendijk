<?php

include '../includes/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$query = "SELECT * FROM `reviews` WHERE `id` = '$id'";
$result = $conn->query($query);

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
        
        <div class="modal_container">
            <div class="modal">
                <h2>Nieuwe review toevoegen</h2>
                <form action="add_review.php" method="POST">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>

                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" rows="4" required></textarea>

                    <div class="modal-buttons">
                        <button type="submit" class="btn btn-edit">Versturen</button>
                        <button type="button" class="btn btn-delete" id="closeModal">Annuleren</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>