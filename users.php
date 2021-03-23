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
    <link rel="stylesheet" type="text/css" href="public/css/user.css">
    </link>

    <h1 style="margin-top:5rem">Here goes the User Profile</h1>

    <div class="main">
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="https://akm-img-a-in.tosshub.com/indiatoday/sridevi-story_647_112317110707.jpg?antYEsJW3vuLOS_Tm92vJgdzf5qXBJ5O&size=770:433"></div>
                    <div class="card_content">
                        <h2 class="card_title">
                            Name

                        </h2>
                        <p class="card_text">| Username:
                            username | Room no:
                            room no. |
                            <a href="/user/<%= user._id %>"><button class="btn card_btn">DELETE</button></a>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <div id="footid"></div>

</body>

</html>