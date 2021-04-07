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
    <link rel="stylesheet" type="text/css" href="public/css/user.css">
    </link>

    <h2 style="margin-top:8rem;text-align:center;">All the Sub-Admins using this App for Prozone</h2>

    <div class="main">
        <ul class="cards">
            <?php
            require_once "config.php";
            function component($username, $userimg)
            {
                $element = '
        <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="' . $userimg . '"></div>
                    <div class="card_content">
                        <h2 class="card_title">
                            Name
                        </h2>
                        <p class="card_text">| Username:
                        ' . $username . ' | Room no:
                            room no. |
                            <a href="/user/<%= user._id %>"><button class="btn card_btn">DELETE</button></a>
                    </div>
                </div>
            </li>
        ';
                echo $element;
            }

            $query = "SELECT * FROM users";
            mysqli_query($conn, $query) or die('error querring database.');
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {
                component($row['username'], $row['userimg']);
            }

            ?>







        </ul>
    </div>

    <div id="footid"></div>

</body>

</html>