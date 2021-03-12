<?php 
    $active= 'Contact';
include 'header.php' ?>

<!--WHERE YOU FIND US-->
<div class="image-contact">
    <img src="img/contact-us.jpg" alt="contact us">
</div>

<div class="find-us">
  <h2>Ne puteti gasi si:</h2>

    <div class="contact-container">
        <div class="Adresa">
            <div class="image-map">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="locatie">
                <strong> <p>Adresa: <br>
                Strada Adam Muller Guttenbrunn 56, 
                <br> ARAD 310254</p></strong>
            </div>
        </div>
        <div class="Email">
            <div class="image-email">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div class="adresa-email">
                <strong><p>E-mail: <br>
                info@hobaecologic.ro</p></strong>
            </div>
        </div>
        <div class="Telefon">
            <div class="image-numar">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <div class="numar-telefon">
                <strong> <p>Telefon: <br>
                +40 257 277 220</p></strong>
            </div>
        </div>
    </div>
</div>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2763.9333102868836!2d21.32520661583612!3d46.152074095300655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4745990a77001609%3A0x858bd8da53f58e58!2sHOBA%20ECOLOGIC%20AIR%20SYSTEM!5e0!3m2!1sro!2sro!4v1608192991792!5m2!1sro!2sro" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<?php include 'send_mail.php' ?>

<div class="container">
    <div class="contactus">
        <form action="contact.php" method="POST">
            <h1>Aveti intrebari? Nu ezitati sa ne scrieti:</h1>
            <div class="item name_email">
                <input type="text" name="nume" placeholder="Nume*" required>
                <input type="text" name="prenume" placeholder="Prenume*" required>
            </div>
            <div class="item name_email">
                <input type="email" name="email" placeholder="Email*" required>
                <input type="tel" name="telefon" placeholder="Telefon" >
            </div>
            <div class="item">
                <textarea name="mesaj" placeholder="Mesajul dumneavoastra*" required></textarea>
            </div>
            <div class="robot">
                <input type="checkbox" value="check" required name="check">
                <p>Nu sunt robot*</p>
            </div>
            <div class="btn">
                <input  name="submit" type="submit" value="SUBMIT">
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>