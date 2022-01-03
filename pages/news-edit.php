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
$pageContent = "../Resources/includes/news/edit.php";
$thereIsError = false;
$editedDone = false;
if (isset($_GET['id'])) {
    $news->id = intval($_GET['id']);
    $current_news = $news->get_single_news();
}
if (empty($current_news)) {
    $thereIsError = true;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $news->id = intval($_GET['id']);
        $news->title = htmlspecialchars(strip_tags($_POST['title']));
        $news->contentpath = htmlspecialchars(strip_tags($_POST['content']));
        $news->sheikhid = htmlspecialchars(strip_tags($_SESSION['admin']['id']));
        if ($news->update_news()) {
            $editedDone = true;
            $thereIsError = false;
            $current_news = $news->get_single_news();
        } else {
            $editedDone = false;
            $thereIsError = true;
        }
    } else {
        $thereIsError = true;
        $editedDone = false;
    }
}
include_once("pageTemplate.php");