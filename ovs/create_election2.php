<?php
/**
 * Created by PhpStorm.
 * User: shiningflash
 * Date: 3/23/19
 * Time: 3:49 PM
 */

session_start();

if (!isset($_SESSION['admin_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: adminLogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_id']);
    header("location: adminLogin.php");
}

$db = mysqli_connect('localhost', 'root', '', 'evm');


$qry = "SElECT * from `admin` where `admin_id`='{$_SESSION['admin_id']}'";
$result=mysqli_query($db, $qry);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['create_election'])) {
    // receive all input values from the form
    $election_id = mysqli_real_escape_string($db, $_POST['election_id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $duration = mysqli_real_escape_string($db, $_POST['duration']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    //$m_id = mysqli_real_escape_string($db, $_POST['m_id']);
    $query = "INSERT INTO `election` (`election_id`, `name`, `duration`, `date`, `admin_id`) VALUES ('{$election_id}', '{$name}', '{$duration}', '{$date}', '{$_SESSION['admin_id']}')";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "Your Information updated successfully.";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}


mysqli_close($db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>new election</title>

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
                <h4>Welcome to</h4>
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
            <?php  if (isset($_SESSION['id'])) : ?>
                <p>Welcome <strong><?php echo $_SESSION['id']; ?></strong></p>
                <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
            <?php endif ?>

        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="inner_container">
    <h3 class="mt-4">Thank you, Sir. </h3>
    <p>
        <?php
        echo "Your Information updated successfully.";
        ?>
        <br/>
        <br/>
        <a href="admin_interface1.php"><button type="button" class="back_btn">Back to home</button></a>
    </p>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>