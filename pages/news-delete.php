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
$pageContent = "../Resources/includes/news/delete.php";
$thereIsError = false;
if (isset($_GET['id'])) {
    $news->id = intval($_GET['id']);
    $current_news = $news->get_single_news();
}
if (empty($current_news)) {
    $thereIsError = true;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['id'])) {
        $news->id = intval($_POST['id']);
        $current_news = $news->get_single_news();
        if (empty($current_news)) {
            $thereIsError = true;
        } else {
            if ($news->delete_news()) {
                $thereIsError = false;
                header("Location:news-list-all.php");
            } else {
                $thereIsError = true;
            }
        }
    } else {
        $thereIsError = true;
    }
}
include_once("pageTemplate.php");