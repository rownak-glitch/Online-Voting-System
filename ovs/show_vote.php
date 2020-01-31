<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_id']);
    header("location: index.php");
}

////////////////////////////////
///  need to change here ///////
/// ////////////////////////////
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
    <title>voter_update</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body{ font: 15px sans-serif; }
        .container{ width: 3000px; padding: 5px; }
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
            <h2 class="mt-4"> Current Result </h2>
            <p>

            <div class="row">
                <table class="table table-hover">

                    <thead>
                    <tr bgcolor='#f08080'>

                        <th scope="col">serial</th>
                        <th scope="col">name</th>
                        <th scope="col">votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $index = 1;
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<th scope=\"row\" bgcolor='WHITE'>$index</th>";
//                            echo "<th scope=\"row\" bgcolor='WHITE'>{$row['user_id']}</th>";
                            echo "<td  bgcolor='WHITE'>{$row['name']}</td>";
                            echo "<td bgcolor='WHITE'>{$row['votes']}</td>";
                            echo "</tr>";
                            $index++;
                        }
                    ?>
                    </tbody>
                </table>
            </p>
            <a href="admin_interface1.php"><button type="button" class="back_btn">Back to home</button></a>
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