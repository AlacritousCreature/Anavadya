<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="footer, address, phone, icons" />
    <link rel="icon" href="public/assets/24-hours.png" sizes="40x40" type="image/svg">


    <title>Anavadya</title>
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <!-- Link to Bootstrap-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sbuttons/dist/sbuttons.min.css" />
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


    <section class="h-100" style="padding-top:7rem;">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

        <div class="position-absolute h-100 w-100" style="
                    z-index: -1;
                    background-image: url('');
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                    background-position: center;
                "></div>
        <div class="container d-flex flex-column justify-content-around h-100 py-5">
            <div class="d-flex justify-content-center align-items-center mb-3">
                <div class="col-sm-8 text-center">
                    <h1 class="display-5 font-weight-bold">
                        The <span class="text-primary">Prozone</span> is energy efficient and secure with Anavadya
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-3">
                <div class="col-sm-8 text-center">
                    <h5 class="text-muted font-weight-normal">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis praesentium vel et commodi natus nemo,
                        porro aperiam quo deleniti itaque?
                    </h5>
                </div>
            </div>

        </div>
    </section>


    <section class="">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h1 class="text-primary">Our best moments</h1>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Laborum odit dolorum autem laudantium
                        repudiandae voluptatibus, veritatis unde maxime fuga
                        cupiditate.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item" data-interval="2000">
                                    <img src="https://lh3.googleusercontent.com/proxy/l4cJzB00U-0zUikgevG0N1piVDQkl1R1WoUKjusrKAMvAELs2mp4KJrJoOGiIDgxnEl2-W5MO4EP3OtYD-pjnzsNYDloayHvpaql" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>
                                            Nulla vitae elit libero, a
                                            pharetra augue mollis interdum.
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-interval="2000">
                                    <img src="https://lh3.googleusercontent.com/proxy/2vjBlF3_yYMmkYuCXyCfTVryN_klLQvNovXptFmaePCUzVqwMeAYoZcEU0upOYSOopcsaCvbEvn7jkw_6HvqRfIJgR1VgCv3iRhHf_hY7ccNapvZZPo" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item active" data-interval="2000">
                                    <img src="https://www.covaimail.com/wp-content/uploads/prozone-.jpg--678x381.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>
                                            Praesent commodo cursus magna,
                                            vel scelerisque nisl
                                            consectetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="https://dhoom.filmipop.com/media//theatre/2018/Aug/1535364865-inoxcoimgall7.jpg" alt="" style="height: 100%; width: 100%">
                        </div>
                        <div class="col-lg-6 mb-4 mb-sm-0">
                            <img src="https://www.ourcities.in/wp-content/uploads/2020/11/Croma-Prozone-Mall-Coimbatore.jpg" alt="" style="height: 100%; width: 100%">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column flex-lg-column-reverse">
                        <div class="row mb-4">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item" data-interval="2000">
                                        <img src="https://dhoom.filmipop.com/media//theatre/2018/Aug/1535364866-inoxcoimgall6.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>
                                                Nulla vitae elit libero, a
                                                pharetra augue mollis
                                                interdum.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-interval="2000">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcY1v7xZpgY-NJlkFpqPheZ97wpSAYPi1-Mw&usqp=CAU" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item active" data-interval="2000">
                                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/04/10/f9/3a/prozone-mall-aurangabad.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide label</h5>
                                            <p>
                                                Praesent commodo cursus
                                                magna, vel scelerisque nisl
                                                consectetur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="row mb-lg-4">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="https://www.ourcities.in/wp-content/uploads/2020/04/spar-coimbatore.jpg" alt="" style="height: 100%; width: 100%">
                            </div>
                            <div class="col-lg-6 mb-4 mb-sm-0">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJXBde82MHVMKVFP6xEzb1x_qTsPFc0V8lCg&usqp=CAU" alt="" style="height: 100%; width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-content-block">
        <div class="d-flex justify-content-center align-items-center">
            <a href="users.php"><button class='sbtn gradient-btn purple-btn rounded-btn'>See Anavadya's Sub-Admin's</button></a>
        </div>
    </section>
    <div id="footid"></div>

</body>

</html>