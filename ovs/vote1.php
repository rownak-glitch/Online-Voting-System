<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    header("location: login.php");
}

$db = mysqli_connect('localhost', 'root', '', 'evm');


$qry = "SElECT * from `person` where `user_id`='{$_SESSION['user_id']}'";
$result=mysqli_query($db, $qry);

$qry2="SElECT * from `candidate`, `person` where candidate_id = user_id";
$result2=mysqli_query($db, $qry2);

if(isset($_POST)){
    $voteqry="UPDATE `candidate` SET  `votes`=`votes`+1 WHERE `candidate_id`={$_POST['groupOfDefaultRadios']};";
    $result3=mysqli_query($db, $voteqry);
}
// $qry="SElECT * from `service` where `c_id`='{$_SESSION['id']}';";
// $result2=mysqli_query($db, $qry);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>vote</title>

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
                <?php  if (isset($_SESSION['user_id'])) : ?>
                    <!--                <p><strong><?php echo "Welcome .. " ?></strong></p> -->
                    <p><h3> <a class="logout_button" href="index.php? logout='1'" style="color: white;">logout</a> </h3></p>
                <?php endif ?>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="inner_container">
        <p></p>
        <?php
        $r1=mysqli_fetch_assoc($result);
        //    $r2=mysqli_fetch_assoc($result2);
        //    print_r($r1);
        //print_r($r2);
        echo "<h5>Voter ID : {$r1['user_id']}</h5>";
        echo "<h5>Name : {$r1['name']}</h5>";
//        print_r($_POST['groupOfDefaultRadios']);
        ?>
        <br><br/>
    </div>
    <!-- /.container -->


    <div class="inner_container">
        <form action="vote1.php" method="post">
            <!-- Group of default radios - option 1 -->
            <?php
            $qry4 = "SElECT * from `person` where `user_id`='{$_SESSION['user_id']}'";
            $result4=mysqli_query($db, $qry4);
            $r4=mysqli_fetch_assoc($result4);
            if($r4['is_voted'] > 0) {
               echo "<h5>You have already voted. Thank you.</h5>";
               echo "<div>", "</br>", "</div>";
            } else {
		echo "<h5><u>Choose your preferred candidate:</u></h5>";
                $index = 1;
                $is_voted_qry="UPDATE `person` SET  `is_voted`= 1 WHERE `user_id`='{$_SESSION['user_id']}';";
                $result4=mysqli_query($db, $is_voted_qry);
                while ($candidate = mysqli_fetch_assoc($result2)) {
                    echo "<div class=\"custom-control custom-radio\" >";
                    echo "<input type = \"radio\" class=\"custom-control-input\" id = \"defaultGroupExample{$index}\" name = \"groupOfDefaultRadios\" value = \"{$candidate['candidate_id']}\" >";
                    echo "<label class=\"custom-control-label\" for=\"defaultGroupExample{$index}\" ><h5> {$candidate['name']}</h5></label >";
                    echo "</div >";
                    $index = $index + 1;
                }
                echo '<html>', '<body>', '<a href="after_vote.php"><button type="submit" class="back_btn1">Confirm Vote</button></a>', '</body>', '</html>';
            }
            ?>
<!--            <a href="after_vote.php"><button type="submit" class="back_btn1">Confirm Vote</button></a> -->
            <a href="home.php"><button type="button" class="back_btn">Back to home</button></a>
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
