<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>admin login</title>

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
        <br/>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <!--<form accept-charset="utf-8" method="post" action="">-->
        <form id="loginMember" role="form" action="adminLogin.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="user_id" placeholder="Admin ID" name="admin_id">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="login_button" name="login_admin" value="1">Login</button>
        </form>
    <br/>
    <div class="form-group text-center">
        <a class="pwd-forget" href="javascript:void(0)" id="open_forgotPassword">Forgot Password</a>
    </div>
    <div class="text-center"><p>Don't have admin access? <a href="login.php">log in as voter</a>.</p>
        <p><a href="index.php">Back to main menu</a></p>
    </div>
</div>
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
    </p>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>