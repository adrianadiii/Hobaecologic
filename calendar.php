<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<?php 

    function build_calendar($month, $year){

        $mysqli= new mysqli('localhost','root','','bookingcalendar');
        $stmt= $mysqli->prepare('select * from bookings where MONTH(date)=? AND YEAR(date)=?');
        $stmt->bind_param('ss',$month,$year);
        $bookings= array();
        if($stmt->execute()){
            $result= $stmt-> get_result();
            if($result->num_rows>0){
                while($row= $result-> fetch_assoc()){
                    $bookings[]=$row['date'];
                }
                $stmt->close();
            }
        }


        $daysOfWeek = array ('Luni','Marti','Miercuri','Joi','Vineri','Sambata','Duminica');
        $firstDayOfMonth = mktime(0,0,0,$month, 1, $year);
        $numberDays = date('t', $firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $monthName = $dateComponents['month'];
        $dayOfWeek = $dateComponents['wday'];

        if($dayOfWeek==0){
            $dayOfWeek=6;
        }else {
            $dayOfWeek=$dayOfWeek-1;
        }

        $dateToday = date('Y-m-d');
        
        $prev_month = date('m', mktime(0,0,0,$month-1,1,$year));
        $prev_year = date('Y', mktime(0,0,0,$month-1,1,$year));
        $next_month = date('m', mktime(0,0,0,$month+1,1,$year));
        $next_year = date('Y', mktime(0,0,0,$month+1,1,$year));
        $calendar = "<center><h2>$monthName $year</h2>";
        $calendar.= "<a class='btn btn-primary btn-s' href='?month=".$prev_month."&year=".$prev_year."'>Luna precendenta</a>";
        $calendar.= "<a class='btn btn-primary btn-s' href='?month=".date('m')."&year=".date('Y')."'>Luna curenta</a>";
        $calendar.= "<a class='btn btn-primary btn-s' href='?month=".$next_month."&year=".$next_year."'>Luna Umratoare</a></center>";
        $calendar.= "<br><table class='table table-bordered'>";
        $calendar.= "<tr>";

        foreach($daysOfWeek as $day){
            $calendar.="<th class='header1'>$day</th>";
        }

        $calendar.="</tr><tr>";
        $currentDay=1;


        if($dayOfWeek>0){
            for($k=0; $k< $dayOfWeek; $k++){
                $calendar.="<td class='empty'></td>";
            }
        }

        $month= str_pad($month, 2, "0", STR_PAD_LEFT);
        while($currentDay <= $numberDays){
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar.= "</tr><tr>";
            }

            $currentDayRel= str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $dayName = strtolower(date('I',strtotime($date)));
            $today= $date == date('Y-m-d') ? 'today':'';
            if($date<date('Y-m-d')){
                $calendar.= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-s'>Indisponibil</button></td>";
            }elseif(in_array($date,$bookings)){
                $calendar.= "<td class='$today'><h4>$currentDay</h4><button class='btn btn-danger btn-s'>Ocupat</button></td>";
            }else {
                $calendar.= "<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-s'>Liber</a></td>";
            }

            $currentDay++;
            $dayOfWeek++;
        }

        if($dayOfWeek <7){
            $remainingDays= 7- $dayOfWeek;
            for($i=0;$i<$remainingDays; $i++){
                $calendar.= "<td class='empty'></td>";
            }
        }

        $calendar.= "</tr><table>";

        return $calendar;
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

.row{
    margin-top: 20px;
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