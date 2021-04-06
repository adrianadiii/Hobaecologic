<?php
    $active= 'Acasa';
 include 'header.php' ?>

<?php include("includes/db.php"); ?>
<?php include("functions.php"); ?>


<body>
<div class="image-container">
    <img src="img/pexels-busi1.jpg" alt="business">
    <div class="program">
        <p>Program depozit:</p>
        <p>L-V: 8:30-17:00</p>
        <p>S-D : I N C H I S</p>
    </div>
</div>


<div class="cine-suntem">
    <h1>Cine suntem?</h1>
    <p>
    O companie românească, care este concentrată pe calitate, consultanță înainte de
    vânzare, respectarea cu strictețe a clientului, precum și a regulilor de business.
    </p> 
</div>
<!-- <div class="cine-suntem-image">
    <img src="img/de-la-specialisti.jpg" alt="">
</div> -->


<div class="produse-noi">
    <h1>Produse noi:</h1>
    <div class="produse-noi-container">
        <div class="prod-1-img">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=1&product_id=143&product_title=Pulsoximetru%20CMS%2050D">
                <img src="admin_area/product_images/pulsoximetru-cms.JPG" alt="">
            </a>
        </div>
        <div class="prod-1-title">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=1&product_id=143&product_title=Pulsoximetru%20CMS%2050D">
                <h3>Pulsoximetru CMS 50d</h3>
            </a>
        </div>
        <div class="prod-2-img">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=3&product_id=128&product_title=Pudra%20Pikosch">
                <img src="admin_area/product_images/pudra-pikosch.JPG" alt="">
            </a>
        </div>
        <div class="prod-2-title">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=3&product_id=128&product_title=Pudra%20Pikosch">
                <h3>Pudra Pikosch</h3>
            </a>
        </div>
        <div class="prod-3-img">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=4&product_id=145&product_title=Gel%20antibacterian%20instant%20Sanitex">
                <img src="admin_area/product_images//gel-antibacterian-sanitex.JPG" alt="">
            </a>
        </div>
        <div class="prod-3-title">
            <a href="http://localhost/Hobaecologic.ro/details.php?cat=4&product_id=145&product_title=Gel%20antibacterian%20instant%20Sanitex">
                <h3>Gel antibacterian instant Sanitex</h3>
            </a>
        </div>
    </div>
</div>


<div class="titlu">
    <h2>Categorii de produse:</h2>
</div>

<div class="new-container">

<?php getCats(); ?>

</div>





    <!-- <div class="utile">
        <div class="titlu-link">
            <h1>Puteti gasi produsele noastre si pe:</h1>
        </div>
        <div class="link-1">
            <a href="https://www.bizoo.ro/firma/hobatechnic/">https://www.bizoo.ro/firma/hobatechnic/</a>
        </div>
        <div class="link-2">
            <a href="https://www.romedic.ro/hobaecologic">https://www.romedic.ro/hobaecologic</a>
        </div>
    </div> -->

<?php include 'footer.php' ?>