<?php
/**
 * Created by PhpStorm.
 * User: shiningflash
 * Date: 3/23/19
 * Time: 3:41 PM
 */

session_start();

// initializing variables
$user_id = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'evm');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $age = mysqli_real_escape_string($db, $_POST['age']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($user_id)) { array_push($errors, "User ID is required"); }
    // if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM person WHERE user_id='$user_id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['user_id'] === $user_id) {
            array_push($errors, "User ID already exists. Please, enter another one.");
        }
//
//        if ($user['na'] === $email) {
//            array_push($errors, "email already exists");
//        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = $password_1;                                                                                                                                                                                                                            
//***        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO `person`(`user_id`, `name`, `password`, `gender`, `age`) VALUES ('{$user_id}','{$name}','{$password}','{$gender}','{$age}')";
        mysqli_query($db, $query);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['success'] = "You are now logged in";
        header('location: home.php');
    }
}

if (isset($_POST['login_user'])) {
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($user_id)) {
        array_push($errors, "User ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = ($password);
//        $password = md5($password);
        $query = "SELECT * FROM `person`  WHERE `user_id`='{$user_id}' AND `password`='{$password}'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


if (isset($_POST['login_admin'])) {
    $admin_id = mysqli_real_escape_string($db, $_POST['admin_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($admin_id)) {
        array_push($errors, "Admin ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = ($password);
//        $password = md5($password);
        $query = "SELECT * FROM `admin` WHERE `admin_id`='{$admin_id}' AND `password`='{$password}'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['success'] = "You are now logged in";
            header('location: admin_interface1.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
