<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php 


if(isset($_GET['date'])){
    $date=$_GET['date'];
}

function build_calendar(){
    // if(isset($_GET['date'])){
    // $date=$_GET['date'];
    // }

    // if(isset($_POST['submit'])){
    //     $name= $_POST['name'];
    //     $email= $_POST['email'];
    //     $mysqli= new mysqli('localhost','root', '','bookingcalendar');
    //     $stmt= $mysqli->prepare("INSERT INTO bookings(name,email,date)VALUES(?,?,?)");
    //     $stmt->bind_param('sss',$name,$email,$date);
    //     $stmt->execute();
    //     $msg="<div class='alert alert-success'>Rezervare efectuata cu success</div>";
    //     $stmt->close();
    //     $mysqli->close();
    // }

    // $mysqli= new mysqli('localhost','root','','bookingcalendar');
    // $stmt= $mysqli->prepare('select * from rezervari');
    // $rezervari= "";
    // if($stmt->execute()){
    //     $result= $stmt->get_result();
    //     if($result->num_rows>0){
    //         while($row=$result->fetch_assoc()){
    //             $rezervari.= "<a href='book.php?date=".$date."?cat-".$row['id']."?name-".$row['nume']."'><button type='button' date-toggle='modal' data-target='#myModal' class='btn btn-success btn-s rezerva' id='room_select' value=".$row['id'].">".$row['nume']."</button></a>";
    //         }
    //         $stmt->close();
    //     }
    // }

    // $calendar= "<br>
    //     <div class='rezervare'>
    //             <label>Rezerva</label><br>
    //             ".$rezervari."
    //     </div>";

    //     return $calendar;

}


?>

<style>

.container4{
    margin-top: 100px;
    margin-bottom: 300px;
    text-align: center;
}

.rezervare{
    margin-bottom: 200px;
}

.rezerva {
    margin: 10px;
}


</style>

<?php include 'header.php' ?>
<div class="container4">
    <h1 class="text-center"><?php echo date('d/m/Y',strtotime($date)); ?></h1><br>

    <?php 
        // $dateComponents = getdate();
        // if(isset($_GET['month']) && isset($_GET['year'])){
        //     $month= $_GET['month'];
        //     $year= $_GET ['year'];
        // } else {
        //     $month= $dateComponents['mon'];
        //     $year= $dateComponents['year'];
        // }

        // echo build_calendar();
    ?>

<?php include 'footer.php' ?>