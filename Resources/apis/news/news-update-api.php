<?php

///----- include header -----///
// allow all (*) domans to access this api
header("Access-Control-Allow-Origin: *");
//the type you recive is json request
header("Content-type: application/json; charset=UTF-8");
//method we allowed is post.
header("Access-Control-Allow-Methods: POST");


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

    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->title) && !empty($data->contentpath) && !empty($data->sheikhid) && !empty($data->id)) {
        $this_news->title   = $data->title;
        $this_news->contentpath  = $data->contentpath;
        $this_news->sheikhid = $data->sheikhid;
        $this_news->id = $data->id;

        if ($this_news->update_news()) {
            http_response_code(200);
            echo json_encode(array(
                "status" => 1,
                "message" => "data updated successfully :)"
            ));
        } else {
            http_response_code(500); //service error.
            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to update data"
            ));
        }
    } else {
        http_response_code(404);
        echo json_encode(array(
            "status" => 0,
            "message" => "error in data entery"
        ));
    }
} else {
    http_response_code(503); //service unavaialable
    echo json_encode(array(
        "status" => 503,
        "message" => "Access denied"
    ));
}