<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../database/controller.php';
include_once '../query/events.php';
 
$database = new Database();
$db = $database->getConnection();
 
$event = new Events($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$event->id = $data->id;


//echo json_encode(($event))
 
// create the product

if($event->delete()){
    echo '{';
    	echo json_encode(($event));
        echo '"message": "Event was delete."';
    echo '}';
}
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to delete event."';
    echo '}';
}


?>
