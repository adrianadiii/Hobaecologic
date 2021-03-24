<?php 
    $db = mysqli_connect("localhost","root","","product_database"); 

    

function getCats(){

    global $db;

    $get_category = "select * from categorii";
    
    $run_category = mysqli_query($db, $get_category);

    $row_category= mysqli_fetch_array($run_category);

        $cat_id= $row_category['cat_id'];
        
        $get_image_category= "select * from imagini_categorii ";

        $run_image_category= mysqli_query($db,$get_image_category);
    
    
    while($row_image_category= mysqli_fetch_array($run_image_category)){
        
        $get_category = "select * from categorii where cat_id='$cat_id'";
    
        $run_category = mysqli_query($db, $get_category);

        $row_category= mysqli_fetch_array($run_category);

        $cat_id= $row_category['cat_id'];

        $cat_title= $row_category['cat_title'];
        
        $cat_id= $row_image_category['cat_id'];
        
        $cat_title= $row_image_category['cat_title'];
        
        $cat_image= $row_image_category['cat_image'];

        // echo "<div class='cat-prod'>
        //         <a href='produse.php?cat=$cat_id&category=$cat_title'>
        //             <div class='Cat-1'>
        //                 <h2>$cat_title</h2>
        //             </div>
        //         </a>
        //         <a href='produse.php?cat=$cat_id&category=$cat_title'>
        //             <div class='img-1'>
        //                 <img src='admin_area/product_images/categorii_images/$cat_image' alt=''>
        //             </div>
        //         </a>
        //     </div>
        //     ";
        echo " <a href='produse.php?cat=$cat_id&category=$cat_title'>
            <div class='categ-1 frame'>
                <div class='poza1'>
                    <img src='admin_area/product_images/categorii_images/$cat_image' alt=''>
                </div>
                <div class='categ-titlu1'>
                    <p>$cat_title</p>
                </div>
            </div>
        </a>       
        ";
    }


}




function getcatpros(){
    global $db;

    if(isset($_GET['cat'])){

        $cat_id = $_GET['cat'];

        $get_category = "select * from categorii where cat_id='$cat_id' ";

        $run_category = mysqli_query($db, $get_category);

        $row_category = mysqli_fetch_array($run_category);

        $cat_title = $row_category['cat_title'];

        $cat_desc = $row_category['cat_desc'];

        $get_image_category= "select * from imagini_categorii where cat_id='$cat_id'";

        $run_image_category= mysqli_query($db,$get_image_category);

        $row_image_category= mysqli_fetch_array($run_image_category);

        $cat_id= $row_image_category['cat_id'];
                
        $cat_image= $row_image_category['cat_image'];

        $get_products = "select * from produse where cat_id='$cat_id' ";

        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);

        if($count == 0){
            echo "
                <div class='produse-aparatura-medicala'>
                    <h1>Nu sunt produse in aceasta categorie </h1>
                </div>
                ";
        } else {
            echo "
                <div class='produse-aparatura-medicala'>
                <img src='admin_area/product_images/categorii_images/$cat_image' alt=''>
                    <h1> $cat_title </h1>
                    <p> $cat_desc </p>
                </div>
                ";
        }
    }
}




?>