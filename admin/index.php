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
                <h2 id="modalTitel">Nieuwe review toevoegen</h2>
                <form action="voeg_toe.php" method="POST" id="modalForm">
                    <input type="hidden" name="id" id="modal_id">

                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>

                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" rows="4" required></textarea>

                    <div class="modal-buttons">
                        <button type="submit" class="btn btn-edit" id="modalSubmit">Versturen</button>
                        <button type="button" class="btn btn-delete" id="closeModal">Annuleren</button>
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
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-edit bewerkBtn" data-id="<?php echo $row['id']; ?>"
                                data-naam="<?php echo htmlspecialchars($row['naam']); ?>"
                                data-bericht="<?php echo htmlspecialchars($row['bericht']); ?>">
                                Bewerk
                            </a>
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
        const modalTitel = document.getElementById('modalTitel');
        const modalForm = document.getElementById('modalForm');
        const modalSubmit = document.getElementById('modalSubmit');

        // add knop - leeg formulier
        document.getElementById('openModal').addEventListener('click', () => {
            modalTitel.textContent = 'Nieuwe review toevoegen';
            modalForm.action = 'voeg_toe.php';
            modalSubmit.textContent = 'Versturen';

            // velden leegmaken
            document.getElementById('modal_id').value = '';
            document.getElementById('naam').value = '';
            document.getElementById('bericht').value = '';

            modal.classList.add('actief');
        });

        // bewerk knoppen - formulier vooraf invullen
        document.querySelectorAll('.bewerkBtn').forEach(knop => {
            knop.addEventListener('click', (e) => {
                e.preventDefault();

                modalTitel.textContent = 'Review bewerken';
                modalSubmit.textContent = 'Opslaan';

                // velden invullen met bestaande data
                document.getElementById('modal_id').value = knop.dataset.id;
                document.getElementById('naam').value = knop.dataset.naam;
                document.getElementById('bericht').value = knop.dataset.bericht;

                modal.classList.add('actief');
            });
        });

        // sluiten
        document.getElementById('closeModal').addEventListener('click', () => {
            modal.classList.remove('actief');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('actief');
            }
        });
    </script>
</body>

</html>