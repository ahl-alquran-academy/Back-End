<?php

// //ini_set("display_errors", 1);

session_start();
if (!isset($_SESSION['adminName'])) {
    //realy logged in -> go to dashboard.
    header("Location: ../index.php");
    exit();
}
include_once("../Resources/config/Database.php");
include_once("../Resources/classes/News.php");

$db = new Database();
$connection = $db->connect();
$news = new News($connection);
$pageContent = "../Resources/includes/news/details.php";
$thereIsError = false;
if (isset($_GET['id'])) {
    $news->id = intval($_GET['id']);
    $current_news = $news->get_single_news();
}
if (empty($current_news)) {
    $thereIsError = true;
}
include_once("pageTemplate.php");