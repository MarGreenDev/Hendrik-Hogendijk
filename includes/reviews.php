<?php
include_once 'includes/connection.php';
$sql = "SELECT * from reviews";
$result = $conn->query($sql);



?>
<div class="review_container">

    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="review_slide">
            <div class="review_card">
                <div class="username"><?= $row['naam'] ?></div>
                <p class="review_text"><?= $row['bericht'] ?></p>
            </div>
        </div>

    <?php } ?>

        <!-- prev and next buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>