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

include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Category</title>

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
    margin: 0px 130px;
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
<a href="http://localhost/Hobaecologic.ro/admin_area/insert_product.php">Insert Product</a>
</ul>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fas fa-tachometer-alt"></i> Insert Image Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa-money-bill-alt"></i> Insert Category image
                </h3>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label>
                        <div class="col-md-6">
                            <select name="cat_id" class="form-control">
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
                        <label class="col-md-3 control-label">Category image</label>
                        <div class="col-md-6">
                            <input name="cat_image" type="file" class="form-control" >
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

        $cat_id= $_POST['cat_id'];

        $cat_img= $_FILES['cat_image']['name'];

        $temp_name= $_FILES['cat_image']['tmp_name'];
       
        move_uploaded_file($temp_name,"product_images/$cat_img");

        $insert_category = "INSERT INTO `imagini_categorii`(`cat_id`, `date`, `cat_image`) VALUES ('$cat_id',NOW(),'$cat_img')";

        $run_cat = mysqli_query($con, $insert_category);

        if($run_cat){
            echo "<script>alert('Imaginea a fost inregistrata cu succes!')</script>";
            echo "<script>window.open('insert_product.php')</script>";
        }
    }
?>