<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php

function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    // $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date)=?");
    // $stmt->bind_param('ss', $month, $year);
    // $bookings = array();
    // if($stmt->execute()){
    //     $result = $stmt->get_result();
    //     if($result->num_rows>0){
    //         while($row = $result->fetch_assoc()){
    //             $bookings[] = $row['date'];
    //         }
    //         $stmt->close();
    //     }
    // }
    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('Luni', 'Marti','Miercuri','Joi','Vineri','Sambata','Duminica');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
    if($dayOfWeek==0){
        $dayOfWeek=6;
    }else{
        $dayOfWeek= $dayOfWeek-1;
    }

    // Create the table tag opener and day headers
     
    $datetoday = date('Y-m-d');
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-m btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Luna precedenta</a> ";
    
    $calendar.= " <a href='calendar.php' class='btn btn-m btn-primary' data-month='".date('m')."' data-year='".date('Y')."'>Luna curenta</a> ";
    
    $calendar.= "<a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."' class='btn btn-m btn-primary'>Luna urmatoare</a></center><br>";
    
    $calendar .= "<tr>";

    // Create the calendar headers
    foreach($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    } 
    
    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st.
    $currentDay = 1;
    $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

    if($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar .= "<td  class='empty'></td>"; 
        }
    }
    
     
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {
        //Seventh column (Saturday) reached. Start a new row.
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";
        // if($dayname=='saturday' || $dayname=='sunday'){
        //     $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-m book'>Weekend</button>";
        // }else
        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-m book' disabled>Indisponibil</button>";
        }
        //  elseif(in_array($date, $bookings)){
        //      $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
        //  }
        else{
            $totalbookings= checkSlots($mysqli,$date);
            if($totalbookings==3){
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-m book'>Total ocupat</a>";
            }else{
                $availableslots= 3-$totalbookings;
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-m book'>Rezerva</a>
                <br><small><i>$availableslots rezervari ramase</i></small>";
            }
            
        }
         
         
         $calendar .="</td>";
         //Increment counters
         $currentDay++;
         $dayOfWeek++;
     }
     
     //Complete the row of the last week in month, if necessary
     if ($dayOfWeek != 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($l=0;$l<$remainingDays;$l++){
            $calendar .= "<td class='empty'></td>"; 
        }
     }
     
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}


function checkSlots($mysqli,$date){
    $stmt = $mysqli->prepare("select * from bookings where date=?");
    $stmt->bind_param('s', $date);
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $totalbookings++;
            }
            $stmt->close();
        }
    }
    return $totalbookings;
}


?>

<?php include 'header.php' ?>
<style>
@media only screen and(max-width:760px),
(min-device-width:802px) and (max-device-width: 1020px){
    table,
    thead,
    tbody,
    th,
    td,
    tr{
        display: block;
    }
    
    .empty{
        display: none;
    }

    th{
        text-align: center;
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr{
        border: 1px solid #ccc;
    }

    td{
        border:none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
    }

    td:nth-of-type(1)::before{
        content: "Duminica";
    }

    td:nth-of-type(2)::before{
        content: "Luni";
    }

    td:nth-of-type(3)::before{
        content: "Marti";
    }

    td:nth-of-type(4)::before{
        content: "Miercuri";
    }

    td:nth-of-type(5)::before{
        content: "Joi";
    }

    td:nth-of-type(6)::before{
        content: "Vineri";
    }

    td:nth-of-type(7)::before{
        content: "Sambata";
    }
}

@media only screen and(min-device-width:320px) and (max-device-width: 480px){
    body{
        padding: 0;
        margin: 0;
    }
}

@media only screen and(min-device-width:802px) and (max-device-width: 1020px){
    body{
        width: 495px;
    }
}

@media (min-width:641px){
    table{
        table-layout: fixed;
    }
    td{
        width: 300px;
        text-align: center;
    }
}

/* .header1{
    border:2px solid black;
    background: #53a0ca;
}

h4{
    padding: 20px;
    border: 2px solid black;
} */
th{
    text-align: center;
}

.row{
    width: 100%;
    margin-top: 20px;
    text-align: center;
}

.today{
    background: yellow;
}

.container1{
    padding: 0 150px;
    margin-top: 100px;
}

.btn-danger, .btn-success{
    margin-top: 0;
}

.table{
    margin-bottom: 100px;
}


.rezerva{
    margin: 10px;
}

</style>

<body>
    <div class="container1">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $dateComponents = getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month= $_GET['month'];
                        $year= $_GET ['year'];
                    } else {
                        $month= $dateComponents['mon'];
                        $year= $dateComponents['year'];
                    }

                    echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>

</body>

<?php include 'footer.php' ?>