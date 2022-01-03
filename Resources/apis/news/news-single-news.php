<?php

//used to update data in databse via Rest API
///----- include header -----///
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:POST");

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



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $parameters = json_decode(file_get_contents("php://input"));

    if (!empty($parameters->id)) {
        $this_news->id = $parameters->id;
        $news_data = $this_news->get_single_news();

        if (!empty($news_data)) {
            http_response_code(200); //ok! 
            echo json_encode(array(
                "status" => 1,
                "data" => $news_data
            ));
        } else {
            http_response_code(404);
            echo json_encode(array(
                "status" => 0,
                "message" => "news is  not founded"
            ));
        }
    }
} else {

    http_response_code(503); //service unavialable
    echo json_encode(array(
        "status" => 0,
        "message" => "Access denied"
    ));
}