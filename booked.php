<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php include 'header.php' ?>

<?php 

if(isset($_GET['date'])){
    $date=$_GET['date'];
}


?>

<style>

.container3{
    margin-top: 100px;
    margin-bottom: 300px;
    text-align: center;
}


</style>


<body>
<div class="container3">
    <h1 class="text-center"><?php echo date('d/m/Y',strtotime($date)); ?> este Rezervata</h1><br>
    <div class="row1">
        <div class="col-md-6 col-md-offset-3">
            <?php echo isset($msg)?$msg:''; ?>
            <form action="" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="">Nume</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Rezerva</button>
            </form>
        </div>
    </div>
</div>
</body>

<?php include 'footer.php' ?>