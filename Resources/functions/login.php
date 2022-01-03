<?php

include_once("../config/Database.php");
include_once("../classes/Sheikh.php");

$db = new Database();
$connection = $db->connect();
$sheikh = new Sheikh($connection);

//start session
session_start();

//start to chick if if there is a session or not 
if (isset($_SESSION['adminName'])) {
    //realy logged in -> go to dashboard.
    header("Location: ../../pages/home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //recieve input data.
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass  = $_POST['password'];
    //check email
    $sheikh->email = $email;

    $admin = $sheikh->check_email();
    if (!empty($admin)) {
        //check pass
        if (password_verify($pass, $sheikh->password)) {
            $_SESSION['adminName'] = $sheikh->name;
            $_SESSION['admin']  = $sheikh;
            header("Location: ../../pages/home.php");
            exit();
        } else {
            echo "fail";
        }
    } else {
        echo "fail";
    }
} else {
    echo "fail";
}
exit();