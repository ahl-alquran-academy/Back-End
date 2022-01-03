<?php

session_start();

if (!isset($_SESSION['adminName'])) {
    //realy logged in -> go to dashboard.
    header("Location: ../index.php");
    exit();
}

$pageContent = "../Resources/includes/home.php";

include_once("pageTemplate.php");