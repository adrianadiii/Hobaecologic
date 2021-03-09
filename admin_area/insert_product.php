<?php 

include("includes/db1.php");

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: login.php');
}

include("includes/db.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <style>
.logout{
    align-self: center;
    width: 10%;
    padding: 8px;
    color: #ffffff;
    background: #191970;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 0;
    transition: 1s;
}

.logout:hover{
    background: #5959b9;
    transition: 1s;
}
.insert a{
    align-self: center;
    width: 10%;
    padding: 8px;
    color: #ffffff;
    background: #53a0ca;
    border: none;
    text-decoration: none;
    border-radius: 6px;
    font-size: 18px;
    margin: 12px 0;
    transition: 1s;
}

    </style>
</head>
<body>

<h2>Hello Admin</h2>

<form method='post' action="">
    <input class="logout" type="submit" value="Logout" name="logout">
</form>

<ul class="insert">
<a href="http://localhost/Hobaecologic.ro/admin_area/insert_category.php">Insert Category</a>
</ul>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fas fa-tachometer-alt"></i> Insert Products
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa-money-bill-alt"></i> Insert Product
                </h3>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <div class="col-md-6">
                            <input name="product_title" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label>
                        <div class="col-md-6">
                            <select name="cat" class="form-control">
                                <option>Selecteaza o categorie</option>

                                <?php 
                                    $get_cat = "select * from categorii";
                                    $run_cat = mysqli_query($con, $get_cat);

                                    while($row_cat = mysqli_fetch_array($run_cat)){
                                        $cat_id = $row_cat['cat_id'];
                                        $cat_title = $row_cat['cat_title'];

                                        echo "
                                        <option value='$cat_id'> $cat_title</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product image 1</label>
                        <div class="col-md-6">
                            <input name="product_img1" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product image 2</label>
                        <div class="col-md-6">
                            <input name="product_img2" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product image 3</label>
                        <div class="col-md-6">
                            <input name="product_img3" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product image 4</label>
                        <div class="col-md-6">
                            <input name="product_img4" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product description short</label>
                        <div class="col-md-6">
                            <textarea name="product_desc_short" cols="19" rows="6" type="text" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product description</label>
                        <div class="col-md-6">
                        <textarea name="product_desc" cols="19" rows="6" type="text" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 

    if(isset($_POST['submit'])){

        $product_title= $_POST['product_title'];
        $cat= $_POST['cat'];
        $product_desc_short= $_POST['product_desc_short'];
        $product_desc= $_POST['product_desc'];

        $product_img1= $_FILES['product_img1']['name'];
        $product_img2= $_FILES['product_img2']['name'];
        $product_img3= $_FILES['product_img3']['name'];
        $product_img4= $_FILES['product_img4']['name'];

        $temp_name1= $_FILES['product_img1']['tmp_name'];
        $temp_name2= $_FILES['product_img2']['tmp_name'];
        $temp_name3= $_FILES['product_img3']['tmp_name'];
        $temp_name4= $_FILES['product_img4']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        move_uploaded_file($temp_name4,"product_images/$product_img4");

        $insert_product = "insert into produse (cat_id, date, product_title, product_img1, product_img2, product_img3, product_img4, product_desc_short, product_desc)
        values ('$cat',NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_img4', '$product_desc_short', '$product_desc')";

        $run_product = mysqli_query($con, $insert_product);

        if($run_product){
            echo "<script>alert('Produsul a fost inregistrat!')</script>";
            echo "<script>window.open('insert_product.php')</script>";
        }
    }

?>