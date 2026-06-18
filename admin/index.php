<?php include '../includes/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>welkom bij de admin pagina</h1>
    </header>


    <div id="houder">

        <?php if (isset($_GET['delete_msg'])) {
            echo "<h6>" . $_GET['delete_msg'] . "</h6>";
        } ?>

        <button class="add" id="openModal">voeg een review toe</button>

        <div class="modal-overlay" id="addModal">
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



        <div class="modal-overlay" id="BewerkModal">
            <div class="modal">
                <h2>bewerk</h2>
                <form action="bewerk.php" method="POST">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>

                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" rows="4" required></textarea>

                    <div class="modal-buttons">
                        <button type="submit" class="btn btn-edit">Versturen</button>
                        <button type="button" class="btn btn-delete" id="closeBewerkModal">Annuleren</button>
                    </div>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>naam</th>
                    <th>bericht</th>
                    <th>bewerk de reviews</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM `reviews`";
                $result = $conn->query($query);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                ?>

                    <tr>
                        <td><?php echo $row['naam']; ?></td>
                        <td><?php echo $row['bericht']; ?></td>
                        <td>
                            <button class="add" id="openBewerkModal">Bewerk</button>
                            <a href="verwijder.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Verwijder</a>
                        </td>
                    </tr>

                <?php
                }

                ?>
            </tbody>
        </table>
    </div>

    <script>
        const modal = document.getElementById('addModal');
        const bewerkModal = document.getElementById('BewerkModal');

        document.getElementById('openModal').addEventListener('click', () => {
            modal.classList.add('actief');
        });

        document.getElementById('openBewerkModal').addEventListener('click', () => {
            bewerkModal.classList.add('actief');
        })

        document.getElementById('closeModal').addEventListener('click', () => {
            modal.classList.remove('actief');
        });

        document.getElementById('closeBewerkModal').addEventListener('click', () => {
            bewerkModal.classList.remove('actief');
        });

        // sluit ook als je buiten het venster klikt
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('actief');
            }
        });
    </script>
</body>

</html>