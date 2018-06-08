<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../database/controller.php';
include_once '../query/news.php';
 
$database = new Database();
$db = $database->getConnection();
 
$new = new News($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$new->name = $data->name;
$new->text = $data->text;
$new->data = $data->data;


//echo json_encode(($new))
 
// create the product

if($new->create()){
    echo '{';
        echo json_encode(($new));
    echo '}';
}
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to create event."';
    echo '}';
}


?>
