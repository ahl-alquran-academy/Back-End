<?php

///----- include header -----///
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");

//include database configration file
include_once("../../config/Database.php");
//include Student file
include_once("../../classes/News.php");
// create object from Database class
$db = new Database();
//connection object..
$connection = $db->connect();
//create student object
$this_news = new News($connection);

//debug mode
// ini_set("display_error", 1);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $news_id = isset($_GET['id']) ? intval($_GET['id']) : "";

    if (!empty($news_id)) {
        $this_news->id = $news_id;
        if ($this_news->delete_news()) {
            http_response_code(200); //ok! 
            echo json_encode(array(
                "status" => 1,
                "message" => "news deleted successfully :)"
            ));
        } else {
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "failed to delete student"
            ));
        }
    } else {
        http_response_code(404);
        echo json_encode(array(
            "status" => 0,
            "message" => "there is missing data"
        ));
    }
} else {

    http_response_code(503); //service unavialable
    echo json_encode(array(
        "status" => 0,
        "message" => "Access denied"
    ));
}