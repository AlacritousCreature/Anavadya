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
            $("#navid").load("partials/header.php");
            $("#footid").load("partials/footer.php");
        });
    </script>
</head>
<body>
    <div id="navid"></div>
    <style rel="stylesheet" type="text/css">
        body {
            background-image: linear-gradient(-225deg, #DFFFCD 0%, #90F9C4 48%, #39F3BB 100%);
        }
    </style>
    <h1>all six rooms</h1>
    <h1 style="padding-top: 5rem;">Showcase your buiness cards and take orders!</h1>
    <section class="h-100">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- ROOM 1 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://5.imimg.com/data5/AY/RQ/MY-12051589/showroom-interior-designing-500x500.jpg" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 1
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 0
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    room name %>
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                            <a href="graph.php?room=1">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROOM 2 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://www.mercedes-benz-mena.com/en/passengercars/mercedes-benz-cars/virtual-showroom-lp/virtual-showroom-gallery/_jcr_content/contentgallerycontainer/par/contentgallery_5f17/par/contentgallerytile_3/image.MQ6.8.20200519103556.jpeg" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 2
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 0
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    Room name
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                                <a href="graph.php?room=2">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROOM 3 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://lh3.googleusercontent.com/5PkM06w9v1j4zNXH2k2eblsAE5xUAg1bBpgYra4ivvIhYOqMNJIVrL5uZ7f9nmE-PHbXHiwXh6zWkd_yhi4KHCgkkIVH=w1000" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 3
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 1
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    room name
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                            <a href="graph.php?room=3">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROOM 4 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://images.homify.com/c_fill,f_auto,q_0,w_740/v1440997084/p/photo/image/861313/DSC_0517.jpg" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 4
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 1
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    room name
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                            <a href="graph.php?room=4">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROOM 5 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://5.imimg.com/data5/AY/RQ/MY-12051589/showroom-interior-designing-500x500.jpg" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 5
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 3
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    room name
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                            <a href="graph.php?room=5">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROOM 6 -->
                <div class="col">
                    <div class="card shadow h-100" style="border: none">
                        <img src="https://5.imimg.com/data5/AY/RQ/MY-12051589/showroom-interior-designing-500x500.jpg" class="card-img-top" alt="Image Card laceholder">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3 text-warning">
                                ROOM 6
                            </h5>
                            <p class="text-muted mb-1">
                                Floor 3
                            </p>
                            <p class="card-text flex-grow-1">
                            <ul>
                                <li>ROOM NAME:
                                    room name
                                </li>
                                <li>Manager:
                                    Manager name
                                </li>
                            </ul>
                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group btn-group-sm">
                                            <div class="btn btn-warning">
                                            <a href="graph.php?room=6">Occupancy</a>
                                            </div>
                                            <div class="btn active btn-warning">
                                                History
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <div class="btn btn-warning">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="footid"></div>
</body>
</html>
