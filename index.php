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
            <img src="img/logo-web.jpg" alt="">
        </div>
        <div class="prod-1-title">
            <h3>Manusi de uz casnic</h3>
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
           <img src="img/logo-web.jpg" alt="">
        </div>
        <div class="prod-3-title">
            <h3>Manusi de uz casnic</h3>
        </div>
    </div>
</div>


<div class="titlu">
    <h2>Categorii de produse:</h2>
</div>

<div class="new-container">

<?php getCats(); ?>
<!-- <a href="produse.php">
    <div class="categ-1 frame">
        <div class="poza1">
            <img src="img/hallway-5979689_1920.jpg" alt="">
        </div>
        <div class="categ-titlu1">
            <p>Dotari medicale si service</p>
        </div>
    </div>
</a>
    <div class="categ-2 frame">
        <div class="poza2">
            <img src="img/doctor-on-call-3482994_1920.jpg" alt="">
        </div>
        <div class="categ-titlu2">
            <p>Prim ajutor-urgente-genti medicale</p>
        </div>
    </div>
    <div class="categ-3 frame">
        <img src="img/pexels-nathan-cowley-713297.jpg" alt="">
        <p>Prim ajutor-urgente-genti medicale</p>
    </div>
    <div class="categ-4 frame">
        <img src="img/pexels-kaboompics-com-6267.jpg" alt="">
        <p>Prim ajutor-urgente-genti medicale</p>
    </div>
    <div class="categ-5 frame">
        <img src="img/garden-204271_1920.jpg" alt="">
        <p>Prim ajutor-urgente-genti medicale</p>
    </div>
    <div class="categ-6 frame">
        <img src="img/pexels-alexandr-podvalny-3036405.jpg" alt="">
        <p>Prim ajutor-urgente-genti medicale</p>
    </div> -->
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