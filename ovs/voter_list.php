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
$qry = "SELECT * from person";
$result=mysqli_query($db, $qry);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>voter list</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



<body style="background-color:#34ce57">


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
                <p> <a href="index.php? logout='1'" style="color: red;">logout</a> </p>
            <?php endif ?>

        </div>
    </div>
</nav>



<div class="container">
    <div class="container-table100">
        <div class="table table-hover">
            <div class="container">
                <form action="voter_list.php" method="post">
                    <div class="inner_container">
                        <center><input type="text" style = "background-color: #f1f1f1" placeholder="  search here" name="ser" required>
                            <button name="search" style = "background-color: #f2f2f2" class="back_btn" type="submit">SEARCH</button></center>
                        <div class="table100 ver1 m-b-110">
                            <div class="table100-head"> <center>
                                    <table>
                                        <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3"><label class="radio-inline"><input type="radio" name="rt" value = 1 checked>user_id</label></th>
                                            <th class="cell100 column3"><label class="radio-inline"><input type="radio" name="rt" value = 2 >name</label></th>
                                            <th class="cell100 column5"><label class="radio-inline"><input type="radio" name="rt" value = 3>gender<label></th>
                                            <th class="cell100 column5"><label class="radio-inline"><input type="radio" name="rt" value = 4>age</label></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
                <center>
                    <?php
                    if(isset($_POST['search'])){
                        @$key = $_POST['ser'];
                        if($_POST['rt'] == 1){
                            echo "<div class='table table-hover'>";
                            echo "<table>";
                            echo "<tbody>";
                            echo "<tr class='row400 body'>";
                            $qu = "select user_id from person where user_id = '$key'";
                            $rq = mysqli_query($db, $qu);
                            if(mysqli_num_rows($rq) > 0){
                                while($row = mysqli_fetch_assoc($rq)){
                                    $id = $row["user_id"];
                                    $rko = "select user_id, name, gender, age from person where user_id = '$id'";
                                    $rkor = mysqli_query($db, $rko);
                                    $rr = mysqli_fetch_assoc($rkor);
//                                    echo "<td class='cell100 column3'>".$key."</td>";
                                    echo "<td class='cell100 column3'>".$id."</td>";
                                    echo "<td class='cell100 column5'>".$rr["name"]."</td>";
                                    echo "<td class='cell100 column5'>".$rr["gender"]."</td>";
                                    echo "<td class='cell100 column5'>".$rr["age"]."</td></tr>";
                                }
                            }
                            else echo '<script type="text/javascript">alert("No such User_ID exists. Invalid Credentials")</script>';
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                        else if($_POST['rt'] == 2){
                            echo "<div class='table table-hover'>";
                            echo "<table>";
                            echo "<tbody>";
                            echo "<tr class='row100 body'>";

                            $query = "select user_id, name, gender, age from person where name = '$key'";
                            $run_query = mysqli_query($db, $query);
                            if(mysqli_num_rows($run_query) > 0){
                                while($row = mysqli_fetch_assoc($run_query)){
                                    $a = $row["name"];
                                    $q = "select user_id from person where name = '$a'";
                                    $h = mysqli_query($db, $q);
                                    $r = mysqli_fetch_assoc($h);
                                    echo "<td class='cell100 column3'>".$r["user_id"]."</td>";
                                    echo "<td class='cell100 column3'>".$row["name"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["gender"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["age"]."</td></tr>";
                                }
                            }
                            else echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';

                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                        else if($_POST['rt'] == 3){
                            echo "<div class='table table-hover'>";
                            echo "<table>";
                            echo "<tbody>";
                            echo "<tr class='row100 body'>";
                            $q = "select user_id, name, gender, age from person where gender = '$key'";
                            $rq = mysqli_query($db, $q);
                            if(mysqli_num_rows($rq) > 0){
                                while($row = mysqli_fetch_assoc($rq)){
                                    $a = $row["user_id"];
                                    $qq = "select name from person where user_id = '$a'";
                                    $rrq = mysqli_query($db, $qq);
                                    $na = mysqli_fetch_assoc($rrq);
                                    echo "<td class='cell100 column3'>".$row["user_id"]."</td>";
                                    echo "<td class='cell100 column3'>".$row["name"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["gender"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["age"]."</td></tr>";
                                }
                            }
                            else echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';

                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                        else if($_POST['rt'] == 4){
                            echo "<div class='table table-hover'>";
                            echo "<table>";
                            echo "<tbody>";
                            echo "<tr class='row100 body'>";
                            $q = "select user_id, name, gender, age from person where age = '$key'";
                            $rq = mysqli_query($db, $q);
                            if(mysqli_num_rows($rq) > 0){
                                while($row = mysqli_fetch_assoc($rq)){
                                    $a = $row["user_id"];
                                    $qq = "select name from person where user_id = '$a'";
                                    $rrq = mysqli_query($db, $qq);
                                    $na = mysqli_fetch_assoc($rrq);
                                    echo "<td class='cell100 column3'>".$row["user_id"]."</td>";
                                    echo "<td class='cell100 column3'>".$row["name"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["gender"]."</td>";
                                    echo "<td class='cell100 column5'>".$row["age"]."</td></tr>";
                                }
                            }
                            else echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';

                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                    }
                    ?>
                </center>
            </div>
        </div>
    </div>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function(){
                ps.update();
            })
        });


    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>







    <!-- Page Content -->
    <div class="container">
        <h2 class="mt-4"> Voter List </h2>
        <p>

        <div class="row">
            <table class="table table-hover">

                <thead>
                <tr bgcolor='#f08080'>

                    <th scope="col">user_id</th>
                    <th scope="col">name</th>
                    <th scope="col">gender</th>
                    <th scope="col">age</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<th scope=\"row\" bgcolor='#FFFAFA'>{$row['user_id']}</th>";
                    echo "<td  bgcolor='#FFFFFF'>{$row['name']}</td>";
                    echo "<td bgcolor='#FFFAFA'>{$row['gender']}</td>";
                    echo "<td bgcolor='#FFFFFF'>{$row['age']}</td>";
                    echo "</tr>";

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