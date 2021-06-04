<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php include 'header.php' ?>


<?php
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    if(isset($_GET['date'])){
        $date = $_GET['date'];
        $stmt = $mysqli->prepare("select * from bookings where date = ?");
        $stmt->bind_param('s', $date);
        $bookings = array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $bookings[] = $row['timeslot'];
                }
                $stmt->close();
            }
        }
    }
    
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $timeslot = $_POST['timeslot'];
        $mesaj = $_POST['mesaj'];
        $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot=?");
        $stmt->bind_param('ss', $date, $timeslot);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                $msg = "<div class='alert alert-danger'>Already Booked</div>";
            }else{
                $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, email, date, mesaj) VALUES (?,?,?,?,?)");
                $stmt->bind_param('sssss', $name, $timeslot, $email, $date, $mesaj);
                $stmt->execute();
                $msg = "<div class='alert alert-success'>Rezervare efectuata cu succes. Te vom contacta in scurt timp pentru mai multe detalii.</div>";
                $bookings[] = $timeslot;
                $stmt->close();
                $mysqli->close();
            }
        }
    }
    
    
    $duration = 20;
    $cleanup = 0;
    $start = "09:00";
    $end = "10:00";
    
    
    function timeslots($duration, $cleanup, $start, $end){
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT".$duration."M");
        $cleanupInterval = new DateInterval("PT".$cleanup."M");
        $slots = array();
        
        for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if($endPeriod>$end){
                break;
            }
            
            $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
            
        }
        
        return $slots;
    }


?>


<style>

.container2{
    margin-top: 100px;
    margin-bottom: 370px;
    text-align: center;
}

.modal-header1{
    text-align: center;
    padding: 15px 30px;
}

.modal-body1{
    display: inherit;
    padding: 15px 30px;
}

/* The Modal (background) */
.modal-1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 12166; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  border-radius: 20px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

<body>


    
    <div class="container2">
        <h1 class="text-center">Rezerva pentru data de: <?php echo date('d-m-Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-3">
                <?php echo(isset($msg))?$msg:""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
                foreach($timeslots as $ts){
            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts,$bookings)){ ?>
                        <button class="btn btn-danger"><?php echo $ts; ?></button>
                    <?php }else{ ?>
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

     <div id="myModal" class="modal-1 fade1" role="dialog">
        <div class="modal-dialog">

          <!--  Modal content-->
            <div class="modal-content1">
                <div class="modal-header1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rezerva pentru data de: <?php echo date('d-m-Y', strtotime($date)); ?><br><span id="slot"></span></h4>
                </div>
                <div class="modal-body1">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Nume</label>
                                    <input required type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input required type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Mesaj</label>
                                    <input required type="text" class="form-control" name="mesaj">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" value="check" required name="check">
                                    <p>Nu sunt robot*</p>
                                </div>
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    });
    </script>
</body>

<?php include 'footer.php' ?>