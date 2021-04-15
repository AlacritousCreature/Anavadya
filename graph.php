<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'login')
    or die('error connect to server');
date_default_timezone_set('Asia/Kolkata');
$td = date("Y-m-d", time());
$th = date("H", time());
$room = $_GET['room'];
$query = "SELECT * FROM roomoccupncy where DATE(timeVal)='" . $td . "'AND roomno=" . $room . " AND HOUR(timeVal) <='" . $th . "'";
$result = mysqli_query($connect, $query);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ time: '" . $row["timeVal"] . "', occupancy: " . $row["strength"] . "}, ";
}
if ($chart_data == '') {
    $temp = "INSERT into roomoccupncy (timeVal, roomno, strength) VALUES";
    $sql = "";
    for ($i = 0; $i <= 8; $i++) {
        $temp = $temp . "('" . $td . " 0" . $i . ":00:00', " . $room . ", 0), ";
    }
    $temp = $temp . "('" . $td . " 0" . $i . ":00:00', " . $room . ", 5), ";
    for ($i = 10; $i <= 20; $i++) {
        $temp = $temp . "('" . $td . " " . $i . ":00:00', " . $room . ", " . rand(20, 45) . "), ";
    }
    for ($i = 21; $i <= 23; $i++) {
        $temp = $temp . "('" . $td . " " . $i . ":00:00', " . $room . ", 0), ";
    }
    $temp = substr($temp, 0, -2);
    if (mysqli_query($connect, $temp)) {
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($result)) {
            $chart_data .= "{ time: '" . $row["timeVal"] . "', occupancy: " . $row["strength"] . "}, ";
        }
    } else {
        echo "fail";
    }
}


$chart_data = substr($chart_data, 0, -2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="footer, address, phone, icons" />
    <link rel="icon" href="../public/assets/24-hours.png" sizes="40x40" type="image/svg">
    <title>Anavadya</title>
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <!-- Link to Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--Link to morris-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Link to font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(function() {
            // $("#navid").load("partials/header.php");
            $("#footid").load("partials/footer.php");
        });
    </script>
</head>

<body>
    <!-- <div id="navid"></div> -->
    <nav id="mainNavbar" class=" stroke navbar navbar-expand-md fixed-top navbar-dark">
        <a class="navbar-brand">
            <img class="navlogo" src="public/assets/24-hours.png"> Anavadya
        </a>

        <button class="navbar-toggler nav-toggle-btn" type="button" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="buildingDetails.php" class="nav-link">Building Details</a>
                </li>
                <li class="nav-item">
                    <a href="occupancy.php" class="nav-link">Occupancy</a>
                </li>
                <li class="nav-item">
                    <a href="contacts.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link" id="signin">Register</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
                ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="https://img.icons8.com/metro/26/ffffff/user-male.png" /><?php echo "Welcome " . $_SESSION['username'] ?></a>
                </li>
            </ul>
        </div>

    </nav>
    <style rel="stylesheet" type="text/css">
        body {
            background-image: linear-gradient(-225deg, #DFFFCD 0%, #90F9C4 48%, #39F3BB 100%);
        }
    </style>
    <div class="container">
        <h1 style="padding-top: 5rem;">Room no
            <?php
            echo $room ?></h1>
        <br> <br> <br>
        <div id="chart"> </div>
    </div>
     <div class="container">
      <h1> Warnings</h1>
      <br>
     <?php
        
            $query = "SELECT * FROM roomoccupncy where DATE(timeVal)='" . $td . "'AND roomno=" . $room . " AND HOUR(timeVal) ='" . $th . "' ";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($result);
            if ($row['strength']<35)
              {
                $element='
                <div class="alert alert-info" role="alert">
                      Occupuncy is safe ('.$row['strength'].') at present  '.$row['timeVal'].
                  '</div>  ';
              echo $element;
              }
            else
            {
                $element='
                <div class="alert alert-danger" role="alert">
                      Occupuncy is more('.$row['strength'].') at '.$row['timeVal'].'. It should be less than 35.
                  </div>  ';
              echo $element;
            }
        ?>
       </div>
    <div id="footid"></div>
</body>

</html>
<script>
    Morris.Area({
        element: 'chart',
        data: [<?php echo $chart_data; ?>],
        xkey: 'time',
        ykeys: ['occupancy'],
        labels: ['Occupancy'],
        hideHover: 'auto',
        stacked: true

    });
</script>
