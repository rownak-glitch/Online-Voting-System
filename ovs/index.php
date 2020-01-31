
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>my ovs</title>

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
    <div class="container">
        <a class="navbar-brand" href="#">
            <!--            <img src="http://placehold.it/150x50?text=Logo" alt="">-->
            <h4>Welcome to</h4>
            <h1> Online Voting System <h1>
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
     <h3 class="mt-4" style= "color:BLACK"><i><marquee loop=10 SCROLLDELAY=25 HEIGHT=40 behavior="slide" direction="left" BGCOLOR=WHITE>Your Vote is your Voice.</marquee><i/></h3>
    <p>
    <p style="text-align:center;"><img src="vt.png" alt="Vote" style="width:300px;height:130px;"> </p>

    <a href="registration.php"><button type="button" class="sign_up_btn">Online Registration</button></a>
    <a href="login.php"><button type="button" class="login_button">Login as Voter</button></a>
    <a href="adminLogin.php"><button type="button" class="login_button">Admin Access</button></a>
    <a href="result.php"><button type="button" class="sign_up_btn">Final Result</button></a>

    <div class="signature">
        <br/><br/>
<!--        <p>Made by <a href="https://github.com/shiningflash/">Amirul Islam</a></p>  -->
    </div>


<!--    <br/><a class="btn btn-primary btn-lg btn-block" href="registration.php" role="button" >Online Registration</a>
        <a class="btn btn-primary btn-lg btn-block" href="login.php" role="button">Login as Voter</a>
        <a class="btn btn-primary btn-lg btn-block" href="adminLogin.php" role="button">Admin access</a>
        <a class="btn btn-primary btn-lg btn-block" href="result.php" role="button">Result</a>

    </p>
    -->
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