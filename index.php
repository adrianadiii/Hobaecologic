<?php
    $active= 'Acasa';
 include 'header.php' ?>

<?php include("includes/db.php"); ?>
<?php include("functions.php"); ?>


<body>
<div class="image-container">
    <img src="img/breathing2-min.jpg" alt="">
    <div class="program">
        <p>Program depozit:</p>
        <p>L-V: 8:30-17:00</p>
        <p>S-D: INCHIS</p>
    </div>
</div>


<div class="cine-suntem">
    <h1>Cine suntem?</h1>
    <p>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
    It has survived not only five centuries, but also the leap into electronic typesetting, 
    remaining essentially unchanged. It was popularised in the 1960s with the release of 
    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p> 
</div>
<div class="cine-suntem-image">
        <img src="img/de-la-specialisti.jpg" alt="">
    </div>


    <div class="titlu">
        <h2>Categorii de produse:</h2>
    </div>
    <div class="categorii-container">
    

    <?php getCats(); ?>

        <!-- <div class="Cat-1">
            <h2>Dotari complete pentru clinici, spitale, cabinete medicale, 
                camine de batrani, reparatii si service aparatura medicala
            </h2>
        </div>
        <div class="img-1">
            <a href="aparatura-medicala.php"><img src="img/logo-web.jpg" alt=""></a>
        </div>
        <div class="Cat-2">
            <h2>Truse de prim ajutor - pentru birou, industrie, restaurante, catering, 
                arsuri, genti, rucsacuri si cutii speciale pentru prim ajutor si interventii medicale
            </h2>
        </div>
        <div class="img-2">
            <img src="img/logo-web.jpg" alt="">
        </div>
        <div class="Cat-3">
            <h2>Hartie si consumabile medicale, produse pentru ingrijire la domiciliu si spitalicesti.
                Piese de schimb pentru aparatura medicala, saltele medicale si lenjerie medicala.   
            </h2>
        </div>
        <div class="img-3">
            <img src="img/logo-web.jpg" alt="">
        </div>
        <div class="Cat-4">
            <h2>Aparate si sisteme de odorizare, ozonificare si purificare a aerului ecologice.
                Dotari de toalete, camere de hotel, restaurante, baruri, birouri si terase.
            </h2>
        </div>
        <div class="img-4">
            <img src="img/logo-web.jpg" alt="">
        </div>
        <div class="Cat-5">
            <h2>Mobilier special pentru spatii publice si private, evenimente publice si private.
                Corturi fixe, pliabile, gonflabile si pneumatice, garduri si imprejurimi speciale.
            </h2>
        </div>
        <div class="img-5">
            <img src="img/logo-web.jpg" alt="">
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