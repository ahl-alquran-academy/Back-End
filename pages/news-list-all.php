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
$news_list = $news->get_all_data();
$pageContent = "../Resources/includes/news/list-all.php";

include_once("pageTemplate.php");