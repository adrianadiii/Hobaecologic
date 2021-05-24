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

<div class="beneficii-widget">
  <div class="beneficiu-1">
    <div class="icon-1"><img src="img/express-delivery.png" width="100px" height="100px" alt=""></div>
    <div class="text-icon-1">
        <p>Livrare rapida, max 48h</p>
    </div>
  </div>
  <div class="beneficiu-2">
    <div class="icon-2"><img src="img/exchange.png" width="100px" height="100px" alt=""></div>
    <div class="text-icon-2">
        <p>Garantie retur 30 de zile</p>
    </div>
  </div>
  <div class="beneficiu-3">
    <div class="icon-3"><img src="img/guarantee-certificate.png" width="100px" height="100px" alt=""></div>
    <div class="text-icon-3">
        <p>Garantie produs 36 de luni</p>
    </div>
  </div>
  <div class="beneficiu-4">
    <div class="icon-4"><img src="img/export.png" width="100px" height="100px" alt=""></div>
    <div class="text-icon-4">
        <p>Import direct</p>
    </div>
  </div>
  <div class="beneficiu-5">
    <div class="icon-5"><img src="img/repair-tools.png" width="100px" height="100px" alt=""></div>
    <div class="text-icon-5">
        <p>Service/reparatii</p>
    </div>
  </div>
  <div class="beneficiu-6">
    <div class="icon-6"><img src="img/warehouse.png" width="100px" height="100px" alt=""></i></div>
    <div class="text-icon-6">
        <p>Livrare din stoc</p>
    </div>
  </div>
</div>


<div class="titlu">
    <h2>Categorii de produse:</h2>
</div>

<div class="new-container">

<?php getCats(); ?>

</div>

<div class="rights">
    <p>Toate imaginile si logo-urile folosite in acest website sunt proprietate a HEAS sau a partenerilor nostri.
        Orice utilizare a acestora necesita solicitarea dreptului de folosinta de la HEAS.
    </p>
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