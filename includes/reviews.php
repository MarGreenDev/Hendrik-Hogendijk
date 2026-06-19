<div class="review_container">
    <?php
    $query = "SELECT * FROM `reviews`";
    $result = $conn->query($query);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="review_slide">
            <div class="review_card">
                <div class="username"><?php echo $row['naam']; ?></div>
                <p class="review_text"> <?php echo $row['bericht']; ?></p>
            </div>

        </div>
        <!-- prev and next buttons -->
        <?php
    }
    ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

