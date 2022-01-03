<?php


//used to update data in databse via Rest API
///----- include header -----///
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");

//include files
include_once("../../config/Database.php");
include_once("../../classes/News.php");
// create object from Database class
$db = new Database();
//connection object..
$connection = $db->connect();
//create student object
$the_news = new News($connection);
$limit = intval($_REQUEST['limit']);
if (empty($limit))
    $limit = 4;

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = $the_news->get_limit_data($limit);
    $result["records"] = array();
    foreach ($data as $row) {
        array_push($result["records"], array(
            "id" => $row["id"],
            "title" => $row["title"],
            "contentpath" => $row["contentpath"],
            "publishdate" => $row["publishdate"],
            "sheikhid" => $row["sheikhid"]
        ));
    }
    http_response_code(200); //ok!
    echo json_encode(array(
        "status" => 1,
        "data" => $result["records"],
        "message" => "Success :) "
    ));
} else {

    http_response_code(503); //service unavialable
    echo json_encode(array(
        "status" => 0,
        "message" => "Access denied"
    ));
}