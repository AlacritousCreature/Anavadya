<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}
require_once "config.php";
$username = $userimg = $password = $confirm_password = "";
$username_err = $userimg_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //check if the username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // mysqli_stmt_close($stmt);

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
        $userimg = trim($_POST['userimg']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        $password_err = "Password should match";
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($userimg_err) && empty($password_err) && empty($confirm_password_err)) {

        $sql = "INSERT INTO users (username, userimg, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_userimg, $param_password);

            // Set these parameters
            $param_username = $username;
            $param_userimg = $userimg;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
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
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>
        </div>

    </nav>
    <style rel="stylesheet" type="text/css">
        body {
            background-image: linear-gradient(-225deg, #DFFFCD 0%, #90F9C4 48%, #39F3BB 100%);
        }
    </style>
    <section class="h-100" style="padding-top: 5rem;">
        <div class="container py-5">
            <div class="row">
                <div class="order-lg-2 mb-3 mb-lg-0 col-lg-6 w-50 mx-auto">
                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="30ad16f1-5c99-460e-a21a-a10b3717755f" data-name="Layer 1" width="100%" height="100%" viewBox="0 0 1080 828.86">
                        <defs>
                            <linearGradient id="f6f637d9-5ca4-41bf-bc3b-5488ffc6e737" x1="733" y1="836.43" x2="733" y2="78.43" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="gray" stop-opacity="0.25"></stop>
                                <stop offset="0.54" stop-color="gray" stop-opacity="0.12"></stop>
                                <stop offset="1" stop-color="gray" stop-opacity="0.1"></stop>
                            </linearGradient>
                        </defs>
                        <ellipse cx="660" cy="779.86" rx="254" ry="49" fill="currentColor" opacity="0.1"></ellipse>
                        <path d="M558.52,78.92c-37.54-.2-73.73-9.87-110-17.37A959,959,0,0,0,326.26,44.43c-43.75-3.29-88.51-3.56-131,5.17S112.46,76.82,88,105.07c-41.52,47.86-30.22,111.88-8.38,167,25.91,65.37,65,128.44,123,180,41.25,36.64,91.14,66.74,140.69,96.59,28,16.86,56.21,33.84,88,46,29.59,11.27,61.62,18.08,93.43,24.82,34,7.2,68,14.42,102.73,18.9,110.84,14.32,224.21.46,334.88-14.59,39-5.3,79.61-11.33,110.62-30.33,24.16-14.81,40.16-36.25,51.56-58.41,14.94-29,22.64-62.56,6.38-91.18-24-42.22-91.65-60.92-118.2-102.21-34-52.93,12.79-118.37-9.06-175-9.09-23.57-29.39-43.49-50.6-61.8C902.5,61.13,837.62,23.51,758,39.21,690.61,52.5,630.82,79.31,558.52,78.92Z" transform="translate(-60 -35.57)" fill="currentColor" opacity="0.1"></path>
                        <path d="M829.08,225.55q-.89-1-1.84-2c4.83-5.48,9.84-11.11,9.79-18.16-.05-8.56-7.65-15.14-10.49-23.23-3.86-11,1.5-22.82,3.7-34.28A64.28,64.28,0,0,0,816.3,95c-2.23-2.64-4.82-5.19-8.15-6.24-5.06-1.59-10.43.62-15.7,1.27-17.39,2.15-33.2-12.83-50.67-11.49a9.42,9.42,0,0,0-3.36.75c-2.26,1.08-3.49,3.47-4.88,5.52-5.43,8-14.54,12-23.6,16.05a12.34,12.34,0,0,0-3.22,1.48c-2.72,1.27-5.4,2.59-7.93,4.09-17.12,10.13-14.63,24.31-4.54,33.06-2,9.83-12,18.48-10.29,28.59,1.36,7.92,9.61,13.31,11.2,21.19.92,4.58-.53,8.94-2.55,13.27-19.15,4.43-40.79,12.6-42.48,27-2.94,25.06-11.78,94.28-11.78,94.28S628.09,379.26,667,353l-.5,1.48a322.61,322.61,0,0,0-14.29,65.37c-.39,3.31-1.19,5.91-2.63,6.76-.52.31.51.8,2.76,1.41-.25.93-.53,1.86-.77,
                            2.8a265.66,265.66,0,0,0-8.16,49.51,348.23,348.23,0,0,1-6.12,44.09c-9.22,46.38,0,105.88,0,105.88l20.12,94.72,3.44,16.19a24.06,24.06,0,0,0,8.15,5.88,126.27,126.27,0,0,1,2.8,17.63c.05.66.1,1.33.14,2a8.41,8.41,0,0,0-6,3.73c-7.17,10.08,1,18.15-26.63,38.32-7.15,5.21-10.59,9.95-11.47,14h0c-.94,4.33,1.1,7.84,4.75,10.21h0a17.3,17.3,0,0,0,1.94,1.08h0q.51.24,1,.46h0q.53.22,1.09.41l.06,0,1.07.34.08,0,1.15.3.1,0,1.08.23.14,0,1.19.2.13,0,1.08.13.21,0,1.21.09h.16l1.08,0h.25l1.22,0h.16l1.08-.06.29,0,1.22-.12.14,0,1.09-.16.3-.05,1.21-.23.12,0,1.1-.27.31-.08c.4-.11.79-.22,1.19-.35l.07,0,1.11-.39.3-.11c.39-.15.77-.3,1.15-.47,18.44-8.07,56.34-29.24,56.34-29.24v-.68c0-.09,0-.19,0-.29s0-.17,0-.26,0-.21,0-.33v-.31c0-.14,0-.28,
                            0-.43v-.33c0-.16,0-.32,0-.49s0-.57,0-.88h0C713.9,792,713,771.72,709,772.51c-1.37.27-2.3,2.19-3.25,4.4l-.47-.9c-3.9-7.53-9.55-20.45-10.1-33.08a59.2,59.2,0,0,0,8.71-7.72s-2.06-8.67-3.81-17.82c-1.52-7.93-2.81-16.21-2.34-19.49,1-7.06-12.29-61.51-12.29-61.51s1.37-12,4.13-28.63c5.36-32.36,15.91-82.36,31.65-96.5.37-.32.73-.64,1.1-.92,0,0,11.27,2,20.49,65.54l2.67,28.29a164.2,164.2,0,0,0,4,23.25c1.82,7.53,3.77,20.13,2.57,37.19-1.17,16.68-1.67,36.31-1.88,50.09-.16,10.39-.16,17.46-.16,17.46a38.67,38.67,0,0,0,6.15,4.25v9.25a7.7,7.7,0,0,1-2.16,5.26l0,0a14.28,14.28,0,0,0-3.09,5.69c-1.79,3.22-3.3,8.45-3.93,16.86-2,27.23-3.07,24.2-3.07,24.2a35.9,35.9,0,0,0-2.32,9.18h0c-.06.59-.09,1.18-.11,1.78,0,.09,0,.19,0,.28q0,.41,0,
                            .81,0,.2,0,.4t.05.6q0,.27.07.54c0,.13,0,.26.06.38s.09.48.15.72l.08.31c.07.25.14.49.22.73l.08.22q.12.33.27.64l.09.19c.12.24.25.48.4.71l.12.19a7.6,7.6,0,0,0,.49.66l.13.15a7.31,7.31,0,0,0,.62.63l.07.06a7.54,7.54,0,0,0,.71.55l.11.08a8.19,8.19,0,0,0,.84.48l.17.09a9.32,9.32,0,0,0,1,.39l.17.05a11.09,11.09,0,0,0,1.14.31h0c.4.08.82.15,1.26.19l.18,0c.44,0,.9.07,1.38.07h.27c.49,0,1,0,1.52,0l.25,0c.56,0,1.15-.1,1.76-.19,21.51-3,31.76-5,30.73-17.14-.62-7.29-2.35-17.88-3.63-25.15a37.81,37.81,0,0,0-3.54-10.6q.08-.85.15-1.75c.37-5,.35-11-1.17-14.93l.47-8.83A28.15,28.15,0,0,0,792,732.18s.15-6.54.6-15.22c.68-13.4,2-31.89,4.52-39.23,4.1-12.1,0-54.45,0-54.45s-15.37-72.6-1-103.86c12.65-27.57,12.54-55.16.37-82a4.15,4.15,0,0,0,
                            .65-.64s-3.07-2-2-25.21c.78-17.7-4.4-36-6.9-43.64a106.76,106.76,0,0,0,12,4.32C823.75,379.26,825.8,353,825.8,353l5.12-39.33L837,255.1h0C838.66,250.5,840.89,239,829.08,225.55ZM724.94,186.7c0,.65-.07,1.3-.14,1.94a26.1,26.1,0,0,1-1.31,6.12,40.68,40.68,0,0,0,1.27-8.18Zm61.93,143.15c.36.67.71,1.31,1,2l-2.59-1.32a57.93,57.93,0,0,1,4.62-13.74,97.29,97.29,0,0,0,6.26-15.83,158,158,0,0,0,.91,18.85C799.16,335.9,786.87,329.85,786.87,329.85Z" transform="translate(-60 -35.57)" fill="url(#f6f637d9-5ca4-41bf-bc3b-5488ffc6e737)"></path>
                        <path d="M700,110.62c-3.27,2.23-6.7,4.81-7.86,8.6-1.88,6.11,2.84,12.24,3.3,18.62.85,11.59-12.26,21.17-10.33,32.64,1.32,7.86,9.38,13.2,10.93,21,2.26,11.4-10.09,21.45-9.12,33,.52,6.17,4.81,11.41,9.67,15.23a47.09,47.09,0,0,0,23.63,9.7c-.57-9.91-7.93-18.94-6.66-28.79.87-6.75,5.62-12.28,8.37-18.51,4.83-10.94,3.28-23.6.39-35.2s-7.08-23.07-7.29-35c-.13-7.2,3.25-17.77.77-24.6C712.79,99,705.61,106.79,700,110.62Z" transform="translate(-60 -35.57)" fill="#f78181"></path>
                        <path d="M700,110.62c-3.27,2.23-6.7,4.81-7.86,8.6-1.88,6.11,2.84,12.24,3.3,18.62.85,11.59-12.26,21.17-10.33,32.64,1.32,7.86,9.38,13.2,10.93,21,2.26,11.4-10.09,21.45-9.12,33,.52,6.17,4.81,11.41,9.67,15.23a47.09,47.09,0,0,0,23.63,9.7c-.57-9.91-7.93-18.94-6.66-28.79.87-6.75,5.62-12.28,8.37-18.51,4.83-10.94,3.28-23.6.39-35.2s-7.08-23.07-7.29-35c-.13-7.2,3.25-17.77.77-24.6C712.79,99,705.61,106.79,700,110.62Z" transform="translate(-60 -35.57)" opacity="0.1"></path>
                        <path d="M709.59,779.93l-9,9s-32,17-28-6a82.76,82.76,0,0,0,.69-20.68,128.53,128.53,0,0,0-5.69-28.32l30-6c-5,15.68,3.23,35.42,8.36,45.47C708,777.45,709.59,779.93,709.59,779.93Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M777.73,761.74a91.48,91.48,0,0,1-1.14,9.19s-25,17-27-2c-1.3-12.38,1.64-18,3.86-20.36l0,0a7.7,7.7,0,0,0,2.1-5.21V720.93l22,7-1,19C778.07,750.88,778.09,756.78,777.73,761.74Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M709.59,779.93l-9,9s-32,17-28-6a82.76,82.76,0,0,0,.69-20.68c7-1,15.31,6.68,15.31,6.68,11.72,16.54,14.88,10.28,17.36,4.47C708,777.45,709.59,779.93,709.59,779.93Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M688.59,770.93s-14-13-21-3,1,18-26,38,0,33,18,25,55-29,55-29,0-33-5-32S705.59,794.93,688.59,770.93Z" transform="translate(-60 -35.57)" fill="#8189a6"></path>
                        <path d="M777.73,761.74a91.48,91.48,0,0,1-1.14,9.19s-25,17-27-2c-1.3-12.38,1.64-18,3.86-20.36a6,6,0,0,1,6.14-.64c4-1.78,8.4,1.19,12,5A35.35,35.35,0,0,1,777.73,761.74Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M759.59,749.93s-11-6-13,21-3,24-3,24-10,24,11,21,31-5,30-17c-.6-7.23-2.3-17.74-3.55-24.94a36.67,36.67,0,0,0-9.41-19C768,751.11,763.59,748.15,759.59,749.93Z" transform="translate(-60 -35.57)" fill="#8189a6"></path>
                        <path d="M795.59,621.93s4,42,0,54c-2.43,7.28-3.75,25.62-4.41,38.91-.44,8.6-.59,15.09-.59,15.09-19,20-41,0-41,0s0-7,.16-17.32c.21-13.67.7-33.14,1.84-49.68,1.17-16.92-.73-29.41-2.51-36.88A165.2,165.2,0,0,1,745.2,603l-2.61-28.06c-9-63-20-65-20-65-.36.28-.71.59-1.07.91-15.37,14-25.67,63.61-30.9,95.7-2.69,16.51-4,28.39-4,28.39s13,54,12,61c-.46,3.25.8,11.47,2.28,19.33,1.71,9.07,3.72,17.67,3.72,17.67-25,27-42,6-42,6l-3.36-16.06-19.64-93.94s-9-59,0-105a350.53,350.53,0,0,0,6-43.73,267.31,267.31,0,0,1,8-49.1q1.83-7.14,4.06-14.17s37.55-6.53,72.91-6.53c26.52,0,51.8,3.67,59.09,16.53q2.52,4.44,4.58,8.9c12.66,27.21,13,55.16.42,83.1C780.59,549.93,795.59,621.93,795.59,621.93Z" transform="translate(-60 -35.57)" fill="#4c4c78"></path>
                        <path d="M711.59,258.93s-53-54-13-50c9.07.91,15.21-.71,19.28-3.75,4.64-3.46,6.59-8.76,7.13-14.29,1.1-11-3.41-23-3.41-23s54-43,43,11a92.06,92.06,0,0,0-2.1,16.69c-.18,11.46,3.59,15.85,8.88,17.65,8.92,3.05,22.18-1.22,28.22,8.66C810.59,239.93,711.59,258.93,711.59,258.93Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M764.59,178.93a92.06,92.06,0,0,0-2.1,16.69,40.82,40.82,0,0,1-4.39,1.25,43.08,43.08,0,0,1-33.1-6c1.1-11-3.41-23-3.41-23S775.59,124.93,764.59,178.93Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M791.59,152.93a43,43,0,0,1-86,0c0-.8,0-1.6.07-2.39a43,43,0,0,1,85.93,2.39Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M711.59,258.93s-53-54-13-50c9.07.91,15.21-.71,19.28-3.75-7.74,12.84-16.45,35.93,22.72,33.75,35.85-2,35.24-16.28,30.78-25.66,8.92,3.05,22.18-1.22,28.22,8.66C810.59,239.93,711.59,258.93,711.59,258.93Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M795.59,439.93c-9.1,11.83-125.1-3.68-142.06-8.83q1.83-7.14,4.06-14.17s37.55-6.53,72.91-6.53c26.52,0,51.8,3.67,59.09,16.53q2.52,4.44,4.58,8.9C794.81,439.41,795.59,439.93,795.59,439.93Z" transform="translate(-60 -35.57)" opacity="0.1"></path>
                        <path d="M722.59,199.93s-67.5,5.5-70.5,31.5c-2.87,24.86-11.5,93.5-11.5,93.5s-10,55,28,29l-.49,1.46a324.32,324.32,0,0,0-13.95,64.83c-.39,3.28-1.16,5.86-2.57,6.71-5,3,134,23,144,10,0,0-3-2-2-25s-8-47-8-47-8-24,3-47,7-30,7-30l38-29s8.21-14.07-6.8-31.43a52,52,0,0,0-35.72-17.6L764.86,208s28.72,30.9-25.28,33.9S722.59,199.93,722.59,199.93Z" transform="translate(-60 -35.57)" fill="#f9d048"></path>
                        <path d="M677.59,254.93s2,16-2,21-5,28,0,42" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M721.52,510.84c-15.37,14-25.67,63.61-30.9,95.7-7.28-44.67,23-118.61,23-118.61Z" transform="translate(-60 -35.57)" opacity="0.1"></path>
                        <path d="M704.59,732.93c-25,27-42,6-42,6l-3.36-16.06c9.45,4.91,25.42,8.72,41.64-7.61C702.58,724.33,704.59,732.93,704.59,732.93Z" transform="translate(-60 -35.57)" opacity="0.1"></path>
                        <path d="M791.18,714.84c-.44,8.6-.59,15.09-.59,15.09-19,20-41,0-41,0s0-7,.16-17.32C758,717.85,772.83,723.62,791.18,714.84Z" transform="translate(-60 -35.57)" opacity="0.1"></path>
                        <rect x="622.59" y="253.36" width="68" height="28" rx="3.75" ry="3.75" fill="#cdd0db"></rect>
                        <rect x="622.59" y="253.36" width="68" height="28" rx="3.75" ry="3.75" opacity="0.05"></rect>
                        <rect x="622.59" y="254.36" width="68" height="28" rx="3.75" ry="3.75" fill="#cdd0db"></rect>
                        <circle cx="676.09" cy="267.86" r="3" fill="#9da7c0"></circle>
                        <path d="M653.65,333.27a19.45,19.45,0,0,1,11.3-11.9c3.42-1.42,7.59-4,9.7-8.71,3.94-8.73,10.94-17.73,28.94-11.73s-5,10-5,10,41-6,25,6-36,19-36,19l-9.85,10.43c-6,6.37-16.42,6.34-22-.44C653.24,342.86,651.92,338.74,653.65,333.27Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M652.65,331.27a19.45,19.45,0,0,1,11.3-11.9c3.42-1.42,7.59-4,9.7-8.71,3.94-8.73,10.94-17.73,28.94-11.73s-5,10-5,10,41-6,25,6-36,19-36,19l-9.85,10.43c-6,6.37-16.42,6.34-22-.44C652.24,340.86,650.92,336.74,652.65,331.27Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M793.59,351.93l-7,17-9-6.59-25-18.41-17-11c-24-18,0-21,0-21-9-4,0-8,0-8,32-7,26,19,26,19l20.27,10.51,6.73,3.49Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M795.59,349.93l-7,17-9-6.59-25-18.41-17-11c-24-18,0-21,0-21-9-4,0-8,0-8,32-7,26,19,26,19l20.27,10.51,6.73,3.49Z" transform="translate(-60 -35.57)" fill="#ffb9b9"></path>
                        <path d="M795.59,349.93l-7,17-9-6.59c8.11.29,17.69-3.63,4.23-28.9l6.73,3.49Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M832.59,248.93l1.93,7.87-5.93,58.13-5,39s-2,26-25,19-25-14-25-14,33,11,12-28c0,0,12,6,10-10s0-44,0-44Z" transform="translate(-60 -35.57)" fill="#f9d048"></path>
                        <path d="M791.59,152.93a43,43,0,0,1-33.49,41.94c-1.44-4.16-2.46-8.3-1.41-12.51,2-8.17,11.46-14.13,10.41-22.48a5.54,5.54,0,0,0-1-2.62c-2.11-2.78-6.41-1.4-9.83-.71-8.84,1.76-18.52-4.21-20.92-12.9a29.23,29.23,0,0,1-29.74,6.89,43,43,0,0,1,85.93,2.39Z" transform="translate(-60 -35.57)" opacity="0.05"></path>
                        <path d="M736.4,141.65c2.39,8.69,12.08,14.66,20.91,12.89,3.42-.68,7.72-2.06,9.83.72a5.4,5.4,0,0,1,.95,2.61c1.06,8.36-8.37,14.31-10.4,22.49-2.09,8.42,4,16.55,5.35,25.12.71,4.69,0,9.47,0,14.21s1.12,9.84,4.64,13,10,3.22,12.37-.9c11.25,5.95,6.76,24.38,15.3,33.81,4.71,5.2,12.46,6.45,19.45,5.79a8.2,8.2,0,0,0,4.57-1.48,8,8,0,0,0,2.24-4.2,34.11,34.11,0,0,0-.87-20.23c-1.12-3.11-2.73-6.25-2.31-9.52.32-2.56,1.85-4.79,3.47-6.8,5.37-6.66,12.7-13.1,12.65-21.66s-7.47-15-10.24-23c-3.77-10.93,1.46-22.64,3.61-34A64.49,64.49,0,0,0,814.32,98c-2.18-2.62-4.71-5.15-8-6.19-4.93-1.58-10.18.62-15.33,1.26-17,2.13-32.41-12.73-49.47-11.4a9.08,9.08,0,0,0-3.28.75c-2.21,1.07-3.4,3.44-4.77,5.48-7.53,11.25-22.33,14.46-33.93,21.44C665.71,129.71,
                            710.49,166.59,736.4,141.65Z" transform="translate(-60 -35.57)" fill="#f78181"></path>
                        <path d="M659.59,826.93c-11.69,5.19-27.16,1.53-29.19-7.14-2.45,11.46,15.84,17.08,29.19,11.14,18-8,55-29,55-29s0-1.55-.05-4C713.46,798.57,677.32,819,659.59,826.93Z" transform="translate(-60 -35.57)" fill="#fff" opacity="0.3"></path>
                        <path d="M784.54,798.35c-1.15,9-11.13,10.89-29.95,13.58-9.57,1.37-12.69-2.88-13.27-7.9-.63,6.43,1.2,13.62,13.27,11.9,21-3,31-5,30-17C784.57,798.74,784.55,798.54,784.54,798.35Z" transform="translate(-60 -35.57)" fill="#fff" opacity="0.3"></path>
                        <path d="M908.26,816.39S893.78,743,923.59,692.75a113.3,113.3,0,0,0,15.63-69.94,190.55,190.55,0,0,0-7-34.14" transform="translate(-60 -35.57)" fill="none" stroke="#535461" stroke-miterlimit="10" stroke-width="2"></path>
                        <path d="M950.85,556.87c-.8,8.75-19,32.68-19,32.68s-13.52-26.84-12.71-35.6a15.92,15.92,0,1,1,31.7,2.91Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M972.6,607.77c-5.43,6.91-33.7,17.12-33.7,17.12s3.24-29.88,8.67-36.79a15.92,15.92,0,1,1,25,19.67Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M963.84,690.53c-8.18,3.22-37.73-2.24-37.73-2.24s17.88-24.16,26.06-27.38a15.92,15.92,0,1,1,11.67,29.62Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M943.11,751.65c-7.52,4.56-37.57,4.17-37.57,4.17S919.09,729,926.6,724.43a15.92,15.92,0,1,1,16.51,27.22Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M905.46,623.52c5.72,6.68,34.39,15.68,34.39,15.68s-4.5-29.72-10.21-36.39a15.92,15.92,0,0,0-24.18,20.71Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M882.12,695.32c7.45,4.66,37.51,4.67,37.51,4.67S906.45,673,899,668.32a15.92,15.92,0,1,0-16.87,27Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M869,768.21c6.56,5.85,36.18,10.95,36.18,10.95s-8.43-28.85-15-34.7A15.92,15.92,0,1,0,869,768.21Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M628,170.43a14.53,14.53,0,0,0-14.47-14H351.88a14.76,14.76,0,0,0-14.78,12.73,14.54,14.54,0,0,0,14.39,16.27h262l.91,0a11.63,11.63,0,0,1,11.32,6.25,18.43,18.43,0,0,1,1.69,5l.59.29v-26.5Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M628,264.43a14.53,14.53,0,0,0-14.47-14H500.88a14.76,14.76,0,0,0-14.78,12.73,14.54,14.54,0,0,0,14.39,16.27h113l.91,0a11.63,11.63,0,0,1,11.32,6.25,18.43,18.43,0,0,1,1.69,5l.59.29v-26.5Z" transform="translate(-60 -35.57)" fill="currentColor"></path>
                        <path d="M288,123.43c.17-7.74,4.35-14,9.45-14H468.53c5.21,0,9.47,6.52,9.47,14.5s-4.26,14.5-9.47,14.5H297.42a7.76,7.76,0,0,0-7.5,5,27,27,0,0,0-1.54,6.24l-.38.29v-26.5Z" transform="translate(-60 -35.57)" fill="currentColor" opacity="0.3"></path>
                        <path d="M288,217.43c.21-7.74,5.29-14,11.49-14h208c6.33,0,11.51,6.52,11.51,14.5s-5.18,14.5-11.51,14.5h-208c-4,0-7.72,1.84-9.12,5a23.16,23.16,0,0,0-1.87,6.24l-.47.29v-26.5Z" transform="translate(-60 -35.57)" fill="currentColor" opacity="0.3"></path>
                        <circle cx="447" cy="228.86" r="5" fill="#fff" opacity="0.2"></circle>
                        <circle cx="464" cy="228.86" r="5" fill="#fff" opacity="0.2"></circle>
                        <circle cx="481" cy="228.86" r="5" fill="#fff" opacity="0.2"></circle>
                    </svg>
                </div>
                <div class="order-lg-1 col-lg-6">
                    <div class="card rounded shadow p-3 p-md-4">
                        <h3 class="text-center font-weight-bold text-primary">
                            Please register here!
                        </h3>
                        <form class="row g-3" action="" method="post" style="display: grid;">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Username">
                            </div>
                            <div class="col-md-6">
                                <label for="userimg" class="form-label">Image URL</label>
                                <input type="text" class="form-control" id="inputUserimg4" name="userimg" placeholder="Username">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="footid"></div>

</body>

</html>