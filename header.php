<?php 

include ("includes/db.php");

if(isset($_GET['product_id'])){
  $pro_id =$_GET['product_id'];
  $get_product= "select * from produse where product_id='$pro_id'";
  $run_product= mysqli_query($con, $get_product);
  $row_product= mysqli_fetch_array($run_product);
  
  $pro_id = $row_product['product_id'];

  $pro_title = $row_product['product_title'];
            
  $pro_desc_short = $row_product['product_desc_short'];

  $pro_desc = $row_product['product_desc'];

  $pro_img1 = $row_product['product_img1'];

  $pro_img2 = $row_product['product_img2'];

  $pro_img3 = $row_product['product_img3'];

  $pro_img4 = $row_product['product_img4'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hoba Ecologic Air System</title>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/responsive.css">
    <link rel="stylesheet" href="style/gdpr.css">
    <link rel="stylesheet" href="style/cookie.css">
    <link rel="stylesheet" href="style/produse.css">
    <link rel="stylesheet" href="style/conditii_generale.css">

    <link href="https://admin.chatcompose.com/static/all/global/export/css/main.5b1bd1fd.css" rel="stylesheet">
    <script async type="text/javascript" src="https://admin.chatcompose.com/static/all/global/export/js/main.a7059cb5.js?user=adrian123&lang=RO" user="adrian123" lang="RO"></script>


<!-- Start of ChatBot (www.chatbot.com) code -->
<!-- <script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "608911280c90bd0007963eff";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script> -->
<!-- End of ChatBot code -->

<!-- Smartsupp Live Chat script -->
<!-- <script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a37b6327c589bf8d4971e8621a80da7504521daa';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script> -->

</head>
<header>
  <nav id="myDiv">
    <input class="navbar" type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><a href="index.php"><img src="img/logo-hoba-1.png" alt="Hoba Ecologic"></a></label>
    <ul class="navbar-links">
      <li><a class="btn <?php if($active == 'Acasa') echo"active"; ?>" id="acasa" href="index.php">Acasa</a></li>
      <li><a class="btn <?php if($active == 'Despre Noi') echo"active"; ?>" id="despre" href="despre_noi.php">Despre noi</a></li>
      <li><a class="btn <?php if($active == 'Contact') echo"active"; ?>" id="contact" href="contact.php">Contact</a></li>
      <li><a class="btn <?php if($active == 'Conditii Generale') echo"active"; ?>" id="conditii" href="conditii_generale.php">Conditii generale</a></li>
      <li><a class="btn <?php if($active == 'Certificari') echo"active"; ?>" id="certificari" href="certificari.php">Certificari</a></li>
      <li><a class="btn <?php if($active == 'Calendar') echo"active"; ?>" id="calendar" href="calendar.php">Calendar</a></li>
    </ul>
  </nav>
</header>