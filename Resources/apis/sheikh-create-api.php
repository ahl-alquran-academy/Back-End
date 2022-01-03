<?php
//debug mode -> on
ini_set("display_errors", 1);
///include headers..
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json;charset=UTF-8");


///include files
include_once("../config/Database.php");
include_once("../classes/Sheikh.php");

$db = new Database();
$connection = $db->connect();
$sheikh = new Sheikh($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->firstName) && !empty($data->lastName) && !empty($data->email) && !empty($data->telegram) && !empty($data->rate) && !empty($data->policy) && !empty($data->password)) {
        $sheikh->first_name = $data->firstName;
        $sheikh->last_name  = $data->lastName;
        $sheikh->email      = $data->email;
        $sheikh->policy     = $data->policy;
        $sheikh->rate       = $data->rate;
        $sheikh->telegram   = $data->telegram;
        $sheikh->password   = password_hash($data->password, PASSWORD_DEFAULT);
        $check_email        = $sheikh->check_email();

        if (!empty($check_email)) {
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "email is already exists"
            ));
        } else {
            if ($sheikh->create_sheikh()) {
                http_response_code(200);
                echo json_encode(array(
                    "status" => 1,
                    "message" => "sheikh created successfully :)"
                ));
            } else {
                http_response_code(500);
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Fiald in creatation :("
                ));
            }
        }
    } else {
        http_response_code(500);
        echo json_encode(array(
            "status" => 0,
            "message" => "All data is needed"
        ));
    }
} else {
    http_response_code(503);
    echo json_encode(array(
        "status"  => 0,
        "message" => "Access denied"
    ));
}