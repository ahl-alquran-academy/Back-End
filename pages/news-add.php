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
$pageContent = "../Resources/includes/news/add.php";
$thereIsError = false;
$createdDone = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $news->title = htmlspecialchars(strip_tags($_POST['title']));
        $news->contentpath = htmlspecialchars(strip_tags($_POST['content']));
        $news->sheikhid = htmlspecialchars(strip_tags($_SESSION['admin']['id']));
        if ($news->create()) {
            $createdDone = true;
            $thereIsError = false;
        } else {
            $createdDone = false;
            $thereIsError = true;
        }
    } else {
        $thereIsError = true;
        $createdDone = false;
    }
}
include_once("pageTemplate.php");