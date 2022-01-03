<?php
ini_set("display_errors", 1);
//include vender that help in prepare token
// require 'Resources/vendor/autoload.php';

// use \Firebase\JWT\JWT;
//headers...
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-type: application/json; charset=utf-8");

include_once("../static/HTTPRequester.php");
$http = new HTTPRequester();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = $_REQUEST['token'];
    if (!empty($token)) {
        try {
            $secret_key = "isafe";
            $url = "https://ahlelquran-academy-auth.herokuapp.com/auth/getselfData?token=" . $token;
            $response = HTTPRequester::HTTPGet($url, array());
            if ($response === FALSE) {
                echo "error";
            } else {
                $options = array(
                    'http' => array(
                        'method'  => 'GET',
                    )
                );
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                $responseData = json_decode($result, TRUE);
                echo "work" . $responseData['userName'];
                if ($responseData['userName'] == "000" || $responseData['userName'] == "100") {
                    echo "you are student so you cant enter dashboard";
                } else {
                    $_SESSION['adminName'] = $responseData['userName'];
                    $_SESSION['id']  = $responseData['userID'];
                    $_SESSION['token']  = $responseData['token'];
                    header("Location:../../pages/home.php");
                    exit();
                }
            }
            // curl_close($ch);
        } catch (Exception $ex) {
            echo "message" . $ex->getMessage();
        }
    } else {
        echo "data required";
    }
} else {
    echo "Access denied";
}