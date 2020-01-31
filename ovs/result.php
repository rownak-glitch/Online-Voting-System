<?php

$user_id = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'evm');


// $qry = "SELECT * from person by user_id asc";
$qry = "SELECT * from person, candidate where candidate_id = user_id order by votes desc";
//$qry = "SELECT * from person, candidate where candidate_id = user_id";
$result=mysqli_query($db, $qry);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>result</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body{ font: 15px sans-serif; }
        .container{ width: 1000px; padding: 5px; }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body style="background-color:#34495e">


<div id="particles-js" style="position:fixed;width:100%;z-index:-10;"></div>
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<div id="main-wrapper">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="inner_container">
            <a class="navbar-brand" href="#">
                <!--            <img src="http://placehold.it/150x50?text=Logo" alt="">-->
                <h1> Online Voting System <h1>
                        <div class = sign_up_btn><h4>FINAL RESULT</h4></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!--            <ul class="navbar-nav ml-auto">-->
                <!--                <li class="nav-item active">-->
                <!--                    <a class="nav-link" href="#">Home-->
                <!--                        <span class="sr-only">(current)</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="#">About</a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="#">Services</a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="#">Contact</a>-->
                <!--                </li>-->
                <!--            </ul>-->
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="inner_container">
        <p>
        <p style="text-align:center;"><img src="congrats.png" alt="Vote" style="width:300px;height:130px;"> </p>
        <div>
                <?php
                $index = 1;
                while($row=mysqli_fetch_assoc($result)){
                    if ($index == 1) echo "<div class = logout_button><center><h1> {$row['name']} </h1><h4> [to be the Honorable PRESIDENT]</h4></center></div>";
                    if ($index == 2) echo "<div class = login_button><center><h5><u> Vice-President:</u> </h5><h3> {$row['name']}</h3></center></div>";
                    if ($index == 3) echo "<div class = back_btn1><center><h5> <u>Secretary:</u> </h5><h3> {$row['name']}</h3></center></div>";
                    $index++;
                }
                ?>
        </p>
            <a href="index.php"><center><button type="button" class="back_btn">Back to main menu</button></center></a>
        <p></p>
        <p></p>

    </div>
    <!-- /.container -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>