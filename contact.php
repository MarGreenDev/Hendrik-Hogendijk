<?php
include 'includes/header.php'
    ?>
<?php
include 'includes/nav-bar.php'
    ?>
<h2 class="h2-banner" id="contact-banner">Neem contact op</h2>
<p class="contact-introduction">Ik streef ernaar om constant in contact te staan met onze klanten totdat de klus
    geklaard is. Als u
    vragen of
    speciale verzoeken heeft, stuur ons dan een bericht. Voor een vrijblijvende offerte kunt u contact met ons opnemen
    wanneer het u uitkomt. Wij zijn u graag van dienst!</p>

<div id="content-form-container">

    <div id="contact-information">
        <p>tel: 06 123465</p>
        <p>email: hendrikhogendijkhovenier@gmail.com</p>
        <p id="open_dates">openingstijden</p>
        <p>Maandag - vrijdag: 07.00 - 17.00 uur</p>
        <p>Zaterdag: Op afspraak</p>
        <p>Zondag: Gesloten</p>
    </div>

    <div id="contact-form">
        <form action="contact_verwerk.php" method="post">
            <input type="text" name="naam" placeholder="vul je naam in" class="form" required>
            <input type="email" name="email" placeholder="vul je email in" class="form" required>
            <input type="tel" name="phone-number" placeholder="telefoon nummer" class="form" required>
            <textarea name="message" placeholder="vul uw bericht in" class="form" required></textarea>
            <input type="submit" name="submit" placeholder="verzenden" id="submit-button">
        </form>
    </div>
</div>

<?php
include 'includes/footer.php' ?>