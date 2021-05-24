<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php include 'header.php' ?>

<?php 

if(isset($_GET['date'])){
    $date=$_GET['date'];
}

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mysqli= new mysqli('localhost','root', '','bookingcalendar');
    $stmt= $mysqli->prepare("INSERT INTO bookings(name,email,date)VALUES(?,?,?)");
    $stmt->bind_param('sss',$name,$email,$date);
    $stmt->execute();
    $msg="<div class='alert alert-success'>Rezervare efectuata cu success</div>";
    $stmt->close();
    $mysqli->close();
}

?>


<style>

.container2{
    margin-top: 100px;
    margin-bottom: 300px;
    text-align: center;
}


</style>

<body>
    
<div class="container2">
    <h1 class="text-center">Rezerva pentru Data: <?php echo date('d/m/Y',strtotime($date)); ?></h1><br>
    <div class="row1">
        <div class="col-md-6 col-md-offset-3">
            <?php echo isset($msg)?$msg:''; ?>
            <form action="" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="">Nume</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Rezerva</button>
            </form>
        </div>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

</body>

<?php include 'footer.php' ?>