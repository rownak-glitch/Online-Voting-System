<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_id']);
    header("location: login.php");
}

$db = mysqli_connect('localhost', 'root', '', 'evm');


$qry = "SElECT * from `admin` where `admin_id`='{$_SESSION['admin_id']}';";
$result=mysqli_query($db, $qry);
$qry="SElECT * from `person` where `user_id`='{$_SESSION['admin_id']}';";
$result2=mysqli_query($db, $qry);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>create election</title>

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
                <h2> Online Voting System </h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="inner_container" id="navbarResponsive">
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

                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success" >
                        <h3>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>

                <!-- logged in user information -->
                <?php  if (isset($_SESSION['admin_id'])) : ?>
                    <p><h3> <a class="logout_button" href="index.php? logout='1'" style="color: white;">logout</a> </h3></p>
                <?php endif ?>

            </div>
        </div>
    </nav>


<!-- Page Content -->
<div class="inner_container">
    <h3 class="mt-4"> Create New Election </h3>
    <p>
    <div class="login-popup-wrap new_login_popup">
        <form id="loginMember" role="form" action="create_election2.php" method="post">
        <div class="form-group">
            <input type="int" class="form-control" id="election_id" placeholder="Election ID" name="election_id">
        </div>
        <div class="form-group">
            <input type="varchar" class="form-control" id="name" placeholder="Election Name" name="name">
        </div>
        <div class="form-group">
            <input type="time" class="form-control" id="duration" placeholder="Duration" name="duration">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="date" placeholder="Date" name="date">
        </div>

        <button type="submit" class="back_btn1" name="create_election">Create Election</button>
    </form>
        <a href="admin_interface1.php"><button type="button" class="back_btn">Back to home</button></a>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    </p>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
