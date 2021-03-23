<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}

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

  <!-- Link to font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    $(function() {
      // $("#navid").load("partials/headerHome.php");
      
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
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/metro/26/ffffff/user-male.png"/><?php echo "Welcome ". $_SESSION['username'] ?></a>
                </li>
            </ul>
        </div>

    </nav>

  <style rel="stylesheet" type="text/css">
    body {
      background-image: linear-gradient(-225deg, #DFFFCD 0%, #90F9C4 48%, #39F3BB 100%);
    }
  </style>

  <section class="h-100" style="padding-top:5rem;">
    <div class="position-absolute h-100 w-100" style="
            z-index: -1;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        "></div>
    <div class="container h-100 py-5">
      <div class="row h-100 justify-content-between align-items-center">
        <div class="col-lg-5 h-50">
          <div class="d-flex flex-column h-100 justify-content-between text-center text-lg-left">
            <h5>What business are you?</h5>
            <h1 class="font-weight-bold">
              Use anavadya in your smart building.
            </h1>
            <h5 class="text-muted font-weight-normal">
              Sub hero message lead. How would you benefit the customer. Short and crisp.
            </h5>
            <div class="">
              <div class="btn btn btn-success">
                Subscribe now
              </div>
              <div class="btn btn ml-3 btn-outline-success">
                Learn more
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 mt-3 mt-lg-0">
          <img src="public/assets/hero.png" class="h-100 w-100" alt="">
        </div>
      </div>
    </div>
    <div class="container mt-6">
      <h3><?php echo "Welcome ". $_SESSION['username'] ?> | Now You May Use This Website</h3>
      <hr>
      </div>
  </section>

  <div id="footid"></div>

</body>

</html>