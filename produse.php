<?php include 'header.php'; ?>

<div class="lista-produse">
<?php
    include_once("functions.php");
    getcatpros();

    getcatpro(); 
    
    function getcatpro(){
        if(isset($_GET['cat'])){
            $cat_id= $_GET['cat'];
            global $con;
            $per_page= 15;
            if(isset($_GET['page'])){
                $page= $_GET['page'];
            } else {
                $page= 1;
            }
            $start_from= ($page- 1) * $per_page;
            $query = "SELECT * FROM produse where cat_id='$cat_id' order by product_id ASC LIMIT $start_from, $per_page";
            $result= mysqli_query($con, $query);
            while($row_products= mysqli_fetch_array($result)){
                $cat_id= $row_products['cat_id'];
    
                $pro_id= $row_products['product_id'];
    
                $pro_title = $row_products['product_title'];
                
                $pro_desc_short = $row_products['product_desc_short'];
    
                $pro_desc = $row_products['product_desc'];
    
                $pro_img1 = $row_products['product_img1'];
    
                $pro_img2 = $row_products['product_img2'];
    
                $pro_img3 = $row_products['product_img3'];
    
                $pro_img4 = $row_products['product_img4'];
    
                echo "
                <div class='aparatura-container'>
                    <div class='Prod-1'>
                        <div class='image-1'>
                       <a href='details.php?cat=$cat_id&product_id=$pro_id&product_title=$pro_title'><img src='admin_area/product_images/$pro_img1' alt=''></a>
                        </div>
                        <div class='info-1'>
                            <p> $pro_desc_short</p>
                        </div>
                        <div class='titlu-1'>
                            <a class='modal-button button' href='details.php?cat=$cat_id&product_id=$pro_id&product_title=$pro_title'>$pro_title</button>
                            <!-- The Modal -->
                            <div id='myModal1-$pro_id' class='modal'>
    
                                <!-- Modal content -->
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <span class='close'>×</span>
                                        <h2> $pro_title </h2>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='slideshow-container'>
                                            <div id='slide1' class='mySlides1 fade'> 
                                            <div class='image img1'>
                                                    <img src='admin_area/product_images/$pro_img1' style='width:100%; height:660px;'>
                                            </div>
                                            </div>
                                            <div class='mySlides1 fade'>
                                                <div class='image img2'>
                                                    <img src='admin_area/product_images/$pro_img2' style='width:100%; height:660px;'>
                                                </div>
                                            </div>
                                            <div class='mySlides1 fade'>
                                                <div class='image img3'>
                                                    <img src='admin_area/product_images/$pro_img3' style='width:100%; height:660px;'>
                                                </div>
                                            </div>
                                            <div class='mySlides1 fade'>
                                                <div class='image img4'>
                                                    <img src='admin_area/product_images/$pro_img4' style='width:100%; height:660px;'>
                                                </div>
                                            </div>
                                                <a class='prev' onclick='plusSlides(-1, 0)'>&#10094;</a> 
                                                <a class='next' onclick='plusSlides(1, 0)'>&#10095;</a>
                                            <div style='text-align:center'> 
                                                <div class='dot' onclick='currentSlide(1)'></div> 
                                                <div class='dot' onclick='currentSlide(2)'></div> 
                                                <div class='dot' onclick='currentSlide(3)'></div> 
                                                <div class='dot' onclick='currentSlide(4)'></div> 
                                            </div>
                                        </div>
                                        <div class='full-text'>
                                            <p> $pro_desc </p>
                                            </div>
                                    </div>
                                    <div class='modal-footer'>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
    
                </div>
                ";
            }

?>
</div>
<div class="pagination">
<?php 
     $query = "select * from produse where cat_id='$cat_id'";
     $result= mysqli_query($con, $query);
     $total_records= mysqli_num_rows($result);
     $total_pages= ceil($total_records/ $per_page);

     if($total_pages == 0){
         echo " ";
     } elseif ($total_pages == 1){
         echo " ";
     } else {

        //  echo "
                         
        //      <li>
             
        //          <a href='produse.php?cat=$cat_id&page=1'> ".'First Page'." </a>
             
        //      </li>
         
        //  ";
        if($page > 1){
            echo "
            <li>
             
                <a href='produse.php?cat=$cat_id&page=1'> ".'Prima Pagina'." </a>
             
            </li>
            
        
        ";  
         }
                 
         for($i=1; $i<=$total_pages; $i++){
             
                 echo "
         
             <li>
             
                 <a href='produse.php?cat=$cat_id&page=".$i."'> ".$i." </a>
             
             </li>
         
         ";  
             
         };
         
         if($page > 2){
            echo "
            <li>
             
                <a href='produse.php?cat=$cat_id&page=$total_pages'> ".'Ultima Pagina'." </a>
             
            </li>
            
        
        ";  
         }       
        //  echo "
         
        //      <li>
             
        //          <a href='produse.php?cat=$cat_id&page=$total_pages'> ".'Last Page'." </a>
             
        //      </li>
         
        //  ";
     }
 }
}
?>
</div>

<?php include 'footer.php' ?>