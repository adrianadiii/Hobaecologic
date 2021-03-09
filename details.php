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

<?php include 'footer.php' ?>