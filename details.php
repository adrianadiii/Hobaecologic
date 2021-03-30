<?php include 'header.php' ?>
<div class="produse-container">
<div class="detalii-produse">

<div class="modal-header">
    <h2><?php echo $pro_title; ?> </h2>
</div>

<div class="slideshow-container">
    <div id="slide1" class="mySlides1 fade"> 
        <div class="image img1">
                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" >
        </div>
        </div>
        <div class="mySlides1 fade">
            <div class="image img2">
                <img src="admin_area/product_images/<?php echo $pro_img2; ?>" >
            </div>
        </div>
        <div class="mySlides1 fade">
            <div class="image img3">
                <img src="admin_area/product_images/<?php echo $pro_img3; ?>" >
            </div>
        </div>
        <div class="mySlides1 fade">
            <div class="image img4">
                <img src="admin_area/product_images/<?php echo $pro_img4; ?>" >
            </div>
        </div>
            <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a> 
            <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
        <div style="text-align:center"> 
            <div class="dot" onclick="currentSlide(1, 0)"></div> 
            <div class="dot" onclick="currentSlide(2, 1)"></div> 
            <div class="dot" onclick="currentSlide(3, 2)"></div> 
            <div class="dot" onclick="currentSlide(4, 3)"></div> 
        </div>
    </div>
    <div class="full-text">
        <p><?php echo $pro_desc; ?> </p>
    </div>
</div>
</div>

<div class="button-oferta">
    <a onclick="cereoferta('oferta')">Cere o oferta!</a>
</div>

<?php include 'send_mail.php' ?>

<div class="container-oferta" id="oferta" style="display:none">
    <div class="contact-us">
        <form action="contact.php" method="POST">
            <div class="item-1 name-email">
                <input class="mesaj" type="text" name="nume-1" placeholder="Nume*" required>
                <input class="mesaj" type="text" name="prenume-1" placeholder="Prenume*" required>
            </div>
            <div class="item-1 name-email">
                <input class="mesaj" type="email" name="email-1" placeholder="Email*" required>
                <input class="mesaj" type="tel" name="telefon-1" placeholder="Telefon" >
            </div>
            <div class="item-1">
                <textarea name="mesaj-1"  required>Buna ziua! As dori sa primesc mai multe informatii in legatura cu produsul <?php echo $pro_title; ?></textarea>
            </div>
            <div class="robot1">
                <input class="mesaj" type="checkbox" value="check" required name="check">
                <p>Nu sunt robot*</p>
            </div>
            <div class="btn-oferta">
                <input name="submit1" type="submit" value="SUBMIT">
            </div>
        </form>
    </div>
</div>


<?php include 'footer.php' ?>