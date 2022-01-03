<?php
//used to create(insert)  data in databse via Rest API
ini_set("display_errors", 1);
///----- include header -----///
// allow all (*) domans to access this api
header("Access-Control-Allow-Origin: *");
//the type you recive is json request
header("Content-type: application/json; charset=UTF-8");
//method we allowed is post.
header("Access-Control-Allow-Methods: POST");

//ini_set("display_error", 1);

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
    //to recive input from api 
    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->title) && !empty($data->contentpath) && !empty($data->sheikhid)) {
        $this_news->title   = $data->title;
        $this_news->contentpath  = $data->contentpath;
        $this_news->sheikhid = $data->sheikhid;

        if ($this_news->create()) {
            http_response_code(200); //ok
            echo json_encode(array(
                "status" => 1,
                "message" => "the news added successfully :)"
            ));
        } else {
            http_response_code(500); //server error
            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to insert data"
            ));
        }
    } else {
        http_response_code(404); //server error
        echo json_encode(array(
            "status" => 0,
            "message" => "All data needed."
        ));
    }
} else {
    http_response_code(503); //service are unavaiable
    echo json_encode(array(
        "status" => 0,
        "message" => "Access denied"
    ));
}